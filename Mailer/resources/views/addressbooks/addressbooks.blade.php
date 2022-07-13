@extends('.layouts.main')

@section('addressbook-list')

    @foreach($addressbooks as $addressbook)
        <h3>{{$addressbook->name}}</h3>
        <ul>
            <li>{{$addressbook->server_ip}}</li>
            <li>{{$addressbook->server_port}}</li>
            <li>{{$addressbook->addressbook_hash}}</li>
        </ul>
    @endforeach

@endsection

@section('add-addressbook-form')

    @include('addressbooks.add-addressbook-form')

@endsection
