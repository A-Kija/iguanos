<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number', 'invoice_date', 'client_id', 'archive'
    ];

    protected $casts = [
        'archive' => 'array',
    ];

    const RESULTS_PER_PAGE = [
        15 => 15,
        30 => 30,
        50 => 50,
        'all' => 'All',
    ];

    const SORTS = [
        '' => 'None',
        'old' => 'Oldest first',
        'new' => 'Newest first',
    ];

    const ARCHIVES = [
        'all' => 'All',
        'archived' => 'Archived',
        'not_archived' => 'Not archived',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function belekas()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function getPivot()
    {
        return $this->hasMany(ProductInvoice::class, 'invoice_id', 'id');
    }
}
