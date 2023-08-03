<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <input class="d-none" id="updateID">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Address *</label>
                                <input type="text" class="form-control" id="customerAddress">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Phone *</label>
                                <input type="text" class="form-control" id="customerPhone">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn btn-sm  btn-success" >Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id){
        $('#updateID').val(id);
        showLoader();
        let res=await axios.post('/customer-by-id',{id:id});
        hideLoader();
        $('#customerName').val(res.data['name']);
        $('#customerEmail').val(res.data['email']);
        $('#customerAddress').val(res.data['address']);
        $('#customerPhone').val(res.data['phone']);
    }

    async function Update(){
        let id=$('#updateID').val();
        let name=$('#customerName').val();
        let email=$('#customerEmail').val();
        let address=$('#customerAddress').val();
        let phone=$('#customerPhone').val();
        showLoader();
        let res=await axios.put('/update-customer',{
            id:id,
            name:name,
            email:email,
            address:address,
            phone:phone
        });
        hideLoader();
        if(res.data===1){
            $('#update-modal-close').click();
            successToast('Data updated successful');
            await getList();
        }else{
            errorToast('Request fail!');
        }
    }
</script>