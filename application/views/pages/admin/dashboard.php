<link rel="stylesheet" href="/resources/style/adminStyle.css"/>
<script src="/resources/node_modules/chart.js/dist/Chart.js"></script>

<div style="position:fixed;top:0px;width:100%;z-index:-1;">
    <video id="top-video" autoplay loop muted playsinline style="pointer-events: none;"></video>
</div>

<div class="container-fluid mt-3">
    <div class="row d-flex justify-content-center">
        <div class="d-none d-lg-flex col-12 mt-4" style="position:absolute;">
            <a href="/admin/selector" class="text-dark" style="font-size:2rem;"><i id="btn-back" class="fa fa-chevron-circle-left text-white"></i></a>
        </div>
        <div class="col-11 mt-5">
            <div style="margin-top:3rem;">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-2 mx-0 mr-lg-5 mb-5 mb-lg-0">
                        <div class="row mb-4 justify-content-center" style="background-color:white; height:250px;"> 
                            <i class="fas fa-user-shield text-secondary" style="font-size:6rem; margin-top:5rem;"></i>
                        </div>
                        <div class="row mb-4" style="background-color:white; height:80px;">
                            <h4 class="mt-4 ml-4"> Clientes </h4>
                            <h4 class="mt-4 mr-5 ml-auto"> 5 </h4>
                        </div>
                        <div class="row mb-4" style="background-color:white; height:80px;">
                            <h4 class="mt-4 ml-4"> Consultores </h4>
                            <h4 class="mt-4 mr-5 ml-auto"> 7 </h4>
                        </div>
                        <div class="row mb-4" style="background-color:white; height:80px;">
                            <h4 class="mt-4 ml-4"> Demandas </h4>
                            <h4 class="mt-4 mr-5 ml-auto"> 13 </h4>
                        </div>
                        <div class="row" style="background-color:white; height:80px;">
                            <h4 class="mt-4 ml-4"> Relatórios </h4>
                            <h4 class="mt-4 mr-5 ml-auto"> 15 </h4>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 text-center ml-0 ml-lg-3" style="background-color:white; border-radius:10px;">
                        <h6 class="mt-4"> RELAÇÃO DEMANDA X TEMPO </h6>
                        <canvas id="myChart" height="159"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #btn-back:hover{
        color: rgba(255, 255, 255, 0.8)!important;
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

<script>

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho','Julho', 'Agosto', 'Setembro', 'Outubro', 'Novmebro', 'Dezembro'],
        datasets: [{
            label: 'Relatórios',
            data: [12, 19, 3, 5, 2, 3, 10, 9, 5, 11, 9, 5],
            backgroundColor: [
                '#464362', '#464362', '#464362', '#464362','#464362', '#464362',
                '#464362', '#464362', '#464362', '#464362', '#464362', '#464362'
            ],
            borderColor: [
                'none'
            ],
            borderWidth: 1
        }, {
            label: 'Demandas',
            data: [5, 12, 5, 12, 5, 1, 2, 6, 3, 10, 9, 2],
            backgroundColor: [
                '#ABA7CC', '#ABA7CC', '#ABA7CC', '#ABA7CC','#ABA7CC', '#ABA7CC',
                '#ABA7CC', '#ABA7CC', '#ABA7CC', '#ABA7CC', '#ABA7CC', '#ABA7CC'
            ],
            borderColor: [
                'none'
            ],
            borderWidth: 1
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>


