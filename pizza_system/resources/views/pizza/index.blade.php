@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Pizzas List</h5>
    <div class="card-body">
        @isset($pizzas)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Ingredients</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pizzas as $pizza)
                <tr>
                    <th scope="row">{{ $pizza->id }}</th>
                    <td>
                        @if($pizza->size == 1)
                        small
                        @elseif ($pizza->size == 2)
                        medium
                        @else
                        large
                        @endif
                    </td>
                    <td>{{ $pizza->price }}</td>
                    <td>
                        @foreach ($pizza->pizzaIngredients as $ingredient)
                        {{$ingredient['name']}}
                        @endforeach
                    </td>
                </tr>

                @empty
                <td colspan="4" class="text-center">There are no pizzas</td>
                @endforelse
            </tbody>
            @endisset
        </table>
        <a href="{{ route('pizza.create') }}" class="btn btn-primary">Insert New</a>
    </div>

</div>
@endsection
