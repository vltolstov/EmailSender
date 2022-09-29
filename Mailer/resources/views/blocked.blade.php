@extends('layouts.main')

@section('contact-list')

    <h2>Список заблокированных контактов</h2>

    <div class="addressbook-list">
        <div class="row">
            <div class="col-lg-4 list-block"><p>Email</p></div>
            <div class="col-lg-6 list-block"><p>Адресная книга</p></div>
            <div class="col-lg-2 list-block"><p>Статус</p></div>
        </div>

        @if($contacts->count() > 0)
            @foreach($contacts as $contact)
                <div class="row">
                    <div class="col-lg-4 list-block"><p>{{$contact->email}}</p></div>
                    <div class="col-lg-6 list-block">
                        <p>@if($contact->addressbook_name == null) &nbsp; @else {{$contact->addressbook_name}} @endif</p>
                    </div>
                    <div class="col-lg-2 list-block"><p>{{$contact->status}}</p></div>
                </div>
            @endforeach
            {{$contacts->links()}}
        @else
            <div class="row">
                <div class="col-lg-12 list-block"><p>Заблокрованные контакты отсутствуют</p></div>
            </div>
        @endif

    </div>

@endsection
