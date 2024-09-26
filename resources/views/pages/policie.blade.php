<x-layout.app-layout>

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1 id="PolicesType"></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li id="smPolicesType" class="breadcrumb-item active">About</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <div class="polices_page_area section small_pb small_pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="polices_page_content">
                        <div class="polices_page_content_inner">
                            <p id="policesContent"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script >
        (async () => {
            await loadPolicy();

            $(".preloader").delay(700).fadeOut(700).addClass('loaded');

        })();

       async function loadPolicy(){
           let searchParams = new URLSearchParams(window.location.search);
           let type = searchParams.get('type');
           //console.log(type);

           let res = await axios.get('/policie/'+type);

           $('#policesContent').empty();

           //console.log(res.data);

           document.getElementById('smPolicesType').innerText = res.data.data.type;

           document.getElementById('PolicesType').innerText = res.data.data.type;
           document.getElementById('policesContent').innerHTML = res.data.data.content;


        }



    </script>

</x-layout.app-layout>
