@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box container">
        <div class="lost">
            <div class="search-container">
                <div class="search">
                    <div class="svg">
                        <svg class="search-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                    </div>
                </div>
            </div>
            <div class="lost-smng">
                <span><a href="{{ route('lost_items.create') }}">lost something?</a></span>
            </div>
        </div>

        <div class="found">
            <div class="search-container">
                <div class="search">
                    <div class="svg">
                        <svg class="search-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                            <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                          </svg>
                    </div>
                </div>
            </div>
            <div class="lost-smng">
                <span><a href="{{ route('found_items.create') }}">found something?</a></span>
            </div>

        </div>
    </div>


    <div class="recently-lost">
        <div class="tit">
            <h2 class="heading">recently lost items </h2>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($lostitems as $lostitem)
                    <div class="col-md-4 d-flex mb-4">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h3 class="fw-bold">lost item</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title" id="p1">Item lost</h4>
                                <p class="card-text" id="p2">{{ $lostitem->whats_lost}} </p>
                                <h4 class="card-title" id="p1">type of document</h4>
                                <p class="card-text" id="p2">{{ $lostitem->tod}} </p>
                                <h4 class="card-title" style="color: #030358"  id="p1">Name on the document</h4>
                                <p class="card-text" id="p3">{{ $lostitem->nod}} </p>
                                <h4 class="card-title" style="color: #030358" id="p1">Item description</h4>
                                <p class="card-text" id="p4">{{ $lostitem->description}} </p>
                                <a href="{{ route('lost_items.show', $lostitem->id) }}" class="btn btn-c">Found it </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="recently-lost">
        <div class="tit">
            <h2 class="heading">recently found items </h2>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($founditems as $founditem)
                    <div class="col-md-4 d-flex mb-4">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h3 class="fw-bold">found item</h3>
                            </div>
                            <img src="{{ asset('images/' . $founditem->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw" id="p1">Item found</h5>
                                <p class="card-text" id="p2">{{ $founditem->whats_found}} </p>
                                <h5 class="card-title fw-bolder" id="p1">type of document</h5>
                                <p class="card-text" id="p2">{{ $founditem->tod}} </p>
                                <h5 class="card-title fw-bolder" style="color: #030358"  id="p1">Name on the document</h5>
                                <p class="card-text" id="p3">{{ $founditem->nod}} </p>
                                <h5 class="card-title fw-bolder" style="color: #030358" id="p1">Item description</h5>
                                <p class="card-text" id="p4">{{ $founditem->description}} </p>
                                <a href="{{ route('found_items.show', $founditem->id) }}" class="btn btn-c">Claim it </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
