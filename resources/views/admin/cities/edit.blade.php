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
                        <form class="forms-sample" action="{{ route('city.update', ['city' => $city->id]) }}"
                            method="POST">
                            @csrf
                            {{-- @method("PATCH") --}}
                            <div class="form-group">
                                <label for="exampleInputUsername1">City Name </label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                    placeholder="Country Name" value="{{ $city->name }}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-select">
                                    <option value="{{ $city->country->id }}" selected>
                                        {{ $city->country->country_name }}
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="governorate">Governorate</label>
                                <select name="governorate_id" class="form-select">
                                    <option value="{{ $city->governorate->id }}" selected>
                                        {{ $city->governorate->name }}

                                    </option>
                                    @foreach ($governorates as $governorate)
                                        <option value="{{ $governorate->id }}"> {{ $governorate->name }}
                                        </option>
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
