<x-layout.app-layout>

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shopping Cart</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="cartList">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td id="cat_subTotal" class="cart_total_amount"></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong id="cart_total_amount"></strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button onclick="checkOut()" class="btn btn-fill-out">Proceed To CheckOut</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->



    <script>
        (async ()=>{
            await cartList();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()


        async function cartList(){
            let res = await axios.get('/cart-list-api');

            //console.log(res.data.data);

            $('#cartList').empty();

            res.data.data.forEach((item)=>{
                let html = `  <tr>
                                <td class="product-thumbnail"><a href="/product-details/?id=${item['product']['id']}"><img src="${item['product']['image']}" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="/product-details/?id=${item['product']['id']}">${item['product']['title']}</a></td>
                                 ${item['product']['discount'] ? `<td class="product-price" data-title="Price">$${item['product']['discount_price']}</td>` : `<td class="product-price" data-title="Price">$${item['product']['price']}</td>`}
                                <td class="product-quantity" data-title="Quantity">${item.quantity}</td>
                                <td class="product-subtotal" data-title="Total">$ ${item.price}</td>
                                <td class="product-remove" data-title="Remove"><button class="cart_remove" data-id="${item['product']['id']}"><i class="ti-close"></i></button></td>
                            </tr>`

                $('#cartList').append(html);
            })

            $('.cart_remove').on('click',async function(){
                let id = $(this).data('id');
                await removeCartitem(id);
            });

            await cartTotal(res.data.data);


        }



        async function removeCartitem(id){
            showAjaxPreloader();
            let res = await axios.get('/delete-cart/'+id);
            hideAjaxPreloader();
            if(res.data.msg === 'success'){
                successTost('Removed from cart');
                await cartList();
                await minCartList();
            }else {
                errorTost('Something went wrong!');
            }
        }


        async function cartTotal(data){
            $('#cart_total_amount').empty();
            $('#cat_subTotal').empty();
            let total = 0;
            data.forEach((item)=>{
                total = total + parseFloat(item.price);
            })
            $('#cart_total_amount').append('$'+total);
            $('#cat_subTotal').append('$'+total);
        }



        async function checkOut(){
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

</x-layout.app-layout>
