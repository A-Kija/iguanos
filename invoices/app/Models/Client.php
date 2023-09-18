<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const RESULTS_PER_PAGE = [
        15 => 15,
        30 => 30,
        50 => 50,
        'all' => 'All',
    ];

    const SORTS = [
        '' => 'None',
        'asc' => 'A-Z',
        'desc' => 'Z-A',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
