@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('complex.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add Complex</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Complexes Table</h4>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Complex</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($complexes))
                            @foreach ($complexes as $complex)
                                <tr>
                                    <td>{{ $complex['name'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('complex.edit', ['complex' => $complex->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('complex.destroy', ['complex' => $complex->id]) }}">
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
                {{ $complexes->onEachSide(1)->links() }}
            </div>
        </div>
    </div>












@endsection
