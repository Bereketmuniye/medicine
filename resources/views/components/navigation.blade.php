<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">HERBMED<span>.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">HOME</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#remedies">REMEDIES</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#videos">VIDEOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">LITERATURE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">BOOKS</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="#" class="btn-cart">
                    <i class="bi bi-cart3"></i>
                    <span>2</span>
                </a>
                <a href="{{ route('login') }}" class="btn-account">ACCOUNT</a>
            </div>
        </div>
    </div>
</nav>
