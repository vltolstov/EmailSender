@extends('layouts.main')

@section('contact-list')

    <h2>Список контактов</h2>

    <div class="list">
        <div class="row">
            <div class="col-lg-4 list-block"><p>Email</p></div>
            <div class="col-lg-8 list-block"><p>Адресная книга</p></div>
        </div>

        @if($contacts->count() > 0)
            @foreach($contacts as $contact)
                <div class="row">
                    <div class="col-lg-4 list-block"><p>{{$contact->email}}</p></div>
                    <div class="col-lg-8 list-block"><p>{{$contact->addressbook_name}}</p></div>
                </div>
            @endforeach
            {{$contacts->links()}}
        @else
            <div class="row">
                <div class="col-lg-12 list-block"><p>Контакты отсутствуют</p></div>
            </div>
        @endif

    </div>

@endsection
