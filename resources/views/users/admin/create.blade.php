@extends('layouts.app')

@section('content')
@if(isset($errors))
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        
    </div>
    @endif
@endif
<form method="post" action="{{route('users.store')}}">
@csrf
<label for="username">username*</label>
<input type="text" name="username" placeholder="username" required>

<label for="email">email*</label>
<input type="text" name="email" placeholder="email" required>

<label for="password">password*</label>
<input type="text" name="password" placeholder="password" required>
<input type="submit" >

</form>

@endsection