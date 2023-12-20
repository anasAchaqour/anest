<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'pro_pic',
        'supplier_id'
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }

}
