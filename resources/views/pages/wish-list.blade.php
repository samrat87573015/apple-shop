<x-layout.app-layout>

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Wishlist</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
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
                    <div class="table-responsive wishlist_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="WPwishList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->


    <script>
        (async ()=>{
            await wishList();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()



        async function wishList(){
            let res = await axios.get('/product-wish');

            if(res.data.data.length === 0){
                $('#WPwishList').empty();
                $('#WPwishList').append(`<tr><td colspan="6" class="text-center">No data found</td></tr>`);
            }else {
                $('#WPwishList').empty();
                res.data.data.forEach((item)=>{
                    let html = ` <tr>
                                <td class="product-thumbnail"><a href="/product-details/?id=${item['product']['id']}"><img src="${item['product']['image']}" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="/product-details/?id=${item['product']['id']}">${item['product']['title']}</a></td>
                                    ${item['product']['discount'] ? `<td class="product-price" data-title="Price">$${item['product']['discount_price']}</td>` : `<td class="product-price" data-title="Price">$${item['product']['price']}</td>`}

                                <td class="product-stock-status" data-title="Stock Status"><span class="badge rounded-pill text-bg-success">In Stock</span></td>
                                <td class="product-add-to-cart"><a href="/product-details/?id=${item['product']['id']}" class="btn btn-fill-out"> view</a></td>
                                <td class="product-remove" data-title="Remove"><button data-id="${item['product']['id']}" class="wish-remove"><i class="ti-close"></i></button></td>
                            </tr>`

                    $('#WPwishList').append(html);
                });

            }

            $('.wish-remove').on('click',async function(){
                let id = $(this).data('id');
                 await removeWishitem(id);
            })

        }


        async function removeWishitem(id){
            showAjaxPreloader();
            let res = await axios.get('/remove-from-wish/'+id);
            hideAjaxPreloader();
            if(res.data.msg === 'success'){
                successTost('Removed from wishlist');
                await wishList();
                await countWishList();
            }else {
                errorTost('Something went wrong!');
            }

        }



    </script>
</x-layout.app-layout>
