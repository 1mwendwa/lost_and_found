@extends('layouts.app')

{{-- @section('content')

<div class="row">
    <div class="col-md-10">
        <div class="row">
            @foreach ($lostitems as $lostitem)
            <div class="col-md-3 d-flex mb-4">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title" id="p1">Item lost</h4>
                        <p class="card-text" id="p2">{{ $lostitem->whats_lost}} </p>
                        <h4 class="card-title" id="p1">type of document</h4>
                        <p class="card-text" id="p2">{{ $lostitem->tod}} </p>
                        <h4 class="card-title" style="color: #030358"  id="p1">Name on the document</h4>
                        <p class="card-text" id="p3">{{ $lostitem->nod}} </p>
                        <h4 class="card-title" style="color: #030358" id="p1">Item description</h4>
                        <p class="card-text" id="p4">{{ $lostitem->description}} </p>
                        <a href="{{ route() }}" class="btn btn-primary">Found it </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection --}}

@section('content')

<div class="table-header"><h2>Lost Items Posts</h2></div>
<div class="container mt-lg-5">
    <h5 class="card-title">lost-items posts</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item lost</th>
            <th scope="col">Name on the document</th>
            <th scope="col">where</th>
            <th scope="col">Date lost</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($lostitems as $lostitem )

          <tr>
            <th scope="row">{{ $lostitem->id }}</th>
            <td>{{ $lostitem->whats_lost }}</td>
            <td>
                @if ($lostitem->nod == null)
                    N/A
                @else
                    {{ $lostitem->nod }}
                @endif
            </td>
            <td>{{ $lostitem->where }}</td>
            <td>{{date('jS M, Y', strtotime($lostitem->created_at))}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-primary" href="{{ route('lost_items.show', $lostitem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                    </div>
                </div>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>

@endsection

