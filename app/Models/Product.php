<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['nama', 'harga', 'stok', 'email', 'kategori'];

    public function scopeCari(Builder $query, ?string $kata = null): Builder
    {
        return $query->when($kata, function ($q, $value) {
            return $q->where('nama', 'like', '%'.$value.'%');
        });
    }

    public function scopeStokMenipis(Builder $query): Builder
    {
        return $query->where('stok', '<', 5);
    }

    public function getStatusStokAttribute(): string
    {
        if ($this->stok == 0) {
            return 'Habis';
        }

        if ($this->stok <= 2) {
            return 'Kritis';
        }

        return 'Menipis';
    }

    public function getDiskonAttribute(): float
    {
        if ($this->kategori === 'elektronik' && $this->harga > 1000000) {
            return $this->harga * 0.10;
        }

        return $this->kategori === 'atk' ? $this->harga * 0.05 : 0;
    }

    public function getHargaAkhirAttribute(): float
    {
        return $this->harga - $this->diskon;
    }
}