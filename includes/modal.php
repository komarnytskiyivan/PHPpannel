<div class="modal" id="ModalAdd" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="display:none;">
            <label for="name" class="col-form-label">Id:</label>
            <input type="text" class="form__control edit-item-id" required name="id" placeholder="id">
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form__control" required name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="lastname" class="col-form-label">Lastname:</label>
            <input type="text" class="form__control" required name="lastname" placeholder="Lastname">
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status:</label>
            <label class="switch">
               <input type="checkbox" class="form__control" name="status">
               <span class="slider round"></span>
            </label>
          </div>
          <div class="form-group">
            <label for="role" class="col-form-label">Role:</label>
            <select class="form__control" name="role">
               <option>admin</option>
               <option>user</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-modal-add-edit" data-dismiss="modal">Send message</button>
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
            <a href="" class="btn btn-primary btn-save-changes btn-delete-solo" data-dismiss="modal">Apply</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>