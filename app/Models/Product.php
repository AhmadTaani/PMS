<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'quantity',
        'price',
        'image',
        'product_category',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'product_category');
    }
}
