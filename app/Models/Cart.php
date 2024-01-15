<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class Cart extends Model
{
use HasFactory;
    /**
* The attributes that are mass assignable.
*
* @var array<int, string>
*/
protected $fillable = [
'user_id',
'ip_address',
'product_id',
'quantity',
'order_id',
];

public function User (){
    return $this->belongsTo(User::class, 'user_id');
} 
public function Product (){
    return $this->belongsTo(Product::class, 'product_id');
}

// Cart Product Count
public static function TotalItems(){
    if(Auth::check()){
        $carts = Cart :: where ('user_id',Auth::user()->id)->where('order_id',NULL)->get();
    }else{
        $carts = Cart :: where ('ip_address',request()->ip())->where('order_id',NULL)->get();
    }
    $total_item = 0;
    foreach($carts as $cart){
        $total_item += $cart->quantity;
    }
    return $total_item;

}

// Cart Product Details
public static function TotalCarts(){
    if(Auth::check()){
        $carts = Cart :: where ('user_id',Auth::user()->id)->where('order_id',NULL)->get();
    }else{
        $carts = Cart :: where ('ip_address',request()->ip())->where('order_id',NULL)->get();
    }

    return $carts;

}

//Total Cart Amount Price

public static function TotalCartsAmount(){
    if(Auth::check()){
        $carts = Cart :: where ('user_id',Auth::user()->id)->where('order_id',NULL)->get();
    }else{
        $carts = Cart :: where ('ip_address',request()->ip())->where('order_id',NULL)->get();
    }
    $total_Amount = 0;
    $offer_amount = 0;
    $regular_amount = 0;

    foreach($carts as $cart){
        if(!is_null($cart->Product->offer_price)){      
            $price = $cart->Product->offer_price * $cart->quantity ;
            $offer_amount+= $price;
        }
        else{
            $price = $cart->Product->regular_price * $cart->quantity ;
            $regular_amount+= $price;
        }
       
    }
    
    $total_Amount = $regular_amount + $offer_amount ;
    return $total_Amount;

}
// public function Order (){
//     return $this->belongsTo(Product::Order, 'order_id');
// }



}
