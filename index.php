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
                <h2 class="text-center titulo-preto"> Empresa </h2>
                <div class="container text-justify">
                    <div class="row">
                        <div class="col-6 p-5">
                            <h3 class="py-1">oieee</h3>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Eu sem integer vitae justo eget magna fermentum iaculis eu. 
                        </div>
                        <div class="col-6 p-5">
                            <h3 class="py-1">oieee</h3>
                            Ligula ullamcorper malesuada proin libero nunc consequat. Tellus orci ac auctor augue mauris augue neque gravida in. 
                            Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-5">
                            <h3 class="py-1">oieee</h3>
                            Varius sit amet mattis vulputate enim nulla aliquet porttitor lacus. Dolor purus non enim praesent. Turpis cursus in hac habitasse platea. 
                            eget dolor. Sit amet consectetur adipiscing elit. 
                        </div>
                        <div class="col-6 p-5">
                            <h3 class="py-1">oieee</h3>
                            Nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. 
                            Consequat nisl vel pretium lectus quam id.
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-auto">

        <div id="contato">

            <div class="fixed-bg bg-imagem">
                <div class="align-items-center h-100 bg-tema" style="padding-bottom:6vw; color: #E5E0E0; opacity:0.8">
                    <h2 class="text-center titulo-branco"> Contato </h2>
                    <div class="container pt-5 pb-5">
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            <div class="social-menu ml-auto mr-auto">
                                <ul>
                                    <li class="space-social"><a href="https://google.com.br"><i class="fa fa-facebook"></i></a></li>
                                    <li class="space-social"><a href=""><i class="fa fa-instagram"></i></a></li>
                                    <li class="space-social"><a href=""><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-auto">

        <div id="portfolio" style="padding-bottom:6vw;">

            <h2 class="text-center titulo-preto"> Portfólio </h2>
            <p class="text-center"> Esses são alguns de nossos trabalhos</p>

        </div>
        
        <script type="text/javascript" src="main.js"></script>

        <script src="https://kit.fontawesome.com/87aae4010f.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
</html>