let deleteSolo = document.querySelector('.btn-delete-solo');
let addSolo = document.querySelectorAll('.btn-add-item');
let type = document.querySelector('.btn-modal-add-edit');
let checkMain = document.querySelector('#scales');
let ok = document.querySelectorAll('.btn-ok');
let idItem = document.querySelector('.edit-item-id')
let select = document.querySelectorAll('.select-action');
let tableData = document.querySelector('.table-content');
let title = document.querySelector('.modal-title');
let arrChecked = [];
let id = document.querySelector('input[name="id"]')
let name = document.querySelector('input[name="name"]')
let lastname = document.querySelector('input[name="lastname"]')
let status = document.querySelector('input[name="status"]')
let role = document.querySelector('select[name="role"]')
document.body.addEventListener('click', function(event) {
    console.log(event.target)
    if (event.target.classList.contains('checkout')) {
        let checkers = document.querySelectorAll('.checkout');
        checkCheckers()
        console.log(checkers.length)
        console.log(uniq_fast(arrChecked.split(",")).length)
        if (checkers.length == uniq_fast(arrChecked.split(",")).length - 1) {
            checkMain.checked = true;
        }
    }
    if (event.target.id == 'scales') {
        let checkers = document.querySelectorAll('.checkout');
        if (checkMain.checked == true) {
            checkers.forEach(check => {
                check.checked = true;
            })
        } else {
            checkers.forEach(check => {
                check.checked = false;
            })
        }
    }
    if (event.target.classList.contains('checkout')) {
        if (event.target.checked == false) {
            checkMain.checked = false;
        }
    }
    if (event.target.classList.contains('btn-Delete-Submit')) {
        deleteSolo.addEventListener('click', (e) => {
            checkMain.checked = false;
            e.preventDefault()
            axios.get(`./includes/get_post.php?delete=${event.target.id}`).then(response => {
                tableData.innerHTML = response.data;
            })
        })
    };
    if (event.target.classList.contains('btn-Edit-Submit')) {
        idItem.value = `${event.target.id}`;
        name.value = event.target.parentElement.parentElement.parentElement.parentElement.children[1].children[0].textContent
        lastname.value = event.target.parentElement.parentElement.parentElement.parentElement.children[1].children[1].textContent
        status.checked = event.target.parentElement.parentElement.parentElement.parentElement.children[2].children[0].children[0].classList.contains('green')
        role = event.target.parentElement.parentElement.parentElement.parentElement.children[3].children[0].textContent
        title.textContent = 'Edit row'
        type.textContent = `Save changes`;
        type.addEventListener('click', (e) => {
            e.preventDefault()
            checkMain.checked = false;
            let bodyFormData = new FormData();
            console.log(document.querySelector('.form__control[name="status"]').value)
            bodyFormData.append('id', document.querySelector('.form__control[name="id"]').value);
            bodyFormData.append('name', document.querySelector('.form__control[name="name"]').value);
            bodyFormData.append('lastname', document.querySelector('.form__control[name="lastname"]').value);
            bodyFormData.append('status', document.querySelector('.form__control[name="status"]').checked ? 'on' : '');
            bodyFormData.append('role', document.querySelector('.form__control[name="role"]').value);
            bodyFormData.append('editsolo', 1);
            axios({
                method: 'post',
                url: './includes/get_post.php',
                data: bodyFormData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                tableData.innerHTML = response.data;
            })
        }, {
            once: true
        })
    }
});
addSolo.forEach(element => {
    element.addEventListener('click', () => {
        name.value = ''
        lastname.value = ''
        status.checked = false
        role = ''
        title.textContent = 'Add row'
        type.textContent = `Add row`;
        checkMain.checked = false;
        idItem.value = '';
        console.log(document.querySelector('.form__control[name="status"]').checked)
        type.addEventListener('click', (e) => {
            e.preventDefault()
            console.log(document.querySelector('.form__control[name="status"]').checked)
            let bodyFormData = new FormData();
            bodyFormData.append('id', '')
            bodyFormData.append('name', document.querySelector('.form__control[name="name"]').value);
            bodyFormData.append('lastname', document.querySelector('.form__control[name="lastname"]').value);
            bodyFormData.append('status', document.querySelector('.form__control[name="status"]').checked ? 'on' : '');
            bodyFormData.append('role', document.querySelector('.form__control[name="role"]').value);
            bodyFormData.append('addsolo', 1);
            axios({
                method: 'post',
                url: './includes/get_post.php',
                data: bodyFormData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                tableData.innerHTML = response.data;
            })
        }, {
            once: true
        })
    })
})

for (let i = 0; i < ok.length; i++) {
    ok[i].addEventListener('click', (ev) => {
        checkCheckers();
        console.log(arrChecked.length)
        if (select[i].value == "Please select" || arrChecked.length == 0) {
            console.log(ev.target)
            ev.target.setAttribute('data-toggle', null)
        } else if (select[i].value == "Delete") {
            ev.target.setAttribute('data-toggle', 'modal')
            deleteSolo.addEventListener('click', (e) => {
                e.preventDefault()
                checkMain.checked = false;
                console.log(arrChecked)
                axios.get(`./includes/get_post.php?deleteMany=${arrChecked}`).then(response => tableData.innerHTML = response.data)
                arrChecked = [];
            }, {
                once: true
            })
        } else if (select[i].value == "Set active") {
            ev.target.setAttribute('data-toggle', 'modal')
            deleteSolo.addEventListener('click', (e) => {
                e.preventDefault();
                console.log(arrChecked)
                checkMain.checked = false;
                axios.get(`./includes/get_post.php?setActive=${arrChecked}`).then(response => tableData.innerHTML = response.data)
                arrChecked = [];
            }, {
                once: true
            })
        } else if (select[i].value == "Set not active") {
            ev.target.setAttribute('data-toggle', 'modal')
            deleteSolo.addEventListener('click', (e) => {
                e.preventDefault();
                console.log(arrChecked)
                checkMain.checked = false;
                axios.get(`./includes/get_post.php?setNotActive=${arrChecked}`).then(response => tableData.innerHTML = response.data)
                arrChecked = [];
            }, {
                once: true
            })
        }
    })
}

function checkCheckers() {
    let checkers = document.querySelectorAll('.checkout');
    checkers.forEach(check => {
        if (check.checked == true) {
            arrChecked += `${check.id},`;
        }
    })
}

function uniq_fast(a) {
    var seen = {};
    var out = [];
    var len = a.length;
    var j = 0;
    for (var i = 0; i < len; i++) {
        var item = a[i];
        if (seen[item] !== 1) {
            seen[item] = 1;
            out[j++] = item;
        }
    }
    return out;
}