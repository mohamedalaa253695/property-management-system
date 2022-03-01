@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit property</h4>
                        @if (isset($errors))
                            @error('number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                        <form class="forms-sample" method="POST"
                            action="{{ route('property.update', ['property' => $property->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputUsername1">Property Number </label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="number"
                                    placeholder="Property Name">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-select">
                                    <option value="{{ $property->country->id }}" selected>
                                        {{ $property->country->country_name }}
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"> {{ $country->country_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">Governorate</label>
                                <select name="governorate_id" class="form-select">
                                    @foreach ($governorates as $governorate)
                                        <option value="{{ $governorate->id }}"> {{ $governorate->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <select name="city_id" class="form-select">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="country">Complex</label>
                                <select name="complex_id" class="form-select">
                                    @foreach ($complexes as $complex)
                                        <option value="{{ $complex->id }}"> {{ $complex->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">Building</label>
                                <select name="building_id" class="form-select">
                                    @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}"> {{ $building->number }}
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
