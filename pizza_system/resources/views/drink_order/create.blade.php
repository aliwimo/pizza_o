@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Choose a drink</h5>
    <div class="card-body">
        <form class="w-100" action="/drink_order" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ingredients">Select a Drink</label>
                    <select class="form-control" id="ingredients" name="ingredients[]">
                        @foreach ($drinks as $drink)
                        <option value="{{ $drink->name }}">{{ $drink->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="amount">Amount</label>
                    <input type="number" min="1" max="10" id="amount" class="form-control" name="amount" value="1">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
