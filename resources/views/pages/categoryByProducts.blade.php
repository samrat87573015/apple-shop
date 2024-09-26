<x-layout.app-layout>


    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1 id="catName"></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li id="smCatName" class="breadcrumb-item active">About</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->


    <div class="category_by_products section small_pb small_pt">
        <div class="container">
            <div id="catPageProducts" class="row">

            </div>
        </div>
    </div>



    <script>

        (async () => {
            await categoryByProducts ();
            $(".preloader").delay(700).fadeOut(700).addClass('loaded');

        })();


        async function categoryByProducts (){

            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('id');


            let res = await axios.get('/product-by-category/'+id);

            $('#catPageProducts').empty();

            res.data.data.forEach((item) => {
                console.log(item);
                document.getElementById('catName').innerHTML = item.category.categoryName;
                document.getElementById('smCatName').innerHTML = item.category.categoryName;


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
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
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

                                        </div>
                                    </div>
                                </div>
                            </div>`;


                $('#catPageProducts').append(html);

            });



        }




    </script>

</x-layout.app-layout>
