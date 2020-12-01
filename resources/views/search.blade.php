@extends('layouts.master')

@section('title', 'Busqueda - EUS')

@section('content')

    <div class="entrepreneurs-container">
        <div class="filter-settings">
            <a class="ico-btn search-btn"><i class="material-icons">filter_alt</i>Filter</a>
        </div>
        <p class="text-found">100 found</p>
        <div class="row">
            @foreach ($elements as $element)
                <div class="col-6 col-sm-4 col-md-3 text-center">
                    <div class="grid-element">
                        <a href="{{ asset('elements/'.$element->id)}}">
                            <div class="profile-picture">
                                @if ($element->photo_url)
                                    <img src="{{ asset('storage/'.$element->photo_url) }}" alt="{{ $element->name.' profile picture' }}" style="width: 100%">
                                @else
                                    <img src="{{ asset('storage/photos/img.jpg') }}" alt="{{ $element->name.' profile picture' }}" style="width: 100%">
                                @endif
                            </div>
                            <div class="description">
                                {{ $element->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        {{ $elements->links() }}
    </div>



    <script>
        jQuery(function(){
            $('.navbar .search').children('input.search-textbox').focus();
            
            const urlParams = new URLSearchParams(window.location.search);
            const query = urlParams.get('query');
            $('#query').val(query)
            /* var query = window.location.search.substring(1); 
            var vars = query.split("&"); 
            for (var i=0;i<vars.length;i++)
            { 
                var pair = vars[i].split("="); 
                if (pair[0] == variable)
                { 
                    $('#query').value = pair[1]; 
                } 
            }
            */
            $('.navbar .search').children('input.search-textbox').blur();

        });
    </script>
@endsection
