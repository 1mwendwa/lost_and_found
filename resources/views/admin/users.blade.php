@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h5 class="card-title">Registered users</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Whatsapp No.</th>
            <th scope="col">Date Registered</th>
            <th scope="col">Time registered</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($users as $user )

          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td style="text-transform: capitalize">{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->wNo }}</td>
            <td>{{date('jS M, Y', strtotime($user->created_at))}}</td>
            <td>{{date('g:ia', strtotime($user->created_at))}}</td>
            <td>
                <form action="/admin/users/{{$user->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-block"> <i class='bx bxs-trash'></i> Delete</button>
                </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>
@endsection
