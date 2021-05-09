
    @extends('layouts.app')


    
    @section('content')

    <title>Users in Admin area</title>
    <button>create</button>

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
                    <button value="delete"></button>
                    <button value="edit"></button>
                </td>
            </tr>
            @endforeach
            
       

    </table>

    @endsection
    


