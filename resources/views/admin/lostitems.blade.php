@extends('layouts.admin')

@section('content')

<div class="table-header"><h2>Lost Items Posts</h2></div>
<div class="container mt-lg-5">
    <h5 class="card-title">lost-items posts</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item lost</th>
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
            <td>{{ $lostitem->where }}</td>
            <td>{{date('jS M, Y', strtotime($lostitem->created_at))}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-primary" href="{{ route('admin.showlostitem', $lostitem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="/admin/lostitems/{{$lostitem->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block">DELETE</button>
                        </form>
                    </div>
                </div>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>

@endsection
