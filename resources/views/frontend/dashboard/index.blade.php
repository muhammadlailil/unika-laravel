<h1>Hello Selamat Datang {{ auth()->user()->name }}</h1>
<h1>Role : {{ auth()->user()->role }}</h1>
<ul>
    <li>
        <a href="{{ route('menu.admin') }}">Menu Admin</a>
    </li>
    <li>
        <a href="{{ route('menu.user') }}">Menu User</a>
    </li>
    <li>
        <a href="{{ route('logout') }}">Logout</a>
    </li>
</ul>
