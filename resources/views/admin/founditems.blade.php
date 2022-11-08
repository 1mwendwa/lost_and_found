@extends('layouts.admin')

@section('content')

<div class="table-header"><h2>Lost Items Posts</h2></div>
<div class="container mt-lg-5">
    <h5 class="card-title">Recent found-items posts</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item found</th>
            <th scope="col">where</th>
            <th scope="col">Date found</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($founditems as $founditem )

          <tr>
            <th scope="row">{{ $founditem->id }}</th>
            <td>{{ $founditem->whats_found }}</td>
            <td>{{ $founditem->where }}</td>
            <td>{{date('jS M, Y', strtotime($founditem->created_at))}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-primary" href="{{ route('admin.showfounditem', $founditem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="/admin/founditems/{{$founditem->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block">DELETE</button>
                        </form>
                    </div>
                </div>

                {{-- <a class="btn btn-danger" href="{{ route('admin.deleteFounditem', $founditem->id) }}"><i class='bx bxs-trash'></i> Delete</a> --}}

            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>

@endsection
