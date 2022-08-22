@extends('.layouts.main')

@section('addressbook-list')

    <h2>Список адресных книг</h2>

    <div class="list">
        <div class="row">
            <div class="col-lg-4 list-block"><p>Адресная книга</p></div>
            <div class="col-lg-2 list-block"><p>IP адресс</p></div>
            <div class="col-lg-1 list-block"><p>Порт</p></div>
            <div class="col-lg-4 list-block"><p>Хэш</p></div>
            <div class="col-lg-1 list-block"><p>&nbsp;</p></div>
        </div>

        @if($addressbooks->count() > 0)
            @foreach($addressbooks as $addressbook)
                <div class="row">
                    <div class="col-lg-4 list-block"><p>{{$addressbook->name}}</p></div>
                    <div class="col-lg-2 list-block"><p>{{$addressbook->server_ip}}</p></div>
                    <div class="col-lg-1 list-block"><p>{{$addressbook->server_port}}</p></div>
                    <div class="col-lg-4 list-block"><p>{{$addressbook->addressbook_hash}}</p></div>
                    <div class="col-lg-1 list-block">
                        <div class="control-buttons">
                            <form action="{{ route('addressbooks.destroy', $addressbook->id) }}" method="POST">
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
                <div class="col-lg-12 list-block"><p>Адресные книги отсутствуют</p></div>
            </div>
        @endif

    </div>

@endsection

@section('add-addressbook-form')

    <h2>Добавить новую адресную книгу</h2>

    @include('addressbooks.add')

@endsection
