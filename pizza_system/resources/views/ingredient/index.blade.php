@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Ingredients List</h5>
    <div class="card-body">
        @isset($ingredients)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ingredients as $ingredient)
                <tr>
                    <th scope="row">{{ $ingredient->id }}</th>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->price }}</td>
                    <td>
                        <form action="/ingredient/{{ $ingredient->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/ingredient/{{ $ingredient->id }}/edit" class="btn btn-sm btn-secondary">Edit</a>
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                        </form>
                        {{-- <form class="btn-group btn-group-sm" role="group" action="cars/{{ $car->id }}"
                        method="POST">
                        <a href="car_model/create/{{$car->id}}" type="button" class="btn btn-secondary">add</a>
                        <a href="cars/{{ $car->id }}/edit" type="button" class="btn btn-secondary">edit</a>
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-danger" value="delete">
                        </form> --}}
                    </td>
                </tr>

                @empty
                <td colspan="4" class="text-center">There are no ingredients</td>
                @endforelse
            </tbody>
            @endisset
        </table>
        <a href="ingredient/create" class="btn btn-primary">Insert New</a>
    </div>

</div>
@endsection
