<nav>
    <ul>
        @auth
            <li><a href="{{ route('admin.projects.index') }}">Gestione Progetti</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
