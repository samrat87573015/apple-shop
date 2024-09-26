<div class="card">
    <div class="card-header">
        <h3>Account Details</h3>
    </div>
    <div class="card-body">
        <div >
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label>Name <span class="required">*</span></label>
                    <input id="Pcus_name" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>City <span class="required">*</span></label>
                    <input id="Pcus_city" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>State<span class="required">*</span></label>
                    <input id="cus_state" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Address <span class="required">*</span></label>
                    <input id="Pcus_address" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Postcode<span class="required">*</span></label>
                    <input id="cus_postcode" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Country <span class="required">*</span></label>
                    <input id="cus_country" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Phone<span class="required">*</span></label>
                    <input id="Pcus_phone" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Fax <span class="required">*</span></label>
                    <input id="cus_fax" required="" class="form-control" type="text" >
                </div>

            </div>
            <div class="row">
                <h5>Shipping Address</h5>
                <div class="form-group col-md-6 mb-3">
                    <label>Name <span class="required">*</span></label>
                    <input id="ship_name" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>City <span class="required">*</span></label>
                    <input id="ship_city" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>State<span class="required">*</span></label>
                    <input id="ship_state" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Address <span class="required">*</span></label>
                    <input id="ship_address" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Postcode<span class="required">*</span></label>
                    <input id="ship_postcode" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Country <span class="required">*</span></label>
                    <input id="ship_country" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Phone<span class="required">*</span></label>
                    <input id="ship_phone" required="" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Fax <span class="required">*</span></label>
                    <input id="ship_fax" required="" class="form-control" type="text" >
                </div>

                <button class="btn btn-fill-out" onclick="updateProfile()">Save Changes</button>

            </div>
        </div>
    </div>
</div>


<script>

    async function profileValueFill(){
        let res = await axios.get('/customer-profile');

        if(res.data.msg === 'success'){
            let data = res.data.data;
            //console.log(data.cus_name);

            document.getElementById('Pcus_name').value = data.cus_name;
            document.getElementById('Pcus_city').value = data.cus_city;
            document.getElementById('cus_state').value = data.cus_state;
            document.getElementById('Pcus_address').value = data.cus_address;
            document.getElementById('cus_postcode').value = data.cus_postcode;
            document.getElementById('cus_country').value = data.cus_country;
            document.getElementById('Pcus_phone').value = data.cus_phone;
            document.getElementById('cus_fax').value = data.cus_fax;
            document.getElementById('ship_name').value = data.ship_name;
            document.getElementById('ship_city').value = data.ship_city;
            document.getElementById('ship_state').value = data.ship_state;
            document.getElementById('ship_address').value = data.ship_address;
            document.getElementById('ship_postcode').value = data.ship_postcode;
            document.getElementById('ship_country').value = data.ship_country;
            document.getElementById('ship_phone').value = data.ship_phone;
            document.getElementById('ship_fax').value = data.ship_fax;

        }else {
            errorTost('Something went wrong!');
        }
    }


    async function updateProfile(){
        let cus_name = document.getElementById('Pcus_name').value;
        let cus_city = document.getElementById('Pcus_city').value;
        let cus_state = document.getElementById('cus_state').value;
        let cus_address = document.getElementById('Pcus_address').value;
        let cus_postcode = document.getElementById('cus_postcode').value;
        let cus_country = document.getElementById('cus_country').value;
        let cus_phone = document.getElementById('Pcus_phone').value;
        let cus_fax = document.getElementById('cus_fax').value;
        let ship_name = document.getElementById('ship_name').value;
        let ship_city = document.getElementById('ship_city').value;
        let ship_state = document.getElementById('ship_state').value;
        let ship_address = document.getElementById('ship_address').value;
        let ship_postcode = document.getElementById('ship_postcode').value;
        let ship_country = document.getElementById('ship_country').value;
        let ship_phone = document.getElementById('ship_phone').value;
        let ship_fax = document.getElementById('ship_fax').value;

        let data = {
            "cus_name":cus_name,
            "cus_city":cus_city,
            "cus_state":cus_state,
            "cus_address":cus_address,
            "cus_postcode":cus_postcode,
            "cus_country":cus_country,
            "cus_phone":cus_phone,
            "cus_fax":cus_fax,
            "ship_name":ship_name,
            "ship_city":ship_city,
            "ship_state":ship_state,
            "ship_address":ship_address,
            "ship_postcode":ship_postcode,
            "ship_country":ship_country,
            "ship_phone":ship_phone,
            "ship_fax":ship_fax
        }

        showAjaxPreloader();
        let res = await axios.post('/create-profile',data);
        hideAjaxPreloader();
        if(res.data.msg === 'success'){
            successTost('Profile updated successfully!');
        }else {
            errorTost('Something went wrong!');
        }
    }

</script>
