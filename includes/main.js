let deletes = document.querySelectorAll('.delete-item');
let edits = document.querySelectorAll('.edit-item');
let deleteSolo = document.querySelector('.btn-delete-solo');
let addSolo = document.querySelector('.Add-item')
deletes.forEach(element => {
    element.addEventListener('click',e => {   
      deleteSolo.href =  `./index.php?delete=${element.id}`;
    })
})
edits.forEach(element => {
    element.addEventListener('click',e => {
    addSolo.value = `${element.id}`;
    })
})