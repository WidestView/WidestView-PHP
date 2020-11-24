<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Widest View </title>
        <link rel="icon" href="imagens/icone_logo_WV.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
    </head> 
    <body>

        <?php
        
        $logged = true;
        if($logged){
            include 'nav-logado1.php';
        } else {
            include 'nav-deslogado.php';
        }
        
        ?>

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
                    <div class="modal-header bg-roxo">
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
                        <button type="button" class="btn bg-roxo"> Salvar </button>
                    </div>
                </div>
            </div>
        </div>

        <style>

            .fab-container{
                position: fixed;
                bottom: 50px;
                right: 50px;
                z-index: 999;
                cursor: pointer;
            }

            .fab-icon-holder{
                width: 50px;
                height: 50px;
                border-radius: 100%;
                background: rgba(70, 67, 98, 0.7);;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2)
            }

            .fab-icon-holder i{
                opacity: 0.8;
            }
            
            .fab-icon-holder i{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                font-style: 25px;
                color: #FFF;
            }
            
            .fab{
                width: 60px;
                height: 60px;
                background: #464362;
            }

            .fab-options{
                list-style-type: none;
                margin: 0;
                position: absolute;
                bottom: 70px;
                right: 0;
                opacity: 0;
                transition: all 0.3s ease;
                transform: scale(0);
                transform-origin: 85% bottom;
            }

            .fab:hover + .fab-options, .fab-options:hover{
                opacity: 1;
                transform: scale(1);
            }

            .fab-options li{
                display: flex;
                justify-content: flex-end;
                padding: 5px;
            }

            .fab-label{
                padding: 2px 5px;
                align-self: center;
                user-select: none;
                white-space: nowrap;
                border-radius: 3px;
                font-size: 16px;
                background-color: transparent;
                color: black;
                margin-right: 10px;
            }

        </style>

        <div id="admin">

            <div id="video-bg">
                    <video id="top-video" autoplay loop muted playsinline style="position:absolute; top:0; pointer-events: none; z-index:-1; height:100vh; width:100%; object-fit:cover;"></video>
                    <div id="form-bg" class="text-center" style="width:100%; background-color: rgba(255, 255, 255, 0.6); z-index:1; height:88.5vh; margin-top:1%;"> 
                        <div class="text-center">
                            <h1 class="titulo-preto heading" style="margin-bottom:5rem;"> Administração </h1>
                            <div class="dropdown">
                                <button class="btn bg-roxo dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

        <style>

        @media(max-width:992px){
            #top-video{
                height:130vh!important;
            }
            #form-bg{
                padding-top:13vw;
                margin-top:4vw!important;
                height:105vh!important;
            }
        }
        @media(width:768px){
            #top-video{
                height:110vh!important;
            }
            #form-bg{
                padding-top:13vw;
                margin-top:4vw!important;
                height:96vh!important;
            }
        }
        @media(max-width:767px){
            #top-video{
                height:180vh!important;
            }
            #form-bg{
                height:165vh!important;
            }
        }

        </style>
        
        <script>
                
                const videos = [
                    'imagens/bgvideos/bgvideo1.mp4',
                    'imagens/bgvideos/bgvideo2.mp4',
                    'imagens/bgvideos/bgvideo3.mp4',
                    'imagens/bgvideos/bgvideo4.mp4'
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
                    console.log(video);
                }
                
                getNewVideo();
            </script>

        <script type="text/javascript" src="admin-main.js"></script>  

        <script src="https://kit.fontawesome.com/87aae4010f.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>