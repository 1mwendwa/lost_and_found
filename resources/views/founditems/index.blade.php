@extends('layouts.app')

@section('content')

<div class="container mt-lg-5">
    <h5 class="card-title">Recent found-items posts</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item found</th>
            <th scope="col">Name on the document</th>
            <th scope="col">where</th>
            <th scope="col">Status</th>
            <th scope="col">Date found</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($founditems as $founditem )

          <tr>
            <th scope="row">{{ $founditem->id }}</th>
            <td>{{ $founditem->whats_found }}</td>
            <td>
                @if ($founditem->nod == null)
                    N/A
                @else
                    {{ $founditem->nod }}
                @endif
            </td>
            <td>{{ $founditem->where }}</td>
            <td>
                @if ($founditem->status == 0)
                unclaimed


            @else
                claimed


            @endif
            </td>
            <td>{{date('jS M, Y', strtotime($founditem->created_at))}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('lost_items.show', $founditem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                    </div>
                </div>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>
@endsection
