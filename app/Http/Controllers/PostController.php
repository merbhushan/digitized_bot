<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Notifications\PublishPost;
use App\Models\PublishedPost as Post;
use DB;

class PostController extends Controller
{
    public function autoPublish(Request $request){
        $offerProducts = DB::select('select fn_get_offer_products() as offer_products');
        $arrProducts = explode(',', $offerProducts[0]->offer_products);
        
        if(count($arrProducts)){
            $products=Product::find($arrProducts);

            foreach($products as $product){
                $post = new Post();
                $post->product_id = $product->id;
                $post->pecentage_drop=$product->pecentage_drop;
                $post->amazon_price=$product->amazon_price;
                $post->save();

                $product->notify(new PublishPost);
            }
        }

    }

    public function index(Request $request){
       dd($request);        
    }

    // public function publish()
}
