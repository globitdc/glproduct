<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajax;
class ajaxRequestsController extends Controller
{
    public function addToCard(Request $request){
    	
    	$validatedData = $request->validate([
	        'productID' => 'required|numeric',
	    ]);

	    if( $validatedData ){

    		$productID  = $request->productID;
    		$Ajax = new Ajax;
    		$Ajax->addToCard($productID);
    	 	
	    }
    }
}
