@extends('.layouts.main')

@section('add-template-form')

    <h2>Создание нового шаблона</h2>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('mailing-templates.store')}}" method="POST" name="store">
                @csrf
                <div class="add-template-form">
                    <label>Название</label>
                    <div class="bord @error('name') form-error @enderror">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="text" name="name" placeholder="Название" value="{{ old('name') }}" maxlength="150" class="input-name">
                    </div>
                    <label>Основной текст</label>
                    <div class="bord-textarea @error('content') form-error @enderror">
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <textarea name="content" id="content">
                        </textarea>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="form-button">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
