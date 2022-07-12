<form action="{{ route('register') }}" method="post">
    @csrf
    <div>
        <input name="name" type="text" value="" placeholder="Имя"><br>
        @error('name')
        {{ $message }}
        @enderror
    </div>
    <div>
        <input name="email" type="text" value="" placeholder="Email">
        @error('email')
        {{ $message }}
        @enderror
    </div>
    <div>
        <input name="password" type="password" value="" placeholder="Пароль">
        @error('password')
        {{ $message }}
        @enderror
    </div>
    <div>
        <button type="submit">Зарегистрироваться</button>
    </div>
</form>
