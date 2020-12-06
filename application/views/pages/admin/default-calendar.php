<link rel="stylesheet" href="/resources/style/adminStyle.css"/>
<link rel="stylesheet" href="/resources/node_modules/fullcalendar/main.css"/>
<script src="/resources/node_modules/fullcalendar/main.js"></script>

<div style="position:fixed;top:0px;width:100%;z-index:-1;">
    <video id="top-video" autoplay loop muted playsinline style="pointer-events: none;"></video>
</div>

<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="d-none d-lg-flex col-12 mt-4" style="position:absolute;">
            <a href="/admin/selector" class="text-dark" style="font-size:2rem;"><i id="btn-back" class="fa fa-chevron-circle-left text-white"></i></a>
        </div>
        <div class="col-11">
            <div id='calendar' class="w-100 mt-1 p-4 rounded" style="background-color: rgba(255, 255, 255, 1);"></div>
        </div>
    </div>
</div>

<style>
    #btn-back:hover{
        color: rgba(255, 255, 255, 0.8)!important;
    }
</style>

<script>
   $(document).ready(function(){
        $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek,'
        },
        editable: false,
        navLinks: true,
        selectHelper: true,
        events: {
            url: 'dashboard/Test_Function',
            type: 'POST',
            data: {
            value1: 'aaa',
            value2: 'bbb'
            },
            success: function(data) {
            console.log(data);
            },
            error: function() {
            alert('Erro ao carregar eventos!');
            },
        }
        });
    });
</script>

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
