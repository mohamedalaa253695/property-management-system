@extends('layouts.admin')

@section('main')

    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Governorate</h4>

                        <form class="forms-sample" method="POST" action="{{ route('governorate.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Governorate Name </label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                    placeholder="Governorate Name">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-select">
                                    @foreach ($countries as $country)

                                        <option value="{{ $country->id }}"> {{ $country->country_name }}
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

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
