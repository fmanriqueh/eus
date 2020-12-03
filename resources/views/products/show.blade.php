@extends('layouts.master')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row">
            <div class="col-6">
                <div class="profile-picture">
                    @if ($product->photo_url)
                        <img src="{{ asset('storage/'.$product->photo_url) }}" alt="{{ $product->name.' profile picture' }}" style="width: 100%">
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h3>{{ $product->name }}</h3>
                </div>
                <div>
                    <h5>
                        {{ $product->description }}
                    </h5>
                </div>
                <div>
                    <h4>
                        {{ number_format($product->price, 2, ",",".") }}
                    </h4>
                </div>
                <div>
                    <h5>
                        {{ $product->more}}
                    </h5>
                </div>
                <div>
                    <div class="col-md-6 offset-md-4">
                        <button onclick="Cart.add({{ $product }})" class="btn btn-primary">
                            {{ __('Agregar al carrito') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
