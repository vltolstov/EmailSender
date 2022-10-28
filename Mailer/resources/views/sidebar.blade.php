<ul class="sidebar">
    <li><a href="{{route('addressbooks.index')}}">Адресные книги</a></li>
    <li>
        <a class="sidebarContacts" href="{{route('contacts')}}">Контакты</a>
        <span class="reloadContacts reload">&nbsp;</span>

{{--        <form method="get">--}}
{{--            <input type="hidden" name="_token" class="token" value="{{{ csrf_token() }}}">--}}
{{--            <button type="button" class="reload"></button>--}}
{{--        </form>--}}
    </li>
    <li><a href="{{route('blocked')}}">Заблокированные контакты</a></li>
    <li><a href="{{route('mailing-templates.index')}}">Шаблоны</a></li>
    <li><a href="{{route('mailing-lists.index')}}">Рассылки</a></li>
</ul>

<div class="reloadContactsOut"></div>
