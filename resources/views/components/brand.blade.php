<!-- START SECTION CLIENT LOGO -->
<div class="section small_pt">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div id="homeBrandList" class="client_logo carousel_slider owl-carousel owl-theme" data-dots="false" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CLIENT LOGO -->


<script>
    brandlist();
    async function brandlist() {
        let res = await axios.get('/brand-list');
        $('#homeBrandList').empty();

        res.data.data.forEach(item => {
            let html = `<div class="item">
                        <div class="cl_logo">
                            <img src="${item.brandImage}" alt="cl_logo"/>
                        </div>
                    </div>`;
            $('#homeBrandList').append(html);
        });
    }
</script>
