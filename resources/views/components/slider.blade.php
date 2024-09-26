<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div id="homeSliders" class="carousel-inner">

            <div class="carousel-item background_bg active" data-img-src="assets/images/banner16.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-10">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">LED 75 INCH F58</h2>
                                    <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s">Get up to <span class="text_default">50%</span> off Today Only!</h5>
                                    <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->


<script>

    async function sliderList() {
        let res = await axios.get('/product-sliders');
        $('#homeSliders').empty();
        res.data.data.forEach(item => {
            let html = `
                         <div class="carousel-item background_bg active" data-img-src="${item.slider_image}">
                            <div class="banner_slide_content banner_content_inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7 col-10">
                                            <div class="banner_content overflow-hidden">
                                                <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">${item.slider_title}</h2>
                                                <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s">${item.slider_desc}</h5>
                                                <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`

            $('#homeSliders').append(html);

        });
    }
</script>
