<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
      'title',
      'slug',
      'is_featured',
      'brand_id',
      'category_id',
      'regular_price',
      'offer_price', 
      'quantity',
      'short_desc',
      'long_desc',
      'status',
  ];

public function Brand(){
    return $this->belongsTo(Brand::class,'brand_id');
}

public function Category(){
    return $this->belongsTo(Category::class,'category_id');
}



}
