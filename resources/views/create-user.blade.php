<form method="" action="" id="form-create-user" enctype="multipart/form-data">
    @csrf 
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    <!-- Modal create user -->
    <div class="modal" tabindex="-1" role="dialog" id="modalCreate" aria-labelledby="add-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">                    
                        <h5 class="modal-title">Create User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="name">User Name:</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="birthday">Date of Birth:</label>
                                <input type="date" name="birthday" placeholder="Choose your birthday" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="age">Age:</label>
                                <input type="text" name="age" placeholder="Enter your age" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="tel">Tel:</label>
                                <input type="text" name="tel" id="tel" placeholder="Enter your phone number" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" placeholder="Enter your address" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="province">Province:</label>
                                <input type="text" name="province" id="province" placeholder="Enter your province" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="email">Email:</label>
                                <input type="text" name="email" placeholder="Enter your email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="password">Password:</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-create-user">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>