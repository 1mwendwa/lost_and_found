@extends('layouts.admin')

@section('content')

div class="container-fluid d-flex flex-column ">
    <div class="container bg-primary d-flex justify-content-center flex-column">
        <h3 style="background: red; text-transform:capitalize; ">found Items </h3>

    <div class="card" style="width: 32rem; align-text:center;">
        <div class="card-body">

            <h4 class="card-title" id="p1">Item found</h4>
            <p class="card-text" id="p2">{{ $lostitem->whats_lost}} </p>
            <h4 class="card-title" id="p1">type of document</h4>
            <p class="card-text" id="p2">{{ $lostitem->tod}} </p>
            <h4 class="card-title" style="color: #030358"  id="p1">Name on the document</h4>
            <p class="card-text" id="p3">{{ $lostitem->nod}} </p>
            <h4 class="card-title" style="color: #030358" id="p1">Item description</h4>
            <p class="card-text" id="p4">{{ $lostitem->description}} </p>

            <dl class="dl-horizontal ml-3">
                <dt>Created at:</dt>
                <dd>{{ date('jS M, Y g:ia', strtotime($lostitem->updated_at)) }}</dd>
            </dl>

@endsection
