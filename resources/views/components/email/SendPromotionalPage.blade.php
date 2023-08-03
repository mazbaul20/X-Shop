<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Customer</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-dark "/>
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Link</label>
                                <input type="text" id="link" class="form-control" placeholder="Your website link">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label"></label>
                                <a onclick="Send()" class="btn btn-success">Send</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    async function Send() {
        let link = $('#link').val();
        showLoader();
        let res=await axios.post('/send-pmail',{'link':link});
        hideLoader();
        if(res.status===200 && res.data['status']=='success'){
            successToast(res.data['message']);
        }else{
            errorToast(res.data['message']);
        }
    }
</script>