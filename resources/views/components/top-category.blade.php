
<!-- START SECTION CATEGORIES -->
<div class="section small_pb small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Categories</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12">
                <div id="homeTopCatList" class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "5"}, "991":{"items": "6"}, "1199":{"items": "7"}}'>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CATEGORIES -->

<script>

    async function getTopCategoryList() {
        let res = await axios.get('/category-list');
        $('#homeTopCatList').empty();
        res.data['data'].forEach(item => {
            let html = `
                     <div class="item">
                        <div class="categories_box">
                            <a href="/category-by-product?id=${item.id}">
                                <img src="${item.categoryImage}" alt="cat_img1"/>
                                <span>${item.categoryName}</span>
                            </a>
                        </div>
                    </div>`;
            $('#homeTopCatList').append(html);
        });
    }
</script>
