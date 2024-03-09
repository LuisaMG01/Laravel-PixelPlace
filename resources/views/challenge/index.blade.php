@extends('layouts.app')

@section('title', "index")

@section('subtitle', "index")

@section('content')
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            {{-- Loop through challenges --}}
            @foreach ($viewData["challenges"] as $key => $challenge)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="card-body text-center">
                        <h1>{{ $challenge["name"] }}</h1>
                        <iframe src="https://giphy.com/embed/FMapondVtL2Fi" width="480" height="361" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                        <div class="text-center">
                            {{-- Link to challenge details --}}
                            <a href="{{ route('challenge.show_challenge', ['id'=> $challenge["id"]]) }}" class="button">See more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Carousel navigation --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection