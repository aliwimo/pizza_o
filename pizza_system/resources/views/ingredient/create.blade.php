@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Insert new ingredient</h5>
    <div class="card-body">
        <form class="w-100" action="{{ route('ingredient.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Ingredient Name</label>
                <input type="text" class="form-control" placeholder="Name" name='name'>
            </div>
            <div class="form-group">
                <label>Ingredient Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
