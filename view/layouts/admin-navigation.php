<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
    <a class="navmenu-brand" href="#">SuKhDug</a>
    <ul class="nav navmenu-nav">
        <li><a href="/">На главную</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Администрирование <b class="caret"></b></a>
            <ul class="dropdown-menu navmenu-nav">
                <li class="dropdown-header">Привет, <?= $_SESSION['logged']['login']; ?>!</li>
                <li><a href="/admin/article/add">Добавление статьи</a></li>
                <li class="divider"></li>
                <li><a href="/logout">Выйти</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="navbar navbar-default navbar-fixed-top">
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>