@extends('layouts.main')

@section('contact-list')

    <h2>Список контактов</h2>

    <div class="addressbook-list">
        <div class="row">
            <div class="col-lg-4 ab-block"><p>Имя</p></div>
            <div class="col-lg-4 ab-block"><p>Email</p></div>
            <div class="col-lg-3 ab-block"><p>Адресная книга</p></div>
            <div class="col-lg-1 ab-block"><p>Активен</p></div>
        </div>

        @if($contacts->count() > 0)
            @foreach($contacts as $contact)
                <div class="row">
                    <div class="col-lg-4 ab-block"><p>{{$contact->name}}</p></div>
                    <div class="col-lg-4 ab-block"><p>{{$contact->email}}</p></div>
                    <div class="col-lg-3 ab-block"><p>{{$contact->addressbook_name}}</p></div>
                    <div class="col-lg-1 ab-block"><p>{{$contact->active}}</p></div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-lg-12 ab-block"><p>Контакты отсутствуют</p></div>
            </div>
        @endif

    </div>

@endsection
