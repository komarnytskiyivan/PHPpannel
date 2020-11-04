let deleteSolo = document.querySelector('.btn-delete-solo');
let addSolo = document.querySelectorAll('.btn-add-item');
let type = document.querySelector('.btn-modal-add-edit');
let checkMain = document.querySelector('#scales');
let ok = document.querySelectorAll('.btn-ok');
let idItem = document.querySelector('.edit-item-id')
let select = document.querySelectorAll('.select-action');
let tableData = document.querySelector('.table-content');
let arrChecked = [];
document.body.addEventListener('click', function(event) {
    console.log(event.target)
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
            console.log(1)
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
    checkMain.checked = false;
    element.addEventListener('click', () => {
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
    ok[i].addEventListener('click', () => {
        if (select[i].value == "Delete") {
            deleteSolo.addEventListener('click', (e) => {
                e.preventDefault()
                checkCheckers();
                checkMain.checked = false;
                console.log(arrChecked)
                axios.get(`./includes/get_post.php?deleteMany=${arrChecked}`).then(response => tableData.innerHTML = response.data)
                arrChecked = [];
            }, {
                once: true
            })
        } else if (select[i].value == "Set active") {
            deleteSolo.addEventListener('click', (e) => {
                e.preventDefault();
                checkCheckers();
                console.log(arrChecked)
                checkMain.checked = false;
                axios.get(`./includes/get_post.php?setActive=${arrChecked}`).then(response => tableData.innerHTML = response.data)
                arrChecked = [];
            }, {
                once: true
            })
        } else if (select[i].value == "Set not active") {
            deleteSolo.addEventListener('click', (e) => {
                e.preventDefault();
                checkCheckers();
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
