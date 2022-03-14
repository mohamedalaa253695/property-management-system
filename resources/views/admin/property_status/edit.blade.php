@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Country</h4>
                        @if (isset($errors))
                            @error('country_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                        <form class="forms-sample" action="{{ route('status.update', ['status' => $status->id]) }}"
                            method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status Name </label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                    placeholder="Status Name" value="{{ $status->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
