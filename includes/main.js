let modalTitle = document.querySelector('.modal-title');
let modalText = document.querySelector('.modal-text');
let saveChanges = document.querySelector('.btn-save-changes');
let deletes = document.querySelectorAll('.delete-item');
let edits = document.querySelectorAll('.edit-item');
let modalContent = document.querySelector('.modal-content')
deletes.forEach(element => {
    element.addEventListener('click',e => {
    modalTitle.textContent = `Delete row`;
    console.log(element.id);
    modalText.textContent = `Are you sure want to delete row №${element.id}?`;
    saveChanges.href = `./index.php?delete=${element.id}`;
    })
})
edits.forEach(element => {
    element.addEventListener('click',e => {
    modalTitle.textContent = `Edit row`;
    console.log(element.id);
    modalContent.innerHTML = `
    <div class="modal-header">
        <h5 class="modal-title">Edit row</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="form" method="POST" >
        <div class="modal-body">
            <div class="form__group">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form__control" required name="name" placeholder="Name"> 
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form__control" required name="nickname" placeholder="Lastname">
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button action="./index.php" name="edit_post" type="submit" class="btn btn-primary btn-save-changes">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
    `;
    })
})