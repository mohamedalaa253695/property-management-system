@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Status</h4>
                        <form class="forms-sample" method="POST" action="{{ route('status.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status Name </label>
                                <input type="text" class="form-control" name="name" placeholder="Status Name">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
