<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false; // disable timestamps
    protected $fillable = ['name', 'price', 'description', 'discount']; // allow mass assignment

    const SORTS = [
        'name' => 'Name',
        'name_desc' => 'Name (Z-A)',
        'price' => 'Price',
        'price_desc' => 'Price (High to Low)',
    ];

    public function invoices()
    {
        return $this->hasMany(ProductInvoice::class);
    }
}
