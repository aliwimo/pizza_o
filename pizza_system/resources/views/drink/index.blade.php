@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Drinks List</h5>
    <div class="card-body">
        @isset($drinks)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Add to Cart</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drinks as $drink)
                <tr>
                    <th scope="row">{{ $drink->id }}</th>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $drink->price }}</td>
                    <td>
                        <form action="{{ route('drink.destroy', ['drink' => $drink->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('drink.edit', ['drink' => $drink->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <input type="submit" class="btn btn-sm btn-outline-danger" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('cart.add', ['category' => 'drinks', 'id' => $drink->id]) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-outline-secondary" value="Add">
                        </form>
                    </td>
                </tr>

                @empty
                <td colspan="4" class="text-center">There are no drinks</td>
                @endforelse
            </tbody>
            @endisset
        </table>
        <a href="{{ route('drink.create') }}" class="btn btn-primary">Insert New</a>
    </div>

</div>
@endsection
