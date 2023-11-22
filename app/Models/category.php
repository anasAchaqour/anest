<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cat_pic'
    ];

    public function products()
    {
        return $this->hasMany(product::class);
    }
    
    public function supplierProductTypes()
    {
        return $this->hasMany(SupplierProductType::class);
    }
}
