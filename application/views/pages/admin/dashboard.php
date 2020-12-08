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
        <div class="col-12 col-lg-2 mt-5 justify-content-center">
            <div class="d-flex align-items-center justify-content-center bg-white rounded py-4">
                <i class="fas fa-user-shield text-secondary" style="font-size:6rem;"></i>
            </div>
            <div class="d-flex align-items-center justify-content-around bg-white rounded py-3 my-2">
                <h4 class="pr-1"> Clientes </h4>
                <h4 id="clientes"> ~ </h4>
            </div>
            <div class="d-flex align-items-center justify-content-around bg-white rounded py-3 my-2">
                <h4 class="pr-1"> Consultores </h4>
                <h4 id="consultores"> ~ </h4>
            </div>
            <div class="d-flex align-items-center justify-content-around bg-white rounded py-3 my-2">
                <h4 class="pr-1"> Demandas </h4>
                <h4 id="demandas"> ~ </h4>
            </div>
            <div class="d-flex align-items-center justify-content-around bg-white rounded py-3 my-2">
                <h4 class="pr-1"> Relatorios </h4>
                <h4 id="relatorios"> ~ </h4>
            </div>
        </div>
        <div class="col-12 col-lg-8 mt-3 text-center ml-0 ml-lg-3">
            <h6 class="mt-4"> RELAÇÃO PROGRESSO X TEMPO </h6>
            <canvas id="myChart" height="159"></canvas>
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

    let data = {
        clientes:"~",
        consultores:"~",
        demandas:"~",
        relatorios:"~",
        dataRela:[],
        dataDem:[]
    }

    let lastJSON;

    setInterval(reload , 5000);

    reload();

    function reload(){
        $.ajax({
            type: 'POST',
            url: '/admin/dashboardAPI',
            error: function(xhr) {
                console.log('Error on reloading data from API');
            },
            success: function(resp){
                console.log(resp);
                console.log(lastJSON);
                if(resp!==lastJSON){
                    lastJSON = resp;
                    loadResp(JSON.parse(resp));
                }
            }});
    }

    function loadResp(resp){

        if(data.dataRela !== resp.dataRela || data.dataDem !== resp.dataDem){
            genChart(resp);
        }

        $('#clientes').html(resp.clientes);
        $('#consultores').html(resp.consultores);
        $('#demandas').html(resp.demandas);
        $('#relatorios').html(resp.relatorios);

        data = resp;
    }
</script>

<script>
var chart = null;

function genChart(set){

    if(chart!==null){
        chart.destroy();
    }

    var ctx =  document.getElementById('myChart').getContext('2d');

    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho','Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Relatórios',
                data: set.dataRela,
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
                data: set.dataDem,
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
}

genChart(data);

</script>


