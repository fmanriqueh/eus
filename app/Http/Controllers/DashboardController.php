<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $brands = Brand::where('user_id', Auth::user()->id)->get();
        return view('dashboard',['brands' => $brands]);
    }

    public function products($id){
        $brand = Brand::where([['id', $id],['user_id',Auth::user()->id]])->get();
        if($brand->count()){
            $products = Product::where('brand_id', $id)->get();
            return view('products.dashboard',['products' => $products, 'brand_id' => $id]);
        }else{
            abort(404);
        }
    }
}
