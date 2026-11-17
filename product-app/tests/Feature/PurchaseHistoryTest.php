<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PurchaseHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_saves_purchase_details_for_admin_and_cashier_history(): void
    {
        $this->withSession([
            'cart' => [
                7 => [
                    'id' => 7,
                    'name' => 'Gaun Satin',
                    'price' => 125000,
                    'quantity' => 2,
                ],
            ],
        ])->post(route('checkout.store'), [
            'nama' => 'Siti Pelanggan',
            'no_hp' => '08123456789',
            'alamat' => 'Jalan Melati No. 5',
            'pembayaran' => 'COD',
        ])->assertRedirect(route('struk'));

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Siti Pelanggan',
            'customer_phone' => '08123456789',
            'customer_address' => 'Jalan Melati No. 5',
            'payment_method' => 'COD',
            'total' => 250000,
        ]);
        $this->assertDatabaseHas('order_items', [
            'product_name' => 'Gaun Satin',
            'unit_price' => 125000,
            'quantity' => 2,
            'subtotal' => 250000,
        ]);

        foreach ([
            'admin' => ['admin.dashboard', 'admin.orders.history'],
            'kasir' => ['kasir.dashboard', 'kasir.orders.history'],
        ] as $role => [$dashboardRoute, $historyRoute]) {
            $user = User::factory()->create();
            $user->forceFill(['role' => $role])->save();

            $this->actingAs($user)
                ->get(route($dashboardRoute))
                ->assertOk()
                ->assertSee('Riwayat Pembelian');

            $this->get(route($historyRoute))
                ->assertOk()
                ->assertSee('Siti Pelanggan')
                ->assertSee('Gaun Satin')
                ->assertSee('COD');
        }
    }

    public function test_admin_and_cashier_cannot_access_each_others_purchase_history(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['role' => 'admin'])->save();

        $cashier = User::factory()->create();
        $cashier->forceFill(['role' => 'kasir'])->save();

        $this->actingAs($admin)
            ->get(route('kasir.orders.history'))
            ->assertForbidden();

        $this->actingAs($cashier)
            ->get(route('admin.orders.history'))
            ->assertForbidden();
    }
}
