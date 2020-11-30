<nav class="navbar navbar-expand-lg navbar-dark bg-cinza">
    <a class="navbar-brand mx-5 my-n1" href="#">
        <img src="/resources/imagens/logo_WV.svg" width="55" height="55" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-3">
            <li class="nav-item d-flex justify-content-center">
                <a class="nav-link" href="../../../index.php#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="../../../index.php#empresa">Empresa</a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/index.php/home/index#empresa">Equipe</a>
            </li>
            <li class="nav-item nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="../../../index.php#portfolio">Portfólio</a>
            </li>
            <li class="nav-item nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="../../../index.php#contato">Contato</a>
            </li>
        </ul>
        <div class="dropdown ml-auto mx-4">
            <a class="btn bg-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Entrar
            </a>   
            <div class="dropdown-menu dropdown-menu-lg-right mt-4 px-3" style="width:13vw;" aria-labelledby="dropdownMenuLink">
                <form action="/home/login" method="post">
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password"> Senha </label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn bg-roxo"> Entrar </button>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>

</script>