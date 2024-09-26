<div class="card">
    <div class="card-header">
        <h3>Orders</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>P Status</th>
                    <th>D Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="odearHistroy">

                </tbody>
            </table>
        </div>
    </div>
</div>

<x-invoice-details />

<script>
    async function oderHistroy(){
        let res = await axios.get('/invoices');
        $('#odearHistroy').empty();
        res.data.data.forEach((item,index)=>{
            const inputDate = item.created_at;
            const date = new Date(inputDate);

            const formattedDate = date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            let html = `<tr>
                            <td>${index+1}</td>
                            <td>${formattedDate}</td>
                            <td>${item.payment_status}</td>
                            <td>${item.delivery_status}</td>
                            <td>${item.payable}</td>
                            <td><a data-id="${item.id}" data-cus_details="${item.cus_details}" data-transaction_id="${item.transaction_id}" class="view_invoice btn btn-fill-out btn-sm">View</a></td>
                        </tr>`;

            $('#odearHistroy').append(html);
        });

        $('.view_invoice').on('click',async function(){
            let id = $(this).data('id');
            let cus_details = $(this).data('cus_details');
            let transaction_id = $(this).data('transaction_id');
            //console.log(id,cus_details,transaction_id);
            await viewInvoice(id,cus_details,transaction_id);
        });
    }


</script>
