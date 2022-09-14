@extends('layouts.main')

@section('mailing-lists')

    <h2>Рассылки</h2>

    <div class="row">
        <a href="{{route('mailing-lists.create')}}" class="add-template-button">Создать рассылку</a>
    </div>


    <div class="list">
        <div class="row">
            <div class="col-lg-3 list-block"><p>Название рассылки</p></div>
            <div class="col-lg-2 list-block"><p>Адресная книга</p></div>
            <div class="col-lg-3 list-block"><p>Шаблон</p></div>
            <div class="col-lg-1 list-block"><p>Дата</p></div>
            <div class="col-lg-1 list-block"><p>Статус</p></div>
            <div class="col-lg-2 list-block"><p>&nbsp;</p></div>
        </div>

        @if($mailingLists->count() > 0)
            @foreach($mailingLists as $mailingList)
                <div class="row">
                    <div class="col-lg-3 list-block"><p>{{$mailingList->name}}</p></div>
                    <div class="col-lg-2 list-block"><p>{{$mailingList->addressbook_name}}</p></div>
                    <div class="col-lg-3 list-block"><p>{{$mailingList->mailing_template_name}}</p></div>
                    <div class="col-lg-1 list-block"><p>{{$mailingList->created_at->format('d-m-y')}}</p></div>
                    <div class="col-lg-1 list-block"><p>{{$mailingList->status}}</p></div>
                    <div class="col-lg-2 list-block">
                        <div class="control-buttons">
                            <a href="{{route('sendMailingList', $mailingList->id)}}"><span class="icon-play"></span></a>
                            <a href="{{route('mailing-lists.edit', $mailingList->id)}}"><span class="icon-edit"></span></a>
                            <form action="{{route('mailing-lists.destroy', $mailingList->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button"><span class="icon-exit"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-lg-12 list-block"><p>Рассылки отсутствуют</p></div>
            </div>
        @endif

    </div>

@endsection
