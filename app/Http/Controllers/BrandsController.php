<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(4);
        return view('brands.index',['brands' => $brands]);
    }

    protected function validator(){
        return request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'photo' => ['required','mimes:png','max:1024'],
            'phone' => ['required','regex:/[0-9]{10}/'],
            'address' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }

    public function create(){
        return view('brands.create');
    }
    
    public function show(Brand $brand){
        return view('brands.show',['brand'=>$brand]);
    }

    public function store(Request $request){
        $this->validator();

        // request('photo')->storeAs('public/photos','test.png');

        $photo_path = 'photos/'."bp-".request('photo')->hashName(); 
        \Storage::putFileAs('public/photos', request('photo'), "bp-".request('photo')->hashName());
        
        Brand::create([
            'name' => request('name'),
            'description' => request('description'),
            'photo_url' => $photo_path,
            'phone' => request('phone'),
            'address' => request('address'),
            'email' => request('email'),
            'user_id' => Auth::user()->id,
            
        ]);
        return redirect('dashboard');
    }

    public function edit(Brand $brand){
        return view('brands.edit',['brand'=>$brand]);
    }

    public function update(Brand $brand){
        $brand->update($this->validator());
        return route('dashboard');
    }
}
