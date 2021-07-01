@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Customize your pizza</h5>
    <div class="card-body">
        {{-- <form class="w-100" action="{{ route('pizza.store') }}" method="POST"> --}}
        <form class="w-100" action="{{ route('cart.add', ['category' => 'pizza', 'id' => '0']) }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="size">Size</label>
                    <select id="size" class="form-control" name="size">
                        <option value="1" selected>Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="quantity">Quantity</label>
                    <input type="number" min="1" max="10" id="quantity" class="form-control" name="quantity" value="1">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="ingredients">Select ingredients</label>
                    <select multiple class="form-control" id="ingredients" name="ingredients[]">
                        @foreach ($ingredients as $ingredient)
                        <option value="{{ $ingredient->name }}">{{ $ingredient->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
