@extends('api.auth.customers.layouts.main')
@section('content')

    <form method="POST" action="{{ route('deals.store') }}" >
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Deal Name</h3></label>
            <input type="text" name="name" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Amount</h3></label>
            <input type="number" name="amount" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" style="color: white" class="form-label"><h3>Closing Date</h3></label>
            <input type="date" name="closing" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Account name</h3></label>
            <select class="form-select" required name="account" aria-label="Default select example">
                @foreach($accountNames as $name)
                    <option value="{{ $name['Id'] }} {{ $name['Account'] }}">{{ $name['Account'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Contact name</h3></label>
            <select class="form-select" required name="contact" aria-label="Default select example">
                    @foreach($contactNames as $name)
                    <option value="{{ $name['Id'] }} {{ $name['Name'] }}">{{ $name['Name'] }}</option>
                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><h3>Add new deal</h3></button>
    </form>
@endsection
