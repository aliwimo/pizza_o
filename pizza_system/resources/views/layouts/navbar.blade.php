<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ingredient.index') }}">Ingredients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('drink.index') }}">Drinks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pizza.create') }}">Create Pizza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pizza.index') }}">List Pizza</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
