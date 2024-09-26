<x-layout.app-layout>
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Verify OTP</h3>
                            </div>
                            <div >
                                <div class="form-group mb-3">
                                    <input id="loginCode" type="text" required="" class="form-control"  placeholder="OTP">
                                </div>
                                <div class="form-group mb-3">
                                    <button onclick="verifyOtp()" class="btn btn-fill-out btn-block" name="login">Verify</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

    <script >
        (async ()=>{

            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()


        async function verifyOtp(){
            let loginCode = document.getElementById('loginCode').value;
            let loginEmail = sessionStorage.getItem('loginEmail');
            if(loginCode.length === 0){
                errorTost('Please enter OTP!');
            }else {
                showAjaxPreloader();
                let res = await axios.get('/varify-otp/'+loginEmail+'/'+loginCode);
                hideAjaxPreloader();
                if(res.data.msg === 'success'){
                    successTost(res.data.data);
                    if(sessionStorage.getItem('last_location')){
                        window.location.href = sessionStorage.getItem('last_location');
                    }else {
                        window.location.href = "/";
                    }
                    sessionStorage.clear();
                    setTimeout(function () {
                        window.location.href = "/";
                    },1000)
                }else {
                    errorTost('Invalid OTP!');
                }
            }

        }






    </script>
</x-layout.app-layout>
