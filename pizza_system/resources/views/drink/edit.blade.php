@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Insert new drink</h5>
    <div class="card-body">
        <form class="w-100" action="{{ route('drink.update', ['drink' => $drink->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Ingredient Name</label>
                <input type="text" class="form-control" placeholder="Name" name='name' value="{{ $drink->name }}">
            </div>
            <div class="form-group">
                <label>Ingredient Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price" value="{{ $drink->price }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/drink" class="btn btn-outline-secondary">Discard</a>
        </form>
    </div>
</div>
@endsection
