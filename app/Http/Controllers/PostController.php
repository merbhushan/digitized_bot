<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request){
        $content = '<span id="priceblock_ourprice" class="a-size-medium a-color-price priceBlockBuyingPriceString">₹&nbsp;3,599.00</span>';

        if(preg_match('/<span id=\"priceblock_ourprice\" class="a-size-medium a-color-price priceBlockBuyingPriceString"\">(.*?)<\/span>/i',
            $content, $matches)) {

            $price = trim($matches[1]);
        } else {
            echo "Price not found.";
            $price = 0;
        }

        dd($price);
        
    }
}
