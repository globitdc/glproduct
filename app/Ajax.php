<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Basket;
use Auth;
class Ajax extends Model
{

	public function show_basket_count($userId){
		$data = Basket::where( 'user_id' , $userId )->get()->count();
		return $data;
	}

    public function addToCard( $productID ){
    	$res = Product::where( 'id' , $productID )->get()->toArray();
    	$userId = Auth::user()->id;
 		$Basket = Basket::where('user_id',$userId)->where('product_id',$productID)->get()->first();

 		if(empty($Basket)){
 			Basket::insert([
 				'user_id' 	=> 	$userId,
 				'product_id' => 	$productID,
 				'count'	=>  1
 			]);
 			return "Inserted";
 		}
        else {
 			Basket::where('user_id',$userId)->where('product_id',$productID)->update([
 				'count'	=> 	$Basket->count+1	
 			]);
 			return $Basket->count+1;
 		}

    }

    public function get_basket_items($userId){
    	$data = Basket::join('products','baskets.product_id','=','products.id')->where('user_id',$userId)->get();
    	return $data;
    }

    public function product_count_plus($userId, $productID, $count){
    	$data = Basket::where('user_id',$userId)->where('product_id',$productID)->update(['count'=>$count]);
    	return $data;
    }

    public function delete_into_basket($userId, $productID){
    	$data = Basket::where('user_id',$userId)->where('product_id',$productID)->delete();
    	return;
    }

    public function all_price_basket($userId){
    	$data = Basket::join('products','baskets.product_id','=','products.id')->where('user_id',$userId)->get();
    	return $data;
    }



}
