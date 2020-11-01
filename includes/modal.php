<div class="modal" id="ModalAdd" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add/edit rows</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <form class="form" method="POST" >
            <div class="form__group">
                <div class="row">
                  <div class="col-md-6" style = " display:none;">
                    <input type="text" class="form__control Add-item" required name="id" value = ""> 
                  </div>
                  <div class="col-md-6" style="margin-top:10px;">
                    <input type="text" class="form__control" required name="name" placeholder="Name"> 
                  </div>
                  <div class="col-md-6" style="margin-top:10px;">
                    <input type="text" class="form__control" required name="lastname" placeholder="Lastname">
                  </div>
                  <div class="col-md-6"  style="margin-top:10px;">          
                    <label class="switch">
                      <input type="checkbox" class="form-control" name="status">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-md-6"  style="margin-top:10px;">
                    <select class="form-control" name="role">
                      <option>admin</option>
                      <option>user</option>
                    </select>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button name="edit_post" type="submit" class="btn btn-primary btn-save-changes">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="ModalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <p class="modal-text">Are you sure want to do this?</p>
        </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary btn-save-changes btn-delete-solo">Save changes</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>