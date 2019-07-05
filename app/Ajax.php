<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Ajax extends Model
{

    public function addToCard( $productID ){
    	$res = Product::where( 'id' , $productID )->get()->toArray();
    	return $res;
    }
}
