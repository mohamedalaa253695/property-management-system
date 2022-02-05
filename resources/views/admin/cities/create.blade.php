@extends('layouts.admin')

@section('main')

    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create City</h4>
                        <!-- <p class="card-description">
                                                            Basic form layout
                                                            </p> -->
                        <form class="forms-sample" method="POST" action="{{ route('city.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">City Name </label>
                                <input type="text" class="form-control" name="name" placeholder="City Name">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-select">
                                    @foreach ($countries as $country)
                                        {{-- @php
                                            dd($countries);
                                        @endphp --}}
                                        <option value="{{ $country->id }}"> {{ $country->country_name }}</option>
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
