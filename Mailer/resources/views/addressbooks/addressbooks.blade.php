@extends('.layouts.main')

@section('addressbook-list')

    <h2>Список адресных книг</h2>

    <div class="addressbook-list">
        <div class="row">
            <div class="col-lg-4 ab-block"><p>Адресная книга</p></div>
            <div class="col-lg-2 ab-block"><p>IP адресс</p></div>
            <div class="col-lg-1 ab-block"><p>Порт</p></div>
            <div class="col-lg-4 ab-block"><p>Хэш</p></div>
            <div class="col-lg-1 ab-block"><p>&nbsp;</p></div>
        </div>

        @if($addressbooks->count() > 0)
            @foreach($addressbooks as $addressbook)
                <div class="row">
                    <div class="col-lg-4 ab-block"><p>{{$addressbook->name}}</p></div>
                    <div class="col-lg-2 ab-block"><p>{{$addressbook->server_ip}}</p></div>
                    <div class="col-lg-1 ab-block"><p>{{$addressbook->server_port}}</p></div>
                    <div class="col-lg-4 ab-block"><p>{{$addressbook->addressbook_hash}}</p></div>
                    <div class="col-lg-1 ab-block">
                        <form action="{{ route('addressbooks.destroy', $addressbook->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Х</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-lg-12 ab-block"><p>Адресные книги отсутствуют</p></div>
            </div>
        @endif

    </div>

@endsection

@section('add-addressbook-form')

    <h2>Добавить новую адресную книгу</h2>

    @include('addressbooks.add-addressbook-form')

@endsection
