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
                @foreach ($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza['size'] }}</td>
                    <td>{{ $pizza['quantity'] }}</td>
                    <td>
                    @foreach ($pizza['ingredients'] as $ingredient)
                    {{$ingredient}}
                    @endforeach
                    </td>
                    <td>
                        <form action="{{ route('cart.remove', ['category' => 'pizzas', 'id' => $pizza['id']]) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-outline-danger" value="Remove">
                        </form>
                    </td>
                </tr>
                @endforeach
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
                @foreach ($drinks as $drink)
                <tr>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $quantity[$drink->id] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', ['category' => 'drinks', 'id' => $drink->id]) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-outline-danger" value="Remove">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <a href="/drink_order/create" class="btn btn-primary">Make an order ..</a> --}}
    </div>
</div>
@endisset

@if (isset($pizzas) || isset($drinks))
<div class="d-flex">
    <form action="{{ route('order.store') }}" method="POST" class="mr-auto">
        @csrf
        <input type="submit" class="btn btn-primary" value="Submit Order">
    </form>
    <a href="{{ route('cart.empty') }}" class="btn btn-outline-danger ml-auto">Empty Cart</a>
</div>
@endif

@if (!isset($pizzas) && !isset($drinks))
<div class="card w-100 my-5">
    <div class="h6 text-center card-body pb-2">Your Cart is Empty </div>
</div>
@endif

@endsection
