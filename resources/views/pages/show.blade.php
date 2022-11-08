@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-offset-1">
                <h1>My found items posts</h1>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-10">
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
</div>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-offset-1">
                <h1>My lost items posts</h1>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-10">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item lost</th>
                <th scope="col">Name on the document</th>
                <th scope="col">where</th>
                <th scope="col">status</th>
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
                <td>
                    @if ($lostitem->status == 0)
                    Not Found


                @else
                    Found


                @endif
                </td>
                <td>{{date('jS M, Y', strtotime($lostitem->created_at))}}</td>
                <td>
                    <div class="row">
                        <div class="col-sm-4">
                            <a class="btn btn-primary" href="{{ route('lost_items.show', $lostitem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                        </div>
                    </div>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection
