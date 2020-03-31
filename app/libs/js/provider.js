const BASE_URL = "http://localhost/ecommerce-panel/";

// ############# JS Provider ###########
function prov_addform() {

    $('#prov-addform').modal('show');
}

function prov_add() {

    document.querySelector('#prov-form').addEventListener('submit', event => {
        event.preventDefault();
    });

    let prov_form = document.querySelector("#prov-form");

    let name = prov_form.querySelector("#prov-name").value;
    let cnpj = prov_form.querySelector("#prov-cnpj").value;
    let email = prov_form.querySelector("#prov-email").value;
    let fone = prov_form.querySelector("#prov-fone").value;

    if (prov_form) {

        let data = {
            name: name,
            cnpj: cnpj,
            email: email,
            fone: fone
        };

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };


        const URL = BASE_URL + 'provider/add';
        fetch(URL, options)
                .then(function() {

                    let message = "provider registered successfully";
                    let modal = document.querySelector('#prov-alert');

                    modal.querySelector('#alert-class').classList.add('alert-success');
                    modal.querySelector('#alert-class').textContent = message;
                    $('#prov-alert').modal('show');

                    $('#prov-alert').on('hide.bs.modal', function() {
                        window.location.reload();
                    });

                })
                .catch(function() {

                    let message = "provider registration failed";
                    let modal = document.querySelector('#prov-alert');

                    modal.querySelector('#alert-class').classList.add('alert-warning');
                    modal.querySelector('#alert-class').textContent = message;
                    $('#prov-alert').modal('show');

                    $('#prov-alert').on('hide.bs.modal', function() {
                        window.location.reload();
                    });

                });
    }
}

function prov_get(id) {

    if (id) {
        let data = {
            id: id
        };

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        const URL = BASE_URL + 'provider/get';
        fetch(URL, options)
                .then(resp => resp.json())
                .then(data => function(data) {

                        alert(data.name);

                        let prov_form = document.querySelector("#prov-form");

                        prov_form.querySelector("#prov-name").value = data.name;
                        prov_form.querySelector("#prov-cnpj").value = data.cnpj;
                        prov_form.querySelector("#prov-email").value = data.email;
                        prov_form.querySelector("#prov-fone").value = data.fone;

                        $('#prov-editform').modal('show');
                    })
                .catch(function(error) {
                    console.log(error);
                });
    }
}

function prov_del(id) {

    if (id) {
        let data = {id: id};

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        const URL = BASE_URL + 'provider/del';
        fetch(URL, options)
                .then(function() {

                    let message = "provider removed successfully";
                    let modal = document.querySelector('#prov-alert');

                    modal.querySelector('#alert-class').classList.add('alert-success');
                    modal.querySelector('#alert-class').textContent = message;
                    $('#prov-alert').modal('show');

                    $('#prov-alert').on('hide.bs.modal', function() {
                        window.location.reload();
                    });

                })
                .catch(function() {

                    let message = "failed to remove the brand";
                    let modal = document.querySelector('#prov-alert');

                    modal.querySelector('#alert-class').classList.add('alert-warning');
                    modal.querySelector('#alert-class').textContent = message;
                    $('#prov-alert').modal('show');

                    $('#prov-alert').on('hide.bs.modal', function() {
                        window.location.reload();
                    });

                });
    }

}

