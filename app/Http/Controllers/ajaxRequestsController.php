<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajax;
use Auth;
class ajaxRequestsController extends Controller
{
    public function show_basket_count(){
        $userId = Auth::user()->id;
        $Ajax = new Ajax;
        $count = $Ajax->show_basket_count($userId);
        return $count;
    }
    public function addToCard(Request $request){
    	$validatedData = $request->validate([
	        'productID' => 'required|numeric',
	    ]);

	    if( $validatedData ){

    		$productID  = $request->productID;
    		$Ajax = new Ajax;
    		$product = $Ajax->addToCard($productID);
            return $product;
    	 	
	    }
    }
    public function get_basket_items(){
        $userId = Auth::user()->id;
        $Ajax = new Ajax;
        $products = $Ajax->get_basket_items($userId);
        return $products;
    }

    public function baskets_product_count_plus(Request $request){
        $validatedData = $request->validate([
            'productID' => 'required|numeric',
            'count'     => 'required|numeric|min:1'
        ]);

        if ($validatedData) {
            $productID = $request->productID;
            $count = $request->count;
            $userId = Auth::user()->id;
            $Ajax = new Ajax;
            $result = $Ajax->product_count_plus($userId,$productID,$count);
            return $result;

        }
    }

    public function delete_into_basket( Request $request){
        $productID = $request->productID;
        $userId = Auth::user()->id;
        $Ajax = new Ajax;
        $result = $Ajax->delete_into_basket($userId,$productID);
        
    }

    public function all_price_basket(){
        $Ajax = new Ajax;
        $userId = Auth::user()->id;
        $result = $Ajax->all_price_basket($userId);
        $allPrice = 0;
        foreach ($result as $item) {
            $aaa = $item->count * $item->price;
            $allPrice+= $aaa;
        }
        return $allPrice;

    }


}
