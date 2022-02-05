@extends('layouts.admin')

@section('main')
 
 <div class="content-wrapper ">
    <div class="row justify-content-center ">
    
        <div class="col-md-8 grid-margin stretch-card ">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Country</h4>
                <!-- <p class="card-description">
                Basic form layout
                </p> -->
                @if(isset($errors))
                    @error('country_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                @endif
                <form class="forms-sample" method="POST" action="{{route('country.update',['id' => $country->id])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Country Name </label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="country_name" placeholder="Country Name" value="{{$country->country_name}}">
                </div>
              
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
            </div>
        </div>
    
    </div>
 
 </div>


@endsection 