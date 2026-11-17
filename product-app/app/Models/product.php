<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (! str_contains($this->image, '/')) {
            return asset('images/promo/'.$this->image);
        }

        if (str_starts_with($this->image, 'promo/')) {
            return asset('images/'.$this->image);
        }

        return asset('storage/'.$this->image);
    }
}
