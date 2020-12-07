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
        <div class="col-10">
            <div style="margin-top:3rem;">
                <div class="row">
                    <div class="col-12 col-lg-2 mx-0 mx-lg-5 mb-5 mb-lg-0">
                        <div class="row mb-5" style="background-color:white; height:250px;"> 
                            <p>  </p>
                        </div>
                        <div class="row" style="background-color:white; height:80px;">
                            <h4 class="mt-4 ml-4"> Clientes </h4>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 text-center ml-0 ml-lg-3" style="background-color:white; border-radius:10px;">
                        <h6 class="mt-4"> RELAÇÃO DEMANDA X TEMPO </h6>
                        <canvas id="myChart" height="90"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-2 mx-0 mx-lg-5">
                        <div class="row mt-5 mb-5" style="background-color:white; height:80px"> 
                            <h4 class="mt-4 ml-4"> Funcionários </h4>
                        </div>
                        <div class="row mt-5 mb-5" style="background-color:white; height:80px"> 
                            <h4 class="mt-4 ml-4"> Serviços </h4>
                        </div>
                        <div class="row mt-5" style="background-color:white; height:80px"> 
                            <h4 class="mt-4 ml-4"> Demandas </h4>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-5 mr-0 mr-lg-3 text-center" style="background-color:white; border-radius:10px;">
                        <h6 class="mt-4"> RELAÇÃO SERVIÇOS X TEMPO </h6>
                        <canvas id="myChart2" height="160"></canvas>
                    </div>
                    <div class="col-12 col-lg-4 mt-5 ml-0 ml-lg-3 text-center" style="background-color:white; border-radius:10px;">
                        <h6 class="mt-4"> RELAÇÃO FUNCIONÁRIOS / DEMANDAS X TEMPO </h6>
                        <canvas id="myChart3" height="160"></canvas>
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
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
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

var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
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

var ctx = document.getElementById('myChart3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
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


