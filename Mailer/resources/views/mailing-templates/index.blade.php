@extends('layouts.main')

@section('templates')

    <h2>Шаблоны для рассылок</h2>

    <div class="row">
        <a href="{{route('mailing-templates.create')}}" class="add-template-button">Создать шаблон</a>
    </div>


    <div class="list">
        <div class="row">
            <div class="col-lg-8 list-block"><p>Название шаблона</p></div>
            <div class="col-lg-2 list-block"><p>Дата</p></div>
            <div class="col-lg-2 list-block"><p>&nbsp;</p></div>
        </div>

        @if($templates->count() > 0)
            @foreach($templates as $template)
                <div class="row">
                    <div class="col-lg-8 list-block"><p>{{$template->name}}</p></div>
                    <div class="col-lg-2 list-block"><p>{{$template->created_at}}</p></div>
                    <div class="col-lg-2 list-block">
                        <div class="control-buttons">
                            <a href="{{route('mailing-templates.edit', $template->id)}}"><span class="icon-edit"></span></a>
                            <a href="#"><span class="icon-copy"></span></a>
                            <form action="{{ route('mailing-templates.destroy', $template->id) }}" method="POST">
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
                <div class="col-lg-12 list-block"><p>Шаблоны отсутствуют</p></div>
            </div>
        @endif

    </div>


@endsection
