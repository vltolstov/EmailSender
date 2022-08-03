@extends('layouts.main')

@section('templates')

    <h2>Шаблоны для рассылок</h2>

    <a href="{{route('mailing-templates.create')}}">Создать шаблон</a>

    @if($templates->count() > 0)
        @foreach($templates as $template)
            <div class="row">
                <div class="col-lg-12">
                    Шаблон
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-lg-12"><p>Шаблоны отсутствуют</p></div>
        </div>
    @endif

@endsection
