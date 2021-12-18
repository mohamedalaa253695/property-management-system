@extends('layouts.admin')

@section('main')

<div class="row">
<a href="{{route('country.create')}}"> 
    <button type="button" class="btn btn-primary">Primary</button>
</a>
</div>
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hoverable Table</h4>
                  <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Country</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>


                            @if(isset($countries))
                                @foreach($countries as $country)
                                   
                                    <td>{{$country['country_name']}}</td>
                                    <td>
                                    <a href="{{route('country.edit',['id'=>$country->id]) }}">   
                                        <label class="badge badge-warning">edit</label> 
                                     </a>
                                     <form method="POST" action="{{route('country.destroy',['id' => $country->id])}}">
                                     @csrf
                                     @method('DELETE')
                                        <button type="submit" class="badge badge-danger">delete</button>
                                     
                                     </form>
                                    </td>
                                
                                @endforeach
                            @endif
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>












@endsection