@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit governorate</h4>
                        @if (isset($errors))
                            @error('country_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                        <form class="forms-sample" method="POST"
                            action="{{ route('governorate.update', ['governorate' => $governorate->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputUsername1">governorate Name </label>
                                <input type="text" class="form-control" name="name" placeholder="governorate Name"
                                    value="{{ $governorate->name }}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-select">
                                    <option value="{{ $governorate->country->id }}" selected>
                                        {{ $governorate->country->country_name }}
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
