@extends('layouts.app')
@section('content')

<div class="container-fluid">
    {{-- <h3>Lost Item {{ $lostitem->whats_lost }}</h3> --}}

    <div class="card" style="width: 100%;">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title" id="p1">Item lost</h4>
                <p class="card-text text-primary" >{{ $lostitem->whats_lost}} </p>
            </div>
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
            @if ($lostitem->status == 0)
                <a href="{{ url('change_status/'.$lostitem->id) }}" class="btn btn-primary" onclick="myFunction()">Found it </a>


            @else
                <a href="#" class="btn btn-success">Found </a>


            @endif
        </div>
      </div>

</div>

<script>
    function myFunction() {
       var locs = ['https://wa.me/{{ $lostitem->user->wNo }}?text=I think I found wht you are looking for. would you mind discussing how i can get it to you.']

       for (let i = 0; i < locs.length; i++) {
           window.open(locs[i])}
    }
</script>

@endsection
