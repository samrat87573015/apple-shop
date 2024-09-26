<x-layout.app-layout>
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Login</h3>
                            </div>
                            <div >
                                <div class="form-group mb-3">
                                    <input id="loginEmail" type="text" required="" class="form-control" name="email" placeholder="Your Email">
                                </div>
                                <div class="form-group mb-3">
                                    <button onclick="login()" class="btn btn-fill-out btn-block" name="login">Log in</button>
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


        async function login(){
            let loginEmail = document.getElementById('loginEmail').value;
            if(loginEmail.length === 0){
                errorTost('Please enter email!');
            }else {
                showAjaxPreloader();
                let res = await axios.get('/login/'+loginEmail);
                hideAjaxPreloader();
                if(res.data.msg === 'success'){
                    successTost(res.data.data);
                    sessionStorage.setItem('loginEmail', loginEmail);
                    setTimeout(function () {
                        window.location.href = "/varify-otp";
                    },1000)
                }else {
                    errorTost('Invalid email!');
                }
            }

        }






    </script>
</x-layout.app-layout>
