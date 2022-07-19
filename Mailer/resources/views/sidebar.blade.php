<ul class="sidebar">
    <li><a href="{{route('addressbooks.index')}}">Адресные книги</a></li>
    <li><a href="{{route('contacts')}}">Контакты</a></li>
</ul>

<form method="get">
    <input type="hidden" name="_token" class="token" value="{{{ csrf_token() }}}">
    <button type="button" class="reloadContacts">Обновить</button>
</form>

<div class="reloadContactsOut"></div>
