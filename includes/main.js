let deletes = document.querySelectorAll('.delete-item');
let edits = document.querySelectorAll('.edit-item');
let deleteSolo = document.querySelector('.btn-delete-solo');
let editSolo = document.querySelector('.edit-item');
let addSolo = document.querySelectorAll('.btn-add-item');
let type = document.querySelector('.btn-modal-add-edit');
let checkMain = document.querySelector('#scales');
let checkers = document.querySelectorAll('.checkout');
let ok = document.querySelectorAll('.btn-ok');
let select = document.querySelectorAll('.select-action');
let arrChecked = [];
deletes.forEach(element => {
    element.addEventListener('click', () => {
        deleteSolo.href = `./index.php?delete=${element.id}`;
    })
})
edits.forEach(element => {
    element.addEventListener('click', () => {
        editSolo.value = `${element.id}`;
        type.name = "edit_post";
    })
})
addSolo.forEach(element => {
    element.addEventListener('click', () => {
        editSolo.value = '';
        type.name = "add_post";
    })
})
checkMain.addEventListener('click', () => {
    if (checkMain.checked == true) {
        checkers.forEach(check => {
            check.checked = true;
        })
    } else {
        checkers.forEach(check => {
            check.checked = false;
        })
    }
})
checkers.forEach(check => {
    check.addEventListener('click', () => {
        if (check.checked == false) {
            checkMain.checked = false;
        }
    })
})
for (let i = 0; i < ok.length; i++) {
    ok[i].addEventListener('click', () => {
        if (select[i].value == "Delete") {
            checkCheckers();
            deleteSolo.href = `./index.php?deleteMany=${arrChecked}`;
        } else if (select[i].value == "Set active") {
            checkCheckers();
            deleteSolo.href = `./index.php?setActive=${arrChecked}`;
        } else if (select[i].value == "Set not active") {
            checkCheckers();
            deleteSolo.href = `./index.php?setNotActive=${arrChecked}`;
        }
    })
}

function checkCheckers() {
    checkers.forEach(check => {
        if (check.checked == true) {
            arrChecked += `${check.id},`;
        }
    })
}