<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title> Widest View </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="imagens/icone_logo_WV.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
    </head> 
    <body>
        <?php
        
        include 'nav-logado1.php';
        
        ?>

        <button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

        <div id="home">
            
            <div class="fixed-bg" style="height:55vw;">
                <video autoplay loop muted playsinline style="width:100%;"></video>
                <div style="position:absolute; top:30%; height:15vw; width:40%; background-color: rgba(255, 255, 255, 0.6);"> 
                    <h1 class="ml-5" style="font-size:3.5vw; margin-top:3.1vw;"> Provavelmente o <br> slogan. </h1>
                </div>
            </div>

            <script>
                let nomes = ['imagens/bgvideos/bgvideo.mp4', 'imagens/bgvideos/bgvideo2.mp4']    
                let imagem = nomes[Math.floor((Math.random()*nomes.length))];
                document.querySelector('video').src=imagem;
            </script>

        </div>
  
        <hr class="my-auto">

        <div id="empresa">

            <div class="align-items-center h-100" style="padding-bottom:6vw;">
                <h2 class="text-center titulo-preto heading"> Empresa </h2>
                <div class="container text-justify" style="margin-top:5vw;">
                    <div class="row">
                        <div class="col-4 py-5 px-4">
                            <h3 class="py-2"> Quem somos </h3>
                            <p> <i> A Widest View é um grupo de jovens empreendedores originada ainda em 2020, com o objetivo de prestar serviços na área
                            de desenvolvimento de sistemas no geral. </i> </p>
                        </div>
                        <div class="col-4 py-5 px-4">
                            <h3 class="py-2">O que fazemos</h3>
                            <p> <i>Trabalhamos com <a href="" style="color:black"> <u> Design Digital </u> </a>, <a href="" style="color:black"> <u> Análise de Sistemas </u> </a>,
                            <a href="" style="color:black"><u>Análise e Desenvolvimento de Banco de Dados</u></a>, Programação <a href="" style="color:black"><u>Front</u></a>
                            e <a href="" style="color:black"> <u> BackEnd </u> </a> e <a href="" style="color:black"> <u> Análise de Infraestrutura </u> </a> </i> <p>
                        </div>
                        <div class="col-4 py-5 px-4">
                            <h3 class="py-2"> Nossos Objetivos </h3>
                            <p> <i> Alvejamos crescer no mercado da programação e prestação de serviços para os mais diferentes tipos de clientes, e sua 
                            satisfação é temos como objetivo principal </i> <p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-5">
                            <h4 class="text-center py-4"> A equipe </h4>
                            <p class="text-center"> Conheça os membros que fizeram da Widest View realidade </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-auto">

        <div id="portfolio">

            <div class="align-items-center h-100" style="padding-bottom:6vw;">
                <h2 class="text-center titulo-preto heading"> Portfólio </h2>
                <p class="text-center" style="margin-top:5rem;"> Esses são alguns de nossos trabalhos </p>
            </div>

        </div>

        <hr class="my-auto">

        <div id="contato">

            <div class="fixed-bg bg-imagem">
                <div class="h-100 bg-tema" style="padding-bottom: 6vw; color: #E5E0E0; opacity:0.8">
                    <h2 class="text-center titulo-branco heading"> Contato </h2>
                    <div class="container pt-5 pb-1" style="margin-top:5vw;">
                        <div class="row">
                            <div class="col-4 px-4">
                                <i class="fas fa-envelope-open-text" style="font-size: 40px; margin-bottom: 2vw;"> </i>
                                <h3> E-mail </h3>
                                <p> Alguma dúvida? Crítica? Sugestão? Proposta de serviço? Encaminhe para nós! </p>  
                            </div>
                            <div class="col-4 px-4">
                                <i class="fas fa-phone" style="font-size: 40px; margin-bottom: 2vw;"> </i>
                                <h3> Telefone </h3>
                                <p> Deseja estabelecer um contato direto e mais pessoal com nós? Não hesite em ligar! </p>
                            </div>
                            <div class="col-4 px-4">
                                <i class="fas fa-map-marker-alt" style="font-size: 40px; margin-bottom: 2vw;"> </i>
                                <h3> Endereço </h3>
                                <p> Caso queira fazer uma visita à nossa sede e ver pessoalmente nosso trabalho. </p>
                            </div>
                        </div>
                        <div class="row text-center" style="padding-top:5vw;">
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
        
        <script type="text/javascript" src="main.js"></script>

        <script src="https://kit.fontawesome.com/87aae4010f.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
</html>