<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false; // disable timestamps
    protected $fillable = ['name', 'price', 'description']; // allow mass assignment

    public function invoices()
    {
        return $this->hasMany(ProductInvoice::class);
    }
}
