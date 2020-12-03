@extends('layouts.master')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row">
            <div class="col-6">
                <div class="profile-picture">
                    @if ($user->photo_url)
                        <img src="{{ asset('storage/'.$user->photo_url) }}" alt="{{ $user->name.' profile picture' }}" style="width: 100%">
                    @else
                        <img src="{{ asset('storage/photos/img.jpg') }}" alt="{{ $user->name.' profile picture' }}" style="width: 100%">
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h3>{{ $user->name }}</h3>
                </div>
                <div>
                    <h5>
                        {{ $user->email }}
                    </h5>
                </div>
                <div>
                    <h5>
                        {{ $user->phone}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
