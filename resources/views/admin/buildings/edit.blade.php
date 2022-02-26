@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Building</h4>
                        @if (isset($errors))
                            @error('country_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                        <form class="forms-sample" method="POST"
                            action="{{ route('buildings.update', ['building' => $building->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputUsername1">building Name </label>
                                <input type="text" class="form-control" name="name" placeholder="building Name"
                                    value="{{ $building->name }}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-select">
                                    <option value="{{ $building->country->id }}" selected>
                                        {{ $building->country->country_name }}
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">city</label>
                                <select name="city_id" class="form-select">
                                    <option value="{{ $building->city->id }}" selected>
                                        {{ $building->city->name }}
                                    </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }} </option>
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
