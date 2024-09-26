<!-- Modal -->
<div class="modal fade" id="invoiceDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="invoice_item">
                    <div class="cus_details">
                        <p id="cus_name"></p>
                        <p id="cus_address"></p>
                        <p id="cus_city"></p>
                        <p id="cus_phone"></p>
                        <p>Transaction ID: <span id="tran_id"></span></p>
                    </div>
                    <div class="invoiceDetails_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product</th>
                                <th>Qnt</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody id="invoiceProducts">

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .invoiceDetails_table{
        padding: 20px 0;
    }
    .cus_details p {
        margin-bottom: 0;
    }
</style>


<script>
    async function viewInvoice(id,cus_details,transaction_id){

        document.getElementById('cus_name').innerHTML = cus_details.split(',')[0];
        document.getElementById('cus_address').innerHTML = cus_details.split(',')[1];
        document.getElementById('cus_city').innerHTML = cus_details.split(',')[2];
        document.getElementById('cus_phone').innerHTML = cus_details.split(',')[3];
        document.getElementById('tran_id').innerHTML = transaction_id;

        showAjaxPreloader();
        let res = await axios.get('/invoiceProducts/'+id);
        hideAjaxPreloader();
        $('#invoiceDetails').modal('show');

        $('#invoiceProducts').empty();
        res.data.data.forEach((item,index)=>{
            let html = `<tr>
                            <td>${index+1}</td>
                            <td>${item['product']['title']}</td>
                            <td>${item.quantity}</td>
                            <td>${item.sale_price}</td>
                        </tr>`;
            $('#invoiceProducts').append(html);
        });



    }
</script>
