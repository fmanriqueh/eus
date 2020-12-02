@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-4">
                            <div class="card text-center grid-element add-element">
                                <a href="/products/{{$brand_id}}/create">
                                    <img class="brand-card" src="{{ asset('logo/plus.png') }}" alt="add-brand">
                                    <div class="description">
                                        {{ __('Agregar producto') }}
                                    </div>
                                </a>
                            </div>
                        </div>
                        @foreach($products as $product)
                            <div class="col-4">
                                <div class="card text-center  grid-element">
                                    <a href='/products/{{$product->id}}/edit'>
                                        <img class="brand-card" src="{{ asset('storage/'.$product->photo_url) }}" alt="{{ $product->name }}">
                                        <div class="description">
                                            {{ $product->name }}
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection