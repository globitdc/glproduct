<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function get_count( $user_id ){

    	return Basket::where( 'user_id' , $user_id );

    }

}
