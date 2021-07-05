
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
                @if (!$user->trashed()) 
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td> 
                            {{-- <a href="{{route('users.destroy',['user'=>$user->id])}}"><button value="delete">delete</button></a>
                            <a href="{{route('users.show',$user->id)}}"><button value="edit">edit</button></a> --}}
                           
                                <form action="{{route('users.destroy',['user'=>$user->id])}}" method="POST">
            
                                    <a href="" title="show"> show
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
            
                                    <a href="{{route('users.edit',$user->id)}}">edit
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>
            
                                    @csrf
                                    @method('DELETE')
            
                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">delete
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                           
            
                        </td>
                    </tr>
                @endif
            @endforeach
            
       

    </table>
    @endsection
    


