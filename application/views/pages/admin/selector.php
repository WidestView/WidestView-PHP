<link rel="stylesheet" href="/resources/style/adminStyle.css"/>

<div style="position:fixed;top:0px;width:100%;z-index:-1;">
    <video id="top-video" autoplay loop muted playsinline style="pointer-events: none;"></video>
</div>

<div class="fab-container">
    <div class="fab fab-icon-holder">
        <i class="fas fa-sliders-h" data-toggle="modal" data-target="#exampleModal"></i>
    </div>
    <ul class="fab-options">
        <li>
            <div class="fab-icon-holder">
            <i class="fas fa-palette" data-toggle="modal" data-target="#exampleModal"></i>
            </div>
        </li>
        <li>
            <div class="fab-icon-holder">
                <i class="fas fa-language" data-toggle="modal" data-target="#exampleModal"></i>
            </div>
        </li>
    </ul>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top:15%;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> Configurações </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputProj"> Esquema de cores </label>
                    <select id="inputProj" class="form-control">
                        <option selected> Claro </option>
                        <option> Escuro </option>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="inputProj"> Linguagem </label>
                    <select id="inputProj" class="form-control">
                        <option selected> Português </option>
                        <option> Inglês </option>
                    </select>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Fechar </button>
                <button type="button" class="btn btn-primary text-white"> Salvar </button>
            </div>
        </div>
    </div>
</div>

<div id="admin">
            <div id="form-bg" class="text-center" style="width:100%; background-color: rgba(255, 255, 255, 0.6); z-index:1; height:100%; min-height:84.5vh; margin-top:2%;"> 
                <div class="text-center">
                    <h1 class="titulo-preto heading" style="margin-bottom:5rem;"> Administração </h1>
                    <div class="dropdown">
                        <button class="btn btn-primary text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecione uma Operação
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" id="drop-cadastrar" href="javascript:void(0)" onclick="select('cadButtons', 'Selecione opção de cadastro')"> Cadastrar </a>
                            <a class="dropdown-item" id="drop-consultar" href="javascript:void(0)" onclick="select('conButtons', 'Selecione opção de consulta')"> Consultar </a>
                            <a class="dropdown-item" id="drop-gerenciar" href="/admin/dashboard"> Gerenciar </a>
                            <a class="dropdown-item" id="drop-agendar" href="/admin/calendar"> Agenda </a>
                            <a class="dropdown-item" id="drop-gerar-rel" href="javascript:void(0)" onclick="call('tableQuery/relatorio','form/form-relatorio','Relatório');"> Gerar Relatório </a>
                        </div>
                    </div>

                    <div class="ml-auto mr-auto" style="width:40vw; margin-top:2rem;">

                        <div id="cadButtons" class="btn-group buttonsHide" role="group">
                            <button type="button" class="btn btn-primary" onclick="load('form/form-cad-cliente')">Cliente</button>
                            <button type="button" class="btn btn-primary" onclick="load('form/form-cad-consultor')">Consultor</button>
                            <button type="button" class="btn btn-primary" onclick="load('form/form-cad-demanda')">Demanda</button>
                            <button type="button" class="btn btn-primary" onclick="load('form/form-cad-servico')">Serviço</button>
                        </div>

                        <div id="conButtons" class="btn-group buttonsHide" role="group">
                            <button type="button" class="btn btn-primary" onclick="load('tableQuery/cliente')">Cliente</button>
                            <button type="button" class="btn btn-primary" onclick="load('tableQuery/funcionario')">Consultor</button>
                            <button type="button" class="btn btn-primary" onclick="load('tableQuery/demanda')">Demanda</button>
                            <button type="button" class="btn btn-primary" onclick="load('tableQuery/servicos')">Serviço</button>
                            <button type="button" class="btn btn-primary" onclick="load('tableQuery/relatorio')">Relatório</button>
                        </div>

                    </div>
                
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center mt-5 mb-4" style="max-width:100vw;">
                    <div class="col-10" id="Outlet">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <script>

        var local = '';

        function call(urlBusca, urlForm, title){
            document.getElementById('Outlet').innerHTML = '';
            let buttonsToHide = document.getElementsByClassName('buttonsHide');

            if(buttonsToHide){
                for(let i = 0; i < buttonsToHide.length; i++){
                    buttonsToHide[i].style = 'display: none';
                }
            }

            document.getElementById('dropdownMenuButton').innerHTML = title;
            load(urlForm);
        }


        function select(id, title){
            document.getElementById('Outlet').innerHTML = '';
            let buttonsToHide = document.getElementsByClassName('buttonsHide');

            if(buttonsToHide){
                for(let i = 0; i < buttonsToHide.length; i++){
                    buttonsToHide[i].style = 'display: none';
                }
            }

            document.getElementById(id).style = 'display: block';
            document.getElementById('dropdownMenuButton').innerHTML = title;
        }

        function load(url){
            $("#Outlet").load("/index.php/admin/"+url);
        }

    </script>

    <style>
        .buttonsHide{
            display:none;
        }
    </style>

        <script>

            const videos = [
                '/resources/videos/bgvideo1.mp4',
                '/resources/videos/bgvideo2.mp4',
                '/resources/videos/bgvideo3.mp4',
                '/resources/videos/bgvideo4.mp4'
            ]

            function getNewVideo(){
                let lastVideo = localStorage.getItem('lastVideo');
                let video = '';
                if(lastVideo === null){
                    video = videos[Math.floor(Math.random() * videos.length)];    
                }else{
                    const index = videos.indexOf(lastVideo);
                    if (index > -1) {
                        let availableVideos = videos;
                        availableVideos.splice(index,1);
                        video = availableVideos[Math.floor(Math.random() * availableVideos.length)];    
                    }else{
                        console.log('Error on localstorage: ' + lastVideo);
                        video = videos[Math.floor(Math.random() * videos.length)];    
                    }
                }
                setVideo(video);
            }

            function setVideo(video){
                document.getElementById('top-video').src = video; 
                localStorage.setItem('lastVideo',video);
            }

            getNewVideo();

        </script>

    </body>
</html>
