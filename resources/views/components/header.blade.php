
<!-- START HEADER -->
<header class="header_wrap">

    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img class="logo_light" src="{{asset('assets/images/logo_light.png')}}" alt="logo">
                    <img class="logo_dark" src="{{asset('assets/images/logo_dark.png')}}" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form>
                        <div class="input-group">
                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    @if(Cookie::get('LoginToken')!== null)
                        <li><a href="{{route('customer-profile-page')}}" class="nav-link"><i class="linearicons-user"></i></a></li>
                        <li><a href="{{route('wishListPage')}}" class="nav-link"><i class="linearicons-heart"></i><span id="wishlist_count" class="wishlist_count"></span></a></li>
                        <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="{{route('cartListPage')}}" data-bs-toggle="dropdown"><i class="linearicons-bag2"></i><span id="minCart_count" class="cart_count"></span><span class="amount"><span id="minCartTotal"></span></span></a>
                            <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                                <ul id="minCartList" class="cart_list">

                                </ul>
                                <div class="cart_footer">
                                    <p class="cart_total"><strong>Subtotal:</strong> <span id="minCartSubTotal"></span></p>
                                    <p class="cart_buttons"><a href="{{route('cartListPage')}}" class="btn btn-fill-line view-cart">View Cart</a><a onclick="minCheckOut()" class="btn btn-fill-out checkout">Checkout</a></p>
                                </div>
                            </div>
                        </li>
                    @else
                        <li><a href="{{route('login-page')}}" class="nav-link"><i class="linearicons-user"></i></a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <span>All Categories </span><i class="linearicons-menu"></i>
                        </button>
                        <div id="navCatContent" class="navbar nav collapse">
                            <ul id="header_cat_menu">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:;" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a class="nav-link nav_item" href="{{route('home')}}">Home</a></li>
                                <li><a class="nav-link nav_item" href="#">Product</a></li>
                                <li><a class="nav-link nav_item" href="#">Blog</a></li>
                                <li><a class="nav-link nav_item" href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->

<style>
    ul#header_cat_menu li img {
        width: 30px !important;
        margin-right: 7px;
        border-radius: 50%;
        height: 30px;
        object-fit: cover;
    }
</style>


<script>
    getCategoryList();
    async function getCategoryList() {
        let res = await axios.get('/category-list');
        $('#header_cat_menu').empty();
        res.data['data'].forEach(item => {
            let html = `<li><a class="dropdown-item nav-link nav_item" href="/category-by-product?id=${item.id}"><img src="${item.categoryImage}" alt=""> <span>${item.categoryName}</span></a></li>`;
            $('#header_cat_menu').append(html);
        });
    }

    countWishList();
    async function countWishList(){
        let res = await axios.get('/wish-list-count');
        if(res.data.msg === 'success'){
            document.getElementById('wishlist_count').innerText = res.data.data;
        }
    }

    minCartList();
    async function minCartList(){
        showAjaxPreloader();
        let res = await axios.get('/cart-list-api');
        hideAjaxPreloader();
        document.getElementById('minCart_count').innerText = res.data.data.length;
        $('#minCartList').empty();

        res.data.data.forEach((item)=>{
            let html = ` <li>
                            <button data-id="${item['product']['id']}" class="mincartRemove item_remove"><i class="ion-close"></i></button>
                            <a href="/product-details/?id=${item['product']['id']}"><img src="${item['product']['image']}" alt="cart_thumb1">${item['product']['title']}</a>
                            <span class="cart_quantity"> ${item['quantity']} x <span class="cart_amount"> <span class="price_symbole">$</span></span>${item['product']['discount']=== 0 ? `${item['product']['price']}` : `${item['product']['discount_price']}`} <span>=</span><span>$</span><span>${item.price}</span></span>
                        </li>`;


            $('#minCartList').append(html);
        });

        $('.mincartRemove').on('click',async function (){
            let id = $(this).data('id');
            await removeMinCartitem(id);
        });

        await minCartTotal(res.data.data)


    }


    async function minCartTotal(data){
        $('#minCartTotal').empty();
        $('#minCartSubTotal').empty();
        let total = 0;
        data.forEach((item)=>{
            total = total + parseFloat(item.price);
        })
        $('#minCartTotal').append('$'+total);
        $('#minCartSubTotal').append('$'+total);
    }

    async function removeMinCartitem(id){
        showAjaxPreloader();
        let res = await axios.get('/delete-cart/'+id);
        hideAjaxPreloader();
        if(res.data.msg === 'success'){
            successTost('Removed from cart');
            await  minCartList();
            await cartList();
        }else {
            errorTost('Something went wrong!');
        }
    }


    async function minCheckOut(){
        showAjaxPreloader();
        let res = await axios.get('/create-invoice');
        hideAjaxPreloader();

        if(res.data.msg === 'success'){
            let paymentUrl = res.data.data['payment_method']['GatewayPageURL'];
            window.location.href = paymentUrl;
        }else {
            errorTost('Complete your profile first');
        }

    }


</script>
