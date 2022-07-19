<ul class="sidebar">
    <li><a href="{{route('addressbooks.index')}}">Адресные книги</a></li>
    <li>
        <a href="{{route('contacts')}}">Контакты</a>
        <form method="get">
            <input type="hidden" name="_token" class="token" value="{{{ csrf_token() }}}">
            <button type="button" class="reloadContacts reload"></button>
        </form>
    </li>
</ul>



<div class="reloadContactsOut"></div>
