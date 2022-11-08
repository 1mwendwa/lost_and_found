@extends('layouts.admin')

@section('content')

<div class="container-fluid d-flex flex-column ">
    <div class="container bg-primary d-flex justify-content-center flex-column">
        <h3 style="background: red; text-transform:capitalize; ">found Items </h3>

    <div class="card" style="width: 32rem; align-text:center;">
        <div class="card-body">

            <h4 class="card-title" id="p1">Item found</h4>
            <p class="card-text" id="p2">{{ $founditem->whats_found}} </p>
            <h4 class="card-title" id="p1">type of document</h4>
            <p class="card-text" id="p2">{{ $founditem->tod}} </p>
            <h4 class="card-title" style="color: #030358"  id="p1">Name on the document</h4>
            <p class="card-text" id="p3">{{ $founditem->nod}} </p>
            <h4 class="card-title" style="color: #030358" id="p1">Item description</h4>
            <p class="card-text" id="p4">{{ $founditem->description}} </p>

            <dl class="dl-horizontal ml-3">
                <dt>Created at:</dt>
                <dd>{{ date('jS M, Y g:ia', strtotime($founditem->updated_at)) }}</dd>
            </dl>

            <div>
                {{-- <a class="btn btn-danger" href="{{ route('admin.deleteFounditem', $founditem->id) }}"><i class='bx bxs-trash'></i> Delete</a> --}}
                <form action="/admin/founditems/{{$founditem->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-block">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
