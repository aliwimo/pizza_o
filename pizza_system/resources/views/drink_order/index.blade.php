@extends('layouts.app')

@section('content')

<div class="card w-100 my-5">
    <h5 class="card-header">Drink Orders List</h5>
    <div class="card-body">
        @isset($drinks)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drinks as $drink)
                <tr>
                    <th scope="row">{{ $drink->id }}</th>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $drink->price }}</td>
                    <td>{{ $drink->amount }}</td>
                </tr>

                @empty
                <td colspan="4" class="text-center">There are no drink orders</td>
                @endforelse
            </tbody>
            @endisset
        </table>
        <a href="/drink_order/create" class="btn btn-primary">Make an order ..</a>
    </div>

</div>
@endsection
