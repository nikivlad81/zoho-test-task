@extends('api.auth.customers.layouts.main')
@section('content')

<div style="text-align: right"><a href="{{ route('customers.create')  }}"><button type="button" class="btn btn-primary">Add contact</button></a></div>
<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">Full name</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($profile as $client)
        <tr>
            <td>{{ $client['Name'] }}</td>
            <td>{{ $client['Email'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
