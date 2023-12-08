
<ul class="navigation">
    <li><a href="{{ route('admin.entryList') }}" title="Home">Заявки</a></li>
    <li><form style="margin: 0" method="POST" action="{{ route('logout') }}">@csrf<input style="margin-top: 5px; margin-bottom: 5px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px" class="btn btn-secondary" type="submit" value="Выход"/></form></li>
    <div class="clear"></div>
</ul>
