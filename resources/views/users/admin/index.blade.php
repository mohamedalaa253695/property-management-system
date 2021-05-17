
    @extends('layouts.app')


    
    @section('content')

    <title>Users in Admin area</title>
    <a href="{{route('users.create')}}"><button>create</button></a>
    @if(Session::has('message'))
    <div class="alert alert-success">
        <li>{{Session::get('message')}}</li>
    </div>

    @endif

    <table>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>action</th>
        </tr>
        
            @foreach($users as $user)
            <tr>
                <td><input type="checkbox"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td> 
                    <button value="delete">delete</button>
                    <button value="edit"> edit</button>
                </td>
            </tr>
            @endforeach
            
       

    </table>

    @endsection
    


