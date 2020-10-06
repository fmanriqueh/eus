@extends('layouts.master')

@section('title', 'Emprendedores - EUS')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-6 col-sm-4 col-md-3 text-center">
                    <div class="grid-element">
                        <a href="{{ asset('entrepreneurs/'.$user->name)}}">
                            <div class="profile-picture">
                                @if ($user->photo_url)
                                    <img src="{{ asset('storage/'.$user->photo_url) }}" alt="{{ $user->name.' profile picture' }}" style="width: 100%">
                                @else
                                    <img src="{{ asset('storage/photos/img.jpg') }}" alt="{{ $user->name.' profile picture' }}" style="width: 100%">
                                @endif
                            </div>
                            <div class="description">
                                {{ $user->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        {{ $users->links() }}
    </div>
@endsection