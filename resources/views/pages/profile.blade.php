<x-layout.app-layout>

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Profile</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Profile Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Update Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}"><i class="ti-lock"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Dashboard</h3>
                                </div>
                                <div class="card-body">
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="javascript:;" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:;" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:;" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <x-order-histroy />
                        </div>
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3>Billing Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Shipping Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <x-update-profile />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <script>
        (async ()=>{
            await oderHistroy();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            await profileValueFill();
        })()

    </script>
</x-layout.app-layout>
