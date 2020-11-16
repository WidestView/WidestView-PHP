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
        
        include 'nav-logado1.php';
        
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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

        <div class="position-relative" id="video-bg" style="height:100%;">
            <video id="top-video" autoplay loop muted playsinline style="width:100%; pointer-events: none; object-fit: cover;"></video>
            <div class="text-center py-5" style="background-color: rgba(255, 255, 255, 0.7); width: 100%; position: absolute; top:10%;">
                <h1 class="titulo-preto heading" style="margin-bottom:5rem;"> Administração </h1>
                <div>
                    <div class="dropdown">
                        <button class="btn bg-roxo dropdown-toggle mb-5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecione uma Operação
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Cadastrar</a>
                            <a class="dropdown-item" href="#">Consultar</a>
                            <a class="dropdown-item" href="#">Gerenciar</a>
                            <a class="dropdown-item" href="#">Agendar</a>
                            <a class="dropdown-item" href="#">Gerar Relatório</a>
                        </div>
                    </div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-top:4rem;">
                        <label class="btn btn-secondary active" style="background-color:#464362!important">
                            <input type="radio" name="options" id="option1" checked> Cliente
                        </label>
                        <label class="btn btn-secondary" style="background-color:#464362!important">
                            <input type="radio" name="options" id="option2"> Serviço
                        </label>
                        <label class="btn btn-secondary" style="background-color:#464362!important">
                            <input type="radio" name="options" id="option3"> Demanda
                        </label>
                        <label class="btn btn-secondary" style="background-color:#464362!important">
                            <input type="radio" name="options" id="option3"> Consultor
                        </label>
                    </div>
                    <div class="ml-auto mr-auto" style="width:40vw; margin-top:3rem;">
                        <form class="text-justify">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-roxo"> Sign in </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

        <script src="https://kit.fontawesome.com/87aae4010f.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>