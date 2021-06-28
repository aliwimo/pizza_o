@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Insert new drink</h5>
    <div class="card-body">
        <form class="w-100" action="/drinks" method="POST">
            @csrf
            <div class="form-group">
                <label>Drink Name</label>
                <input type="text" class="form-control" placeholder="Name" name='name'>
            </div>
            <div class="form-group">
                <label>Drink Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
