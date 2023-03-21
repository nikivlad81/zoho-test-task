@extends('api.auth.customers.layouts.main')
@section('content')

    <div style="text-align: right"><a href="{{ route('deals.create')  }}"><button type="button" class="btn btn-primary">Add deal</button></a></div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Deal</th>
            <th scope="col">Contact name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($profile as $client)
            <tr>
                <td>{{ $client['Deal'] }}</td>
                <td>{{ $client['Contact'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
