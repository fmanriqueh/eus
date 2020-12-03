@extends('layouts.master')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row">
            <div class="col-6">
                <div class="profile-picture">
                    @if ($brand->photo_url)
                        <img src="{{ asset('storage/'.$brand->photo_url) }}" alt="{{ $brand->name.' profile picture' }}" style="width: 100%">
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h3>{{ $brand->name }}</h3>
                </div>
                <div>
                    <h5>
                        {{ $brand->description }}
                    </h5>
                </div>
                <div>
                    <h4>
                        {{ $brand->phone }}
                    </h4>
                </div>
                <div>
                    <h5>
                        {{ $brand->address}}
                    </h5>
                </div>
                <div>
                    <h5>
                        {{ $brand->email}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection