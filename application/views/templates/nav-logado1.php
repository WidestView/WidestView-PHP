<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <a class="navbar-brand mx-5 my-n1" href="/home/index">
        <img src="/resources/imagens/logo_WV.svg" width="55" height="55" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-lg-3 w-100">
            <li class="nav-item d-flex justify-content-center">
                <a class="nav-link" href="/home/index#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/home/index#empresa">Empresa</a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/home/index#equipe">Equipe</a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/home/index#portfolio">Portfólio</a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" href="/home/index#contato">Contato</a>
            </li>
            <li class="nav-item ml-lg-4 d-flex justify-content-center">
                <a class="nav-link" style="color:#8986AC;" href="/admin/selector">Administração</a>
            </li>
            <li class="nav-item mt-4 mt-lg-0 ml-lg-auto d-flex justify-content-center">
                <p class="d-flex mt-auto mb-auto mr-0 mr-lg-3 text-white"> Olá, <?php echo $_SESSION['username'] ?>! </p>
            </li>
            <li class="nav-item mt-3 mr-lg-5 mb-2 mb-lg-0 mt-lg-0 d-flex justify-content-center">
                <a href="/home/logout" class="btn btn-danger"> Sair </a>
            </li>
        </ul>
    </div>
</nav>
