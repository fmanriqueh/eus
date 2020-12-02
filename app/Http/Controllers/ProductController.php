<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    public function index($id = null)
    {
        if(!$id){
            $products = Product::paginate(4);
            return view('products.index',['products' => $products]);
        }else{
            $products = Product::where('brand_id', $id)->paginate(4);
            return view('products.index',['products' => $products]);
        }
    }

    protected function validator(){
        return request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required','numeric','gt:0'],
            'more' => ['string','nullable'],
            'photo' => ['required','mimes:jpg,jpeg','max:1024'],
            'brand_id' => ['required','exists:brands,id,user_id,'.Auth::user()->id]
        ]);
    }

    public function create($id){
        return view('products.create',['brand_id'=> $id]);
    }
    
    public function show(Product $product){
        return view('products.show',['product'=>$product]);
    }

    public function store(Request $request){
        $this->validator();

        $photo_path = 'photos/'."pi-".request('photo')->hashName(); 
        \Storage::putFileAs('public/photos', request('photo'), "pi-".request('photo')->hashName());
        
        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'photo_url' => $photo_path,
            'price' => request('price'),
            'more' => request('more'),
            'brand_id' => request('brand_id'),
        ]);
        return redirect('dashboard');
    }

    public function edit(Product $product){
        return view('product.edit',['product'=>$product]);
    }

    public function update(Product $product){
        $brand->update($this->validator());
        return route('dashboard');
    }
}
