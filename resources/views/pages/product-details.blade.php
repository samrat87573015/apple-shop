<x-layout.app-layout>

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src='' alt="product_img1" />
                        </div>
                        <div class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                            <div class="item">
                                <img id="pImg1" src="" alt="product_small_img1" />
                            </div>
                            <div class="item">
                                <img id="pImg2" src="" alt="product_small_img2" />
                            </div>
                            <div class="item">
                                <img id="pImg3" src="" alt="product_small_img3" />
                            </div>
                            <div class="item">
                                <img id="pImg4" src="" alt="product_small_img4" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 id="pdTitle" class="product_title"></h4>
                            <div class="product_price">
                                <span class="price"> <span id="pdDiscountPrice"></span></span>
                                <del> <span id="pdPrice"></span></del>
                                <div class="on_sale">
                                    <span id="pdDiscountParsent"></span>
                                </div>
                            </div>
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div id="pdProductStar" class="product_rate"></div>
                                </div>
                                <span id="pdRatingCount" class="rating_num"></span>
                            </div>
                            <div class="pr_desc">
                                <p id="pdShortDesc"></p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                    <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                    <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                </ul>
                            </div>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Color</span>
                                <select id="pd_color" class="product_color_switch">

                                </select>
                            </div>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Size</span>
                                <select id="pd_size" class="product_size_switch">

                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input id="quantity" type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                <button onclick="addToCart()" class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                                <button id="wishBtn" onclick="addToWishlist()" class="add_wishlist"><i class="icon-heart"></i></button>
                            </div>
                        </div>
                        <hr />
                        <ul class="product-meta">
                            <li id="pd_bottom_cat"></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews <span id="titleReviewCount"></span></a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                            </div>
                            <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Capacity</td>
                                        <td>5 Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Black, Brown, Red,</td>
                                    </tr>
                                    <tr>
                                        <td>Water Resistant</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Artificial Leather</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title"><span id="pdreview_count"></span> Review For <span id="review_pTitle"></span></h5>
                                    <ul id="pd_reviewRow" class="list_none comment_list mt-4">


                                    </ul>
                                </div>
                                <div class="review_form field_form">
                                    <h5>Add a review</h5>
                                    <div class="row mt-3">
                                        <div class="form-group col-12 mb-3">
                                            <input id="addRating" type="hidden" required>
                                            <div class="star_rating">
                                                <span id="star1" data-value="1"><i class="far fa-star"></i></span>
                                                <span id="star2" data-value="2"><i class="far fa-star"></i></span>
                                                <span id="star3" data-value="3"><i class="far fa-star"></i></span>
                                                <span id="star4" data-value="4"><i class="far fa-star"></i></span>
                                                <span id="star5" data-value="5"><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <textarea id="writeReview" required="required" placeholder="Your review *" class="form-control" rows="4"></textarea>
                                        </div>

                                        <div class="form-group col-12 mb-3">
                                            <button onclick="createReview()" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Releted Products</h3>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img1.jpg" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img2.jpg" alt="product_img2">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
                                    <div class="product_price">
                                        <span class="price">$55.00</span>
                                        <del>$95.00</del>
                                        <div class="on_sale">
                                            <span>25% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:68%"></div>
                                        </div>
                                        <span class="rating_num">(15)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#847764"></span>
                                            <span data-color="#0393B5"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <span class="pr_flash">New</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img3.jpg" alt="product_img3">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
                                    <div class="product_price">
                                        <span class="price">$68.00</span>
                                        <del>$99.00</del>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#333333"></span>
                                            <span data-color="#7C502F"></span>
                                            <span data-color="#2F366C"></span>
                                            <span data-color="#874A3D"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img4.jpg" alt="product_img4">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
                                    <div class="product_price">
                                        <span class="price">$69.00</span>
                                        <del>$89.00</del>
                                        <div class="on_sale">
                                            <span>20% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:70%"></div>
                                        </div>
                                        <span class="rating_num">(22)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#333333"></span>
                                            <span data-color="#A92534"></span>
                                            <span data-color="#B9C2DF"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="assets/images/product_img5.jpg" alt="product_img5">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#5FB7D4"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <style>
        .comment_block {
            padding-left: 0px;
        }
    </style>


    <script>

        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        (async ()=>{
            await productDetails();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            await productReview();
        })()

        //console.log(id);

        async function productDetails() {


            let res = await axios.get('/products/'+id);
            //console.log(res.data.data);

            let details = res.data.data;
            //console.log(details);

            document.getElementById('product_img').src = details[0]['product']['image'];

            document.getElementById('pImg1').src = details[0]['image1'];
            document.getElementById('pImg2').src = details[0]['image2'];
            document.getElementById('pImg3').src = details[0]['image3'];
            document.getElementById('pImg4').src = details[0]['image4'];

            $('#pImg1').on('click', function () {
                $('#product_img').attr('src', details[0]['image1']);
            });
            $('#pImg2').on('click', function () {
                $('#product_img').attr('src', details[0]['image2']);
            });
            $('#pImg3').on('click', function () {
                $('#product_img').attr('src', details[0]['image3']);
            });
            $('#pImg4').on('click', function () {
                $('#product_img').attr('src', details[0]['image4']);
            });



            document.getElementById('pdTitle').innerHTML = details[0]['product']['title'];
            document.getElementById('review_pTitle').innerHTML = details[0]['product']['title'];


            if(details[0]['product']['discount'] === 1){
                document.getElementById('pdPrice').innerHTML = `$ ${details[0]['product']['price']}`
                document.getElementById('pdDiscountPrice').innerHTML = `$ ${details[0]['product']['discount_price']}`;
                let discountPercentage = ((details[0]['product']['price'] - details[0]['product']['discount_price']) / details[0]['product']['price'] * 100).toFixed(0);
                document.getElementById('pdDiscountParsent').innerHTML = `${discountPercentage}% Off`;
            }else {
                document.getElementById('pdDiscountPrice').innerHTML = `$ ${details[0]['product']['price']}`;
            }


            document.getElementById('pdShortDesc').innerHTML = details[0]['product']['short_des'];

            const starRating = details[0]['product']['star'];
            const maxStars = 5;

            const starWidth = (starRating / maxStars) * 100;
            starWidth.toFixed(0);


            document.getElementById('pdProductStar').style.width = `${starWidth}%`;
            document.getElementById('pdRatingCount').innerHTML = details[0]['product']['star'];

            let size = details[0]['size'].split(',');
            let color = details[0]['color'].split (',');

            let sizeOption = `<option value="">Choose Size</option>`;
            $('#pd_size').append(sizeOption);
            size.forEach(element => {
                let option = `<option value="${element}">${element}</option>`;
                $('#pd_size').append(option);
            });


            let colorOption = `<option value="">Choose Color</option>`;
            $('#pd_color').append(colorOption);
            color.forEach(element => {
                let option = `<option value="${element}">${element}</option>`;
                $('#pd_color').append(option);
            });


        }

        async function addToCart() {
            let pd_color = document.getElementById('pd_color').value;
            let pd_size = document.getElementById('pd_size').value;
            let quantity = document.getElementById('quantity').value;

            if(pd_size.length === 0){
                errorTost('Please select size!');
            }else if(pd_color.length === 0){
                errorTost('Please select color!');
            }else {
                showAjaxPreloader();
                let res = await axios.post('/add-to-cart',{
                    "product_id":id,
                    "quantity": quantity,
                    "color": pd_color,
                    "size": pd_size
                });
                hideAjaxPreloader();

                if(res.data.code === 200){
                    successTost('Added to cart!');
                   await minCartList();
                }else {
                    errorTost('Please login!');
                    sessionStorage.setItem('last_location', window.location.href);
                    setTimeout(function () {
                        window.location.href = "/login";
                    },1000);
                }


            }


        }


        async function addToWishlist() {

            showAjaxPreloader();
            let res = await axios.get('/add-to-wish/'+id);
            hideAjaxPreloader();
           if(res.data.msg === 'success'){

               $('#wishBtn').addClass('added');
               successTost('Added to wishlist!');
               await countWishList();
           }else{

               errorTost('Please login!');
               sessionStorage.setItem('last_location', window.location.href);
               setTimeout(function () {
                   window.location.href = "/login";
               },1000);

           }


        }


        async function productReview(){
            showAjaxPreloader();
            let res = await axios.get('/product-by-review/'+id);
            hideAjaxPreloader();

            $('#pd_reviewRow').empty();
            document.getElementById('pdreview_count').innerHTML = res.data.data.length;
            document.getElementById('titleReviewCount').innerHTML = res.data.data.length;

            res.data.data.forEach((item)=>{
                const inputDate = item.created_at;
                const date = new Date(inputDate);

                const formattedDate = date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                let html = `<li>
                                <div class="comment_block">
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width: ${item['rating'] * 20}%;"></div>
                                        </div>
                                    </div>
                                    <p class="customer_meta">
                                        ${item['user']['profile'] === null ? '<span class="review_author">Anonymous</span>' : `<span class="review_author">${item['user']['profile']['cus_name']}</span>`}
                                        <span class="comment-date">${formattedDate}</span>
                                    </p>
                                    <div class="description">
                                        <p>${item.review}</p>
                                    </div>
                                </div>
                            </li>`;

                $('#pd_reviewRow').append(html);
            });
        }

        let star1 = document.getElementById('star1');
        star1.addEventListener('click', function (){
            document.getElementById('addRating').value = 1;
        });
        let star2 = document.getElementById('star2');
        star2.addEventListener('click', function (){
            document.getElementById('addRating').value = 2;
        });
        let star3 = document.getElementById('star3');
        star3.addEventListener('click', function (){
            document.getElementById('addRating').value = 3;
        });
        let star4 = document.getElementById('star4');
        star4.addEventListener('click', function (){
            document.getElementById('addRating').value = 4;
        });
        let star5 = document.getElementById('star5');
        star5.addEventListener('click', function (){
            document.getElementById('addRating').value = 5;
        });

        async function createReview(){
            let writeReview = document.getElementById('writeReview').value;
            let starRating = document.getElementById('addRating').value;
            if(writeReview.length === 0){
                errorTost('Write your feedback');
            }else if(starRating.length === 0){
                errorTost('select star');
            }else {
                showAjaxPreloader();
                let res = await axios.post('/create-review',{
                    "product_id": id,
                    "rating": starRating,
                    "review": writeReview
                });
                hideAjaxPreloader();

                if(res.data.msg === 'success'){
                    await productReview();
                    successTost('Added your feedback');
                }else {
                    errorTost('Please login!');
                }
            }

        }



    </script>

</x-layout.app-layout>
