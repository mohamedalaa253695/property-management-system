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
                        <form class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="{{ route('property.update', ['property' => $property->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputUsername1">Price</label>
                                    <input type="number" class="form-control" name="price"
                                        value="{{ $property->price }}" placeholder="Price">
                                </div>
                                <div class="form-group col-6">
                                    <label for="status">Status</label>
                                    <select name="status_id" class="form-select">
                                        <option value="{{ $property->status->id }}" selected>
                                            {{ $property->status->name }}
                                        </option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}"> {{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputUsername1">Property Number </label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="number"
                                        value="{{ $property->number }}" placeholder="Property Name">
                                </div>
                                <div class="form-group col-4">
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
                                <div class="form-group col-4">
                                    <label for="country">Governorate</label>
                                    <select name="governorate_id" class="form-select">
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}"> {{ $governorate->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="city">City</label>
                                    <select name="city_id" class="form-select">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group col-4">
                                    <label for="country">Complex</label>
                                    <select name="complex_id" class="form-select">
                                        @foreach ($complexes as $complex)
                                            <option value="{{ $complex->id }}"> {{ $complex->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="country">Building</label>
                                    <select name="building_id" class="form-select">
                                        @foreach ($buildings as $building)
                                            <option value="{{ $building->id }}"> {{ $building->number }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="TotalSpace">Total Space</label>
                                    <input type="number" class="form-control" value="{{ $property->total_space }}"
                                        name="total_space" placeholder="total Space">
                                </div>
                                <div class="form-group col-4">
                                    <label for="NumberOfBedrooms">Number Of Bedrooms</label>
                                    <input type="number" class="form-control" name="number_of_bedrooms"
                                        value="{{ $property->number_of_bedrooms }}" placeholder="Number Of Bedrooms">
                                </div>
                                <div class="form-group col-4">
                                    <label for="NumberOfBathrooms">Bathrooms </label>
                                    <input type="number" class="form-control" name="number_of_bathrooms"
                                        value="{{ $property->number_of_bathrooms }}" placeholder="Number Of Bathrooms">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="Number Of Balconies">Number Of Balconies</label>
                                    <input type="number" class="form-control" name="number_of_balconies"
                                        value="{{ $property->number_of_balconies }}" placeholder="Number Of Balconies">
                                </div>
                                <div class="form-group col-6">
                                    <label for="BalconiesSpace">Balconies Space</label>
                                    <input type="number" class="form-control" name="balconies_space"
                                        value="{{ $property->balconies_space }}" placeholder="Balconies Space">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="propertyDescription">Property Description</label>
                                <textarea class="form-control" style="height:auto;" name="property_description"
                                    value="{{ $property->property_description }}" placeholder="Property Description">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label d-block text-lg" for="propertyImage">image </label>
                                <input type="file" class="form-control-file" id="formFileMultiple" name="image"
                                    value="{{ $property->image }}">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
