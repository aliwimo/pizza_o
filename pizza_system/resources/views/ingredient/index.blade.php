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
                        <form action="{{ route('ingredient.destroy', ['ingredient' => $ingredient->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('ingredient.edit', ['ingredient' => $ingredient->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>

                @empty
                <td colspan="4" class="text-center">There are no ingredients</td>
                @endforelse
            </tbody>
            @endisset
        </table>
        <a href="{{ route('ingredient.create') }}" class="btn btn-primary">Insert New</a>
    </div>

</div>
@endsection
