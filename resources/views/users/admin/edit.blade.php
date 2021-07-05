@extends('layouts.app')

@section('content')

<h1>edit user </h1>


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>

</div>

@endif
<form method="post" action="{{route('users.update',$user->id)}}">
    @csrf
    <div class="row">
        <label for="username">username*</label>
        <input type="text" name="username" placeholder="username" value ="{{$user->name}}" >

        <label for="email">email*</label>
        <input type="text" name="email" value="{{$user->email}}" >
    </div>
    
    {{-- <label for="password">password*</label>
    <input type="text" name="password" value="{{$user->password}}" >
    <a href="#">
        <button>generate</button>
        TODO ==> generate strong password
    </a>
    --}}
    <div class="row">
        <input type="submit" value='Update'>
    </div>
</form>

@endsection
