@extends('layouts.master')

@section('title', 'Emprendedores Unisimón')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-6 col-sm-4 col-md-3 text-center">
                    <div class="grid-element">
                        <a href="{{ asset('products/'.$product->id)}}">
                            <div class="profile-picture">
                                @if ($product->photo_url)
                                    <img src="{{ asset('storage/'.$product->photo_url) }}" alt="{{ $product->name.' profile picture' }}" style="width: 100%">
                                @else
                                    <img src="{{ asset('storage/photos/img.jpg') }}" alt="{{ $product->name.' profile picture' }}" style="width: 100%">
                                @endif
                            </div>
                            <div class="description">
                                {{ $product->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        {{ $products->links() }}
    </div>
@endsection
