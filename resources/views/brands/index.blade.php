@extends('layouts.master')

@section('title', 'Emprendedores - EUS')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row">
            @foreach ($brands as $brand)
                <div class="col-6 col-sm-4 col-md-3 text-center">
                    <div class="grid-element">
                        <a href="{{ asset('brands/'.$brand->id)}}">
                            <div class="profile-picture">
                                @if ($brand->photo_url)
                                    <img src="{{ asset('storage/'.$brand->photo_url) }}" alt="{{ $brand->name.' profile picture' }}" style="width: 100%">
                                @else
                                    <img src="{{ asset('storage/photos/img.jpg') }}" alt="{{ $brand->name.' profile picture' }}" style="width: 100%">
                                @endif
                            </div>
                            <div class="description">
                                {{ $brand->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        {{ $brands->links() }}
    </div>
@endsection