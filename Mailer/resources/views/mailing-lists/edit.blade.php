@extends('layouts.main')

@section('edit-mailinglist-form')

    <h2>Редактирование</h2>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('mailing-lists.update', $mailingList->id)}}" method="POST" name="store">
                @csrf
                @method('PUT')
                <div class="add-template-form">
                    <label>Название</label>
                    <div class="bord @error('name') form-error @enderror">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="text" name="name" placeholder="Название" value="{{$mailingList->name}}" maxlength="150" class="input-name">
                    </div>

                    <label>Адресная книга</label>
                    <div class="bord @error('id_addressbook') form-error @enderror">
                        @error('id_addressbook')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <select name="id_addressbook">
                            @foreach($addressbooks as $addressbook)
                                <option value="{{ $addressbook->id }}" @if($mailingList->id_addressbook == $addressbook->id) selected @endif>{{$addressbook->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label>Шаблон</label>
                    <div class="bord @error('id_mailing_template') form-error @enderror">
                        @error('id_mailing_template')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <select name="id_mailing_template">
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}" @if($mailingList->id_mailing_template == $template->id) selected @endif>{{$template->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label>Cтатус</label>
                    <div class="bord @error('status') form-error @enderror">
                        @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="text" name="status" placeholder="Статус" value="{{$mailingList->status}}" maxlength="150" class="input-name">
                    </div>

                    <div class="col-lg-3">
                        <button type="submit" class="form-button">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
