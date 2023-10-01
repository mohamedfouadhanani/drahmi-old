<header>
    <section>
        <h1>drahmi</h1>
    </section>
    <nav>
        <ul>
            @auth
            <li><a href="{{ route("accounts.index") }}">accounts</a></li>
            <li><a href="{{ route("categories.index") }}">categories</a></li>
            <li><a href="{{ route("incomes.index") }}">incomes</a></li>
            <li><a href="{{ route("expenses.index") }}">expenses</a></li>
            <li><a href="{{ route("transfers.index") }}">transfers</a></li>
            <li><a href="{{ route("targets.index") }}">targets</a></li>
            <li><a href="{{ route("users.profile") }}">profile</a></li>
            <li>
                <form action="{{ route("logout") }}" method="post">
                    @csrf
                    <input type="submit" value="logout">
                </form>
            </li>
            @endauth
            
            @guest
            <li><a href="{{ route("login") }}">login</a></li>
            <li><a href="{{ route("register") }}">register</a></li>
            @endguest
        </ul>
    </nav>
</header>