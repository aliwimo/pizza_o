@extends('layouts.app')

@section('content')

@isset($pizzas)

<div class="card w-100 my-5">
    <h5 class="card-header">Pizza</h5>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Size</th>
                    <th scope="col">Ingredients</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Remove from Cart</th>
                </tr>
            </thead>
            <tbody>
                {{-- @for ($i = 0; $i < count($pizzas); $i++) --}}
                @foreach ($pizzas as $pizza)


                <tr>
                    <td>{{ $pizza['size'] }}</td>
                    <td>{{ $pizza['quantity'] }}</td>
                    {{-- <td>{{ $pizza['ingredients'] }}</td> --}}
                    <td>
                    @foreach ($pizza['ingredients'] as $ingredient)
                    {{$ingredient}}
                    @endforeach
                    </td>
                    <td>
                        <form action="{{ route('cart.remove', ['category' => 'pizza', 'id' => $pizza['id']]) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                        </form>
                    </td>
                </tr>
                @endforeach
                {{-- @endfor --}}
            </tbody>
        </table>
        {{-- <a href="{{ route('pizza.create') }}" class="btn btn-primary">Insert New</a> --}}
    </div>
</div>
@endisset

@isset($drinks)
<div class="card w-100 my-5">
    <h5 class="card-header">Drinks</h5>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drinks as $drink)
                <tr>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $quantity[$drink->id] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', ['category' => 'drink', 'id' => $drink->id]) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                        </form>
                    </td>
                </tr>

                @empty
                <td colspan="2" class="text-center">There are no drinks</td>
                @endforelse
            </tbody>
        </table>
        {{-- <a href="/drink_order/create" class="btn btn-primary">Make an order ..</a> --}}
    </div>
</div>
@endisset

@endsection
