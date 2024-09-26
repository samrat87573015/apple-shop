<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Exclusive Products</h2>
                </div>
            </div>
		</div>
        <div class="row">
        	<div class="col-12">
            	<div id="productTab" class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a data-remark="new" data-id="reTabNew" class="nav-link active" id="arrival-tab" data-bs-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">New Arrival</a>
                        </li>
                        <li class="nav-item">
                            <a data-remark="trending" data-id="reTabTrending" class="nav-link" id="trending-tab" data-bs-toggle="tab" href="#trending" role="tab" aria-controls="trending" aria-selected="false">Trending</a>
                        </li>
                        <li class="nav-item">
                            <a data-remark="popular" data-id="reTabPopular" class="nav-link" id="popular-tab" data-bs-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="false">Popular</a>
                        </li>
                        <li class="nav-item">
                            <a data-remark="special" data-id="reTabSpecial" class="nav-link" id="special-tab" data-bs-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Special</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div id="reTabNew" class="row shop_container">


                        </div>
                    </div>
                    <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                        <div id="reTabTrending" class="row shop_container">


                        </div>
                    </div>
                    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                        <div id="reTabPopular" class="row shop_container">

                        </div>
                    </div>
                    <div class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
                        <div id="reTabSpecial" class="row shop_container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- END SECTION SHOP -->

<style>
    .rating_wrap .rating {
        width: 68px;
    }
    .HomeAddToWish{
        cursor: pointer;
    }

</style>



<script>

    async function getRemarkAbdID(){
        let remark = 'new';
        let id = 'reTabNew';
        await getProductByRemark(remark, id);
        //console.log(remark, id);
        $('#productTab ul li a').on('click',async function(){

            let remark = $(this).attr('data-remark');
            let id = $(this).attr('data-id');
            //console.log(remark, id);
            await getProductByRemark(remark, id);
        })


    }


    //getProductByRemark();
    async function getProductByRemark(remark,id){

        showAjaxPreloader();
        let res = await axios.get('/product-by-remark/'+remark);
        hideAjaxPreloader();


        $('#'+id).empty();


        res.data.data.forEach(item => {
            let discountPercentage = ((item.price - item.discount_price) / item.price * 100).toFixed(0);

            const starRating = item.star;
            const maxStars = 5;

            const starWidth = (starRating / maxStars) * 100;
            starWidth.toFixed(0);




            let html = `
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    ${item.remark === "new" ? `<span class="pr_flash">${item.remark}</span>` : ''}
                                    ${item.remark === "trending" ? `<span class="pr_flash bg-danger">${item.remark}</span>` : ''}
                                    ${item.remark === "special" ? `<span class="pr_flash bg-success">${item.remark}</span>` : ''}
                                    ${item.remark === "popular" ? `<span class="pr_flash bg-info">${item.remark}</span>` : ''}

                                    <div class="product_img">
                                        <a href="/product-details?id=${item.id}">
                                            <img src="${item.image}" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="/product-details?id=${item.id}"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a class="HomeAddToWish" data-id="${item.id}"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="/product-details?id=${item.id}">${item.title}</a></h6>
                                        <div class="product_price">
                                            ${item.discount === 1 ? `<span class="price">$ ${item.discount_price}</span>` : `<span class="price">$ ${item.price}</span>`}

                                            ${item.discount === 1 ? `<del>$ ${item.price}</del>` : ''}

                                            <div class="on_sale">
                                                ${item.discount === 1 ? `<span>${discountPercentage}% Off</span>` : ''}

                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:${starWidth}%"></div>
                                            </div>
                                            <span class="rating_num">(${item.review.length})</span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;



            $('#'+id).append(html);

        });

        $('.HomeAddToWish').on('click',async function () {
            let id = $(this).data('id');
            await HomeaddToWishlist(id);
        })


    }

    async function HomeaddToWishlist(id) {

        showAjaxPreloader();
        let res = await axios.get('/add-to-wish/'+id);
        hideAjaxPreloader();
        if(res.data.code === 401){
            errorTost('Please login!');
            sessionStorage.setItem('last_location', window.location.href);
            setTimeout(function () {
                window.location.href = "/login";
            },1000);
        }else{
            successTost('Added to wishlist!');
            await countWishList();
        }


    }


</script>
