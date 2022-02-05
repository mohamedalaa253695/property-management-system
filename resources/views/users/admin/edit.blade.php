
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
                
                    @foreach($errors as $error)
                        <div class="alert alert-danger">{{ $message }}</div>
                    @endforeach
                @endif
                <form class="forms-sample" method="post" action="{{route('user.update',$user->id)}}">
                @csrf
                <div class="form-group">
                <label for="username">username*</label>
                    <input type="text" class="form-control" name="username" placeholder="username" value ="{{$user->name}}">
                </div>
                <div class="form-group">
                <label for="email">email*</label>
                    <input type="text" class="form-control" type="text" name="email" value="{{$user->email}}">
                </div>


                <button type="submit" class="btn btn-primary me-2" value="Update">Submit</button>
                </form>
            </div>
            </div>
        </div>
    
    </div>
 
 </div>


@endsection 