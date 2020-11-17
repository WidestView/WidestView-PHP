<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title> Widest View </title>
        <link rel="icon" href="imagens/icone_logo_WV.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
        <link rel="stylesheet" href="owl.carousel.min.css">
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

        <button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

        <div id="home">
            
            <div class="position-relative" id="video-bg" style="height:55vw;">
                <video id="top-video" autoplay loop muted playsinline style="width:100%; pointer-events: none;"></video>
                <div id="slogan-bg" style="position:absolute; top:30%; height:15vw; width:40%; background-color: rgba(255, 255, 255, 0.6);"> 

                <style>

                    @media(max-width:992px){
                        #video-bg{
                            display: flex;
                            justify-content: center;
                            width:100%;
                            height:100vw!important;
                        }
                        #slogan-bg{
                            background-color: transparent!important;
                            color: white;
                            text-align: center!important;
                            width:90%!important;
                            height:50%!important;
                        }
                        #slogan{
                            margin:0 auto!important;
                            font-size:10vw!important;
                        }
                        #top-video{
                        height:100%;
                        object-fit: cover;
                        }
                    }
                    @media(max-width:768px){
                        #video-bg{
                            height:200vw!important;
                        }
                        #top-video{
                            height:100%;
                            object-fit: cover;
                        }
                    }

                </style>

                    <h1 id="slogan" class="ml-3 ml-md-5 ml-lg-5" style="font-size:3.5vw; margin-top:3.1vw;"> Provavelmente o <br> slogan. </h1>
                </div>
            </div>
        </div>
  
        <hr class="my-auto"/>

        <div id="empresa">

            <div class="align-items-center h-100" style="padding-bottom:2rem;">
                <h2 class="text-center titulo-preto heading" style="padding-top:7rem"> Empresa </h2>
                <div class="container text-justify" style="margin-top:5rem;">
                    <div class="row">
                        <div class="col-12 col-lg-4 py-5 px-4">
                            <h3 class="py-2"> Quem somos </h3>
                            <p> <i> A Widest View é um grupo de jovens empreendedores originada ainda em 2020, com o objetivo de prestar serviços na área
                            de desenvolvimento de sistemas no geral. </i> </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 py-5 px-4">
                            <h3 class="py-2">O que fazemos</h3>
                            <p> <i>Trabalhamos com <a href="" style="color:black"> <u> Design Digital </u> </a>, <a href="" style="color:black"> <u> Análise de Sistemas </u> </a>,
                            <a href="" style="color:black"><u>Análise e Desenvolvimento de Banco de Dados</u></a>, Programação <a href="" style="color:black"><u>Front</u></a>
                            e <a href="" style="color:black"> <u> BackEnd </u> </a> e <a href="" style="color:black"> <u> Análise de Infraestrutura </u> </a> </i> <p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 py-5 px-4">
                            <h3 class="py-2"> Nossos Objetivos </h3>
                            <p> <i> Alvejamos crescer no mercado da programação e prestação de serviços para os mais diferentes tipos de clientes, e sua 
                            satisfação é temos como objetivo principal </i> <p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-wrapper">
                    <div class="container">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="testimonial-title">
                                    <h3 class="mb-4"> Conheça Nossa Equipe </h3>
                                    <p> Essas são as pessoas que tornaram a Widest View possível </p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial owl-carousel">

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/felipe.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Felipe Beserra de Oliveira </h1>
                                                <span class="title"> Desenvolvedor BackEnd e responsável pelo Projeto IOT </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/carvalho.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Gabriel Carvalho Simão </h1>
                                                <span class="title"> Analista de Infraestrutura </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/isabela.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Isabela de Freitas Borejo </h1>
                                                <span class="title"> Analista do Sistema </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/julia.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Júlia Souza Braz </h1>
                                                <span class="title"> Analista do Sistema e Desenvolvedora do aplicativo mobile </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/pedro.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Pedro Fernandes Tamas </h1>
                                                <span class="title"> Designer e Desenvolvedor FrontEnd </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/renan.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Renan Ribeiro Marcelino </h1>
                                                <span class="title"> Desenvolvedor BackEnd </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="singel-testimonial row">
                                <div class="col-md-12">
                                    <div class="testimonial-main">
                                        <div class="avatar-header row">
                                            <div class="col-md-3">
                                                <img src="imagens/yasmin.png">
                                            </div>
                                            <div class="col-md-9">
                                                <h1 class="author-name"> Yasmin Francisquetti Barnes </h1>
                                                <span class="title"> Desenvolvedora FrontEnd e Analista de Banco de Dados </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <style>

                            .testimonial-wrapper{
                                padding: 100px 0px;
                                text-align: center;
                            }

                            .testimonial-main span{
                                font-size: 13px;
                                font-weight: 500;
                            }
                            
                            .testimonial-main{
                                margin:24px;
                                box-shadow: 0px 0px 11px 0px #EEE;
                                transition: transform .4s ease;
                                padding: 12px;
                            }

                            .avatar-header{
                                border-bottom: 1px solid #EEE;
                            }

                            .avatar-header h1, span{
                                text-align:left;
                                display: block;
                            }

                            .avatar-header h1{
                                margin-top: 20px;
                            }

                            .avatar-header img{
                                width: 90px;
                                display: inline-block;
                                padding: 12px 0px;
                                border-radius: 50%;
                            }

                            .author-name{
                                font-size: 25px;
                            }

                            .testimonial-main:hover{
                                transform: scale(1.05);
                            }

                            .owl-dots{
                                text-align: center;
                                margin-top: 20px;
                            }

                            .owl-dots button span{
                                width: 10px;
                                line-height: 10px;
                                background: #333;
                                height: 10px;
                                transition: all .3s ease;
                                margin-left: 12px;
                                border-radius: 100%;
                            }

                            .owl-dots button span {
                                background: gray;
                            }

                            .owl-dots button.active span {
                                background: #464362;
                            }

                            @media(max-width:992px){
                                .testimonial-wrapper{
                                    margin-top:-7.5vh;
                                }
                            }

                            @media(max-width:768px){
                                .testimonial-wrapper{
                                    margin-top:-10vh;
                                }
                            }

                        </style>

                    </div>
                </div>
            </div>

        </div>

        <hr class="my-auto">

        <div id="portfolio">

            <div class="align-items-center h-100" style="padding-bottom:6rem;">
                <h2 class="text-center titulo-preto heading"> Portfólio </h2>
                <p class="text-center" style="margin-top:5rem;"> Esses são alguns de nossos trabalhos </p>

            </div>

        </div>

        <hr class="my-auto">

        <div id="contato">

            <div class="fixed-bg bg-imagem">
                <div class="h-100 bg-cinza" style="padding-bottom: 4rem; color: #E5E0E0; opacity:0.8">
                    <h2 class="text-center titulo-branco heading"> Contato </h2>
                    <div class="container pt-5 pb-1" style="margin-top:4rem;">
                        <div class="row text-center text-md-left text-lg-left">
                            <div class="col-12 item-contato col-md-6 col-lg-4 px-4">
                                <i class="fas fa-envelope-open-text" style="font-size: 35px; margin-bottom: 1rem;"> </i>
                                <h3> E-mail </h3>
                                <p> Alguma dúvida? Crítica? Sugestão? Proposta de serviço? Encaminhe para nós! </p>  
                                <h5 style="color:#8986AC"> widestview@gmail.com </h5>
                            </div>
                            <div class="col-12 item-contato col-md-6 col-lg-4 px-4">
                                <i class="fas fa-phone" style="font-size: 35px; margin-bottom: 1rem;"> </i>
                                <h3> Telefone </h3>
                                <p> Deseja estabelecer um contato direto e mais pessoal com nós? Não hesite em ligar! </p>
                                <h5 style="color:#8986AC"> (11) 95384-8594 </h5>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 px-4">
                                <i class="fas fa-map-marker-alt" style="font-size: 35px; margin-bottom: 1rem;"> </i>
                                <h3> Endereço </h3>
                                <p> Caso queira fazer uma visita à nossa sede e ver pessoalmente nosso trabalho. </p>
                                <h5 style="color:#8986AC"> Rua Luiz Scott, 209 </h5>
                            </div>
                        </div>

                        <style>
                            @media(max-width:992px){
                                .item-contato{
                                    padding-bottom:4rem;
                                }
                            }
                        </style>

                        <div class="row text-center" style="padding-top:4rem;">
                            <div class="col text-center">
                                <h4> Nossas redes sociais: </h4>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="social-menu ml-auto mr-auto">
                                <ul>
                                    <li class="space-social"><a href="https://www.facebook.com/widest.view.9" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li class="space-social"><a href="https://www.instagram.com/widest_view/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    <li class="space-social"><a href="https://www.linkedin.com/in/widest-view-800ab41ba/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
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
        
        <script type="text/javascript" src="main.js"></script>

        <script src="https://kit.fontawesome.com/87aae4010f.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>                   
        <script src="owl.carousel.min.js"> </script>

        <script>

            $(document).ready(function(){

                $(".testimonial").owlCarousel({
                    items:2,
                    loop:true,
                    nav:false,
                    dots:true,
                    responsive: {
                        0 : {
                            items:1
                        },
                        992 : {
                            items:2
                        }
                    }
                })

            })

        </script>

    </body>
</html>