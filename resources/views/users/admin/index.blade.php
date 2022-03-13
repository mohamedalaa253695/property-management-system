@extends('layouts.admin')

@section('main')

    <div class="row ">

        <a class="w-auto" href="{{ route('user.create') }}">
            <button type="button" class="btn btn-primary d-block mb-3">Add User</button>
        </a>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2" style="">
                <input type="submit" value="delete" class="dropdown-item">
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2" style="">
                <input type="submit" value="foo" class="dropdown-item">
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2" style="">
                <input type="submit" value="bar" class="dropdown-item">
            </div>
        </div>
        {{-- <example-component></example-component> --}}
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Users</h4>
            <div class="table-responsive">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        <li>{{ Session::get('message') }}</li>
                    </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($users))
                            @foreach ($users as $user)
                                @if (!$user->trashed())
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex">

                                                <a href="{{ route('user.show', $user->id) }}">
                                                    <label class=" badge badge-warning">show</label>
                                                </a>

                                                <a href="{{ route('user.edit', $user->id) }}">
                                                    <label class=" badge badge-warning">edit</label>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger">delete</button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
