@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Brands') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->is_entrepreneur)
                        <div class="row">
                            <div class="col-4">
                                <div class="card text-center grid-element add-element">
                                    <a href="/brands/create">
                                        <img class="brand-card" src="{{ asset('logo/plus.png') }}" alt="add-brand">
                                        <div class="description">
                                            {{ __('Add new brand') }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @foreach($brands as $brand)
                                <div class="col-4">
                                    <div class="card text-center  grid-element">
                                        <a href="">
                                            <img class="brand-card" src="{{ asset('storage/'.$brand->photo_url) }}" alt="{{ $brand->name }}">
                                            <div class="description">
                                                {{ $brand->name }}
                                            </div>
                                        </a>
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{ __('El compita debe ser emprendedor para poder administrar sus marcas') }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
