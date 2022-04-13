@extends('layouts.admin')

@section('main')

    <form action="{{ route('property.bulkDelete') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="d-flex flex-row  ">
            <a class="w-auto pe-3" href="{{ route('property.create') }}">
                <button type="button" class="btn btn-primary mb-3">Add Property</button>
            </a>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuSizeButton2"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2" style="">
                    <input type="submit" value="delete" class="dropdown-item">
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Properties</h4>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Property image</th>
                                <th>status</th>
                                <th>Property number</th>
                                <th>building</th>
                                <th>complex</th>
                                {{-- <th>city</th>
                                <th>governorate</th>
                                <th>country</th> --}}
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (isset($properties))
                                @foreach ($properties as $property)
                                    <tr>
                                        <td><input type="checkbox" value="{{ $property->id }}" name="ids[]"></td>
                                        @if ($property['image'])
                                            <td>
                                                <img src=" {{ '/storage/images/' . $property['image'] }}" alt="">

                                            </td>
                                        @else
                                            <td>
                                                <img src="https://via.placeholder.com/150C/O%20https://placeholder.com/"
                                                    alt="">
                                            </td>
                                        @endif

                                        <td>{{ $property->status->name }}</td>
                                        <td>{{ $property['number'] }}</td>
                                        <td>{{ $property->building->number }}</td>
                                        <td>{{ $property->complex->name }}</td>
                                        {{-- <td>{{ $property->city->name }}</td>
                                        <td>{{ $property->governorate->name }}</td>
                                        <td>{{ $property->country->country_name }}</td> --}}
                                        <td>
                                            <div class="d-flex">

                                                <a href="{{ route('property.edit', ['property' => $property->id]) }}">
                                                    <label class=" badge badge-warning">edit</label>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('property.destroy', ['property' => $property->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger">delete</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    {{ $properties->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </form>












@endsection
