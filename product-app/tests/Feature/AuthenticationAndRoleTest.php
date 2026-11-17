<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationAndRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_prompts_visitors_without_an_account_to_register(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Belum punya akun? Daftar akun terlebih dahulu.')
            ->assertSee(route('register'))
            ->assertSee('data-password-toggle', false)
            ->assertSee('Lihat password');
    }

    public function test_registration_page_can_toggle_visibility_for_both_password_fields(): void
    {
        $response = $this->get(route('register'));

        $response->assertOk()
            ->assertSee('data-password-toggle', false)
            ->assertSee('password_confirmation')
            ->assertSee('Lihat password');

        $this->assertSame(2, substr_count($response->getContent(), 'aria-label="Lihat password"'));
    }

    public function test_product_seeder_replaces_mismatched_samples_with_new_matching_products(): void
    {
        $existingProduct = Product::create([
            'name' => 'Kaos Wanita',
            'category' => 'Atasan',
            'description' => 'Kaos wanita',
            'price' => 50000,
            'stock' => 10,
            'image' => 'kaos.jpg',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Tunik Floral',
            'category' => 'Atasan',
            'description' => 'Data contoh lama dengan foto blazer.',
            'price' => 145000,
            'stock' => 18,
            'image' => 'blouse.jpg',
            'is_active' => true,
        ]);

        $this->seed(ProductSeeder::class);
        $this->seed(ProductSeeder::class);

        $this->assertDatabaseCount('products', 6);
        $this->assertDatabaseHas('products', [
            'id' => $existingProduct->id,
            'name' => 'Kaos Wanita',
        ]);
        $this->assertDatabaseMissing('products', [
            'name' => 'Tunik Floral',
        ]);
        $this->assertDatabaseHas('products', [
            'name' => 'Blazer Formal Cokelat',
            'image' => 'blazer.jpg',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('products', [
            'name' => 'Rok Polkadot Panjang',
            'image' => 'rok.jpg',
        ]);

        $this->get(route('products.index'))
            ->assertOk()
            ->assertSee('Blazer Formal Cokelat')
            ->assertSee('Rok Polkadot Panjang')
            ->assertSee('images/promo/blazer.jpg');
    }

    public function test_guest_storefront_pages_offer_login_instead_of_registration(): void
    {
        foreach (['home', 'products.index', 'promo'] as $route) {
            $this->get(route($route))
                ->assertOk()
                ->assertSee('Login')
                ->assertDontSee('Daftar Akun');
        }
    }

    public function test_products_page_shows_login_instead_of_the_authenticated_greeting(): void
    {
        $this->actingAs($this->userWithRole('user'))
            ->get(route('products.index'))
            ->assertOk()
            ->assertSee('Login')
            ->assertDontSee('Halo,');
    }

    public function test_legacy_admin_login_url_redirects_to_the_shared_login_page(): void
    {
        $this->get(route('admin.login'))
            ->assertRedirect(route('login'));
    }

    public function test_registration_creates_a_customer_account_and_redirects_to_login(): void
    {
        $response = $this->post(route('register.process'), [
            'name' => 'Pelanggan Baru',
            'email' => 'pelanggan@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertGuest();
        $this->assertDatabaseHas('users', [
            'email' => 'pelanggan@example.com',
            'role' => 'user',
        ]);
    }

    public function test_admin_cannot_access_the_cashier_dashboard(): void
    {
        $this->actingAs($this->userWithRole('admin'))
            ->get(route('kasir.dashboard'))
            ->assertForbidden();
    }

    public function test_cashier_cannot_access_the_admin_dashboard(): void
    {
        $this->actingAs($this->userWithRole('kasir'))
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_customer_cannot_access_admin_or_cashier_dashboards(): void
    {
        $customer = $this->userWithRole('user');

        $this->actingAs($customer)
            ->get(route('admin.dashboard'))
            ->assertForbidden();

        $this->actingAs($customer)
            ->get(route('kasir.dashboard'))
            ->assertForbidden();
    }

    public function test_login_redirects_each_known_role_to_its_home(): void
    {
        foreach ([
            'admin' => 'admin.dashboard',
            'kasir' => 'kasir.dashboard',
            'user' => 'home',
        ] as $role => $route) {
            $user = $this->userWithRole($role);

            $this->post(route('login.process'), [
                'email' => $user->email,
                'password' => 'password123',
            ])->assertRedirect(route($route));
        }
    }

    private function userWithRole(string $role): User
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $user->forceFill(['role' => $role])->save();

        return $user;
    }
}
