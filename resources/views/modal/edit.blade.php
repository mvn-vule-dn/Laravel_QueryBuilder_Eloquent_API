<form method="" action="" id="form-edit-user" enctype="multipart/form-data">
    @csrf 
    <input type="hidden" name="_method" value="PUT">
    <!-- Modal edit user -->
    <div class="modal" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">                    
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-11">
                            <label for="name">User Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" readonly name="email" id="email">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="age">Age:</label>
                                <input type="text" class="form-control" name="age" id="age">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="birthday">Date of Birth:</label>
                                <input type="date" class="form-control" name="birthday" id="birthday">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label>Avatar:</label>
                                <input type="file" class="form-control" name="avatar" id="avatar">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-update-user">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>