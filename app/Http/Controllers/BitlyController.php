<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Guzzle HTTP */
use Illuminate\Support\Facades\Http;

class BitlyController extends Controller
{
    public function index(Request $request){
        $url = $this->shortenUrl('https://www.amazon.in/dp/B07X9YN2FJ/ref=pc_mcnc_merchandised-search-13_?pf_rd_s=merchandised-search-13&pf_rd_t=Gateway&pf_rd_i=mobile&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_r=BC2PWETFT21NQH2B91E0&pf_rd_p=708e6e31-0000-4c8b-93e1-4d35810cd7cd');
        dd($url);
    }

    public static function shortenUrl($strLongLink){

        /**
         * Not sending the parameter "group_guid" is going to make bitly to use default group GUID which it generally sets by default.
         * Refer the link: https://dev.bitly.com/
         */
        $response   =   Http::withOptions(['verify' => false])
                        ->withToken(config('bitly.access_token'))
                        ->post("https://api-ssl.bitly.com/v4/shorten", [
                            "domain"    =>   "bit.ly",
                            "long_url"  =>   $strLongLink
                        ]);

        if($response->successful()){
            $arrShortenedLinkDetails = $response->json();
            return $arrShortenedLinkDetails['link'];
        }
        else{
            return false;
        }

        if($response->failed()){
            dd('Link shortening failed');
        }
        else if($response->serverError()){
            dd('Server error occurred');
        }
        else{
            dd('Something bad happened!');
        }

    }
}
