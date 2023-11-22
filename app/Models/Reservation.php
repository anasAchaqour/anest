<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'client_id',
        'reservation_date',
        'quantity',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
