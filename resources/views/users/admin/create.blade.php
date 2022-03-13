@extends('layouts.admin')

@section('main')

    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Country</h4>
                        @if (isset($errors))
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                        @endif
                        <form class="forms-sample" method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="userName">username</label>
                                <input type="text" class="form-control" name="username" placeholder="username" required>

                            </div>
                            <div class="form-group">
                                <label for="userName">email*</label>
                                <input type="text" class="form-control" name="email" placeholder="email" required>


                            </div>
                            <div class="form-group">
                                <label for="userName">password</label>
                                <input type="text" class="form-control" name="password" placeholder="password" required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="optionsRadios1"
                                            value="admin">
                                        Admin
                                        <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="optionsRadios1"
                                            value="agent">
                                        Agent
                                        <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="optionsRadios1"
                                            value="customer">
                                        Customer
                                        <i class="input-helper"></i></label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
