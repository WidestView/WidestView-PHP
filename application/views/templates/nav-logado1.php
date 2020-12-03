<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <a class="navbar-brand mx-5 my-n1" href="#">
        <img src="/resources/imagens/logo_WV.svg" width="55" height="55" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-3">
            <li class="nav-item d-flex justify-content-center">
                <a class="nav-link" href="/index.php/home/index#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/index.php/home/index#empresa">Empresa</a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/index.php/home/index#empresa">Equipe</a>
            </li>
            <li class="nav-item nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/index.php/home/index#portfolio">Portfólio</a>
            </li>
            <li class="nav-item nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/index.php/home/index#contato">Contato</a>
            </li>
            <li class="nav-item nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" style="color:#8986AC;" href="/index.php/admin/selector">Administração</a>
            </li>
        </ul>
        <p class="mr-0 mr-lg-5 mt-auto mb-auto text-white ml-auto"> Olá, <?php echo $_SESSION['username'] ?>! </p>
        <a href="/home/logout" class="btn btn-danger mr-2 mr-lg-3 mt-auto mb-auto"> Sair </a>

    </div>
</nav>
