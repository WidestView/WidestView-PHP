<link rel="stylesheet" href="/resources/style/adminStyle.css"/>

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

            <div id="video-bg">
                    <video id="top-video" autoplay loop muted playsinline style="position:absolute; top:0; pointer-events: none; z-index:-1; height:100vh; width:100%; object-fit:cover;"></video>
                    <div id="form-bg" class="text-center" style="width:100%; background-color: rgba(255, 255, 255, 0.6); z-index:1; height:88.5vh; margin-top:1%;"> 
                        <div class="text-center">
                            <h1 class="titulo-preto heading" style="margin-bottom:5rem;"> Administração </h1>
                            <div class="dropdown">
                                <button class="btn btn-primary text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Selecione uma Operação
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="drop-cadastrar" href="#"> Cadastrar </a>
                                    <a class="dropdown-item" id="drop-consultar" href="#"> Consultar </a>
                                    <a class="dropdown-item" id="drop-gerenciar" href="#"> Gerenciar </a>
                                    <a class="dropdown-item" id="drop-agendar" href="#"> Agendar </a>
                                    <a class="dropdown-item"id="drop-gerar-rel" href="#"> Gerar Relatório </a>
                                </div>
                            </div>
                            <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons" style="margin-top:2rem;"
                                id="option-root">
                            </div>
                            <div class="ml-auto mr-auto" style="width:40vw; margin-top:2rem;">

                            <div id="operation-outlet"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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

        <script type="text/javascript" src="/resources/javascript/admin-main.js"></script>

        <script src="https://kit.fontawesome.com/87aae4010f.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
