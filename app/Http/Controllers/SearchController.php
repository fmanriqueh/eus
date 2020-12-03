<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    
    public function search(){
        $products = Product::where( 'name', 'LIKE', '%'.request('query').'%' )->paginate(12);
        return view('search', ['elements' => $products]);
    }
}

// $q = Input::get ( 'q' );
// $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
// if(count($user) > 0)
//     return view('welcome')->withDetails($user)->withQuery ( $q );
// else return view ('welcome')->withMessage('No Details found. Try to search again !');
