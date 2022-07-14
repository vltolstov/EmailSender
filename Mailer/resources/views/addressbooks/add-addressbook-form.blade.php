<div class="row">
    <div class="col-lg-5">
        <form action="{{route('addressbooks.store')}}" method="POST" name="store">
            @csrf
            <div class="add-addressbook-form">
                <label>Название</label>
                <div class="bord @error('name') form-error @enderror">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <input type="text" name="name" placeholder="Название" value="{{ old('name') }}" maxlength="50" class="name">
                </div>
                <label>Логин</label>
                <div class="bord @error('user') form-error @enderror">
                    @error('user')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <input type="text" name="user" placeholder="Логин" value="{{ old('user') }}" maxlength="50" class="user">
                </div>
                <label>Пароль</label>
                <div class="bord @error('password') form-error @enderror">
                    @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <input type="text" name="password" placeholder="Пароль" value="{{ old('password') }}" maxlength="50" class="password">
                </div>
                <label>IP</label>
                <div class="bord @error('server_ip') form-error @enderror">
                    @error('server_ip')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <input type="text" name="server_ip" placeholder="IP" value="{{ old('server_ip') }}" maxlength="50" class="server_ip">
                </div>
                <label>Порт</label>
                <div class="bord @error('server_port') form-error @enderror">
                    @error('server_port')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <input type="text" name="server_port" placeholder="Порт" value="{{ old('server_port') }}" maxlength="50" class="server_port">
                </div>
                <label>Хэш</label>
                <div class="bord @error('addressbook_hash') form-error @enderror">
                    @error('addressbook_hash')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <input type="text" name="addressbook_hash" placeholder="Хэш" value="{{ old('addressbook_hash') }}" maxlength="50" class="addressbook_hash">
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="form-button">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</div>
