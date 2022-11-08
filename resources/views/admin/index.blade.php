@extends('layouts.admin')

@section('content')

<div></div>

<div class="container-fluid col-md-12 d-flex justify-content-around">
    <div class="card col-md-3 p-2 m-1" >
        <div class="card-body">
          <h3 class="card-title">Users</h3>
          <h6 class="card-subtitle mb-2 text-muted">No. of registered users</h6>
          <div class="d-flex justify-content-between text-success f-25 text-success">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-people-fill c-or" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                  </svg>
            </div>
              <p class="c-or">{{ $userCount }}</p>
          </div>
          <hr>
          <a href="{{ route('admin.users') }}" class="card-link btn btn-primary">See All Users</a>
        </div>
      </div>

      <div class="card col-md-3 p-2 m-1" >
        <div class="card-body">
          <h3 class="card-title">Found-items Posts</h3>
          <h6 class="card-subtitle mb-2 text-muted">No. of found-item posts</h6>
          <div class="d-flex justify-content-between text-success f-25 text-success">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-card-text c-or" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                  </svg>
            </div>
              <p class="c-or">{{ $foundCount }}</p>
          </div>
          <hr>
          <a href="{{ route('admin.founditems') }}" class="card-link btn btn-primary">See All Posts</a>
        </div>
      </div>

      <div class="card col-md-3 p-2 m-1" >
        <div class="card-body">
          <h3 class="card-title">Lost-items Posts</h3>
          <h6 class="card-subtitle mb-2 text-muted">No. of lost-item</h6>
          <div class="d-flex justify-content-between text-success f-25 text-success">
            <div class="c-or">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                  </svg>
            </div>
              <p class="c-or">{{ $lostCount }}</p>
          </div>
          <hr>
          <a href="{{ route('admin.lostitems') }}" class="card-link btn btn-primary">See All Posts</a>
        </div>
      </div>
</div>

<div class="card-header mt-lg-5">
    <h2>recent activity</h2>
</div>

<div class="container mt-5">
    <h5 class="card-title">Recently registered users</h5>
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

<div class="container mt-lg-5">
    <h5 class="card-title">Recent found-items posts</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item found</th>
            <th scope="col">where</th>
            <th scope="col">Status</th>
            <th scope="col">claimed_by</th>
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
            <td>
                @if ($founditem->status == 0)
                <a href="#" class="btn btn-primary">Unclaimed</a>


            @else
                <a href="#" class="btn btn-success">claimed </a>


            @endif
            </td>
            <td>{{ $founditem->claimed_by }}</td>
            <td>{{date('jS M, Y', strtotime($founditem->created_at))}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('admin.showfounditem', $founditem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                    </div>
                    <div class="col-sm-4">
                        <form action="/admin/founditems/{{$founditem->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block"> <i class='bx bxs-trash'></i> Delete</button>
                        </form>
                    </div>
                </div>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>

<div class="container mt-lg-5">
    <h5 class="card-title">Recent lost-items posts</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item lost</th>
            <th scope="col">where</th>
            <th scope="col">status</th>
            <th scope="col">Found by</th>
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
            <td>
                @if ($lostitem->status == 0)
                <a href="#" class="btn btn-primary">Not Found</a>


            @else
                <a href="#" class="btn btn-success">Found</a>


            @endif
            </td>
            <td>
                @if ($lostitem->finder == null )
                    N/A
                @else
                    {{ $lostitem->finder }}
                @endif
            </td>
            <td>{{date('jS M, Y', strtotime($lostitem->created_at))}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('admin.showlostitem', $lostitem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                    </div>
                    <div class="col-sm-4">
                        <form action="/admin/lostitems/{{$lostitem->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block"> <i class='bx bxs-trash'></i> Delete</button>
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
