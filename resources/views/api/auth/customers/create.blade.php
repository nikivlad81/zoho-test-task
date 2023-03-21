@extends('api.auth.customers.layouts.main')
@section('content')

    <form method="POST" action="{{ route('customers.store') }}" >
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>First Name</h3></label>
            <input type="text" name="name" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Last Name</h3></label>
            <input type="text" name="lname" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" style="color: white" class="form-label"><h3>Email</h3></label>
            <input type="email" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Phone</h3></label>
            <input type="tel" name="phone" required id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color: white" class="form-label"><h3>Account</h3></label>
            <select class="form-select" required name="account" aria-label="Default select example">
                @foreach($profile as $item)
                <option value="{{ $item['Id'] }} {{ $item['Account'] }}">{{ $item['Account'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><h3>Add new contact</h3></button>
    </form>
@endsection
