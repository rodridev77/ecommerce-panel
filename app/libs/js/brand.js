const BASE_URL = "http://localhost/ecommerce-panel/";

// ############# CRUD Brand #############
function brand_addform(providers) {

    let option = '';

    for (var i in providers) {
        option += "<option value='" + providers[i].id + "' >" + providers[i].name + "</option>";
    }

    $('#brand-addform').find("#brand-provider").html(option);

    $('#brand-addform').modal('show');
}

function brand_updform(brand) {
    alert(brand);

    let option = '';
    let providers = brand.provider;

    for (var i in providers) {
        option += "<option value='" + providers[i].id + "' >" + providers[i].name + "</option>";
    }

    let form = document.querySelector("#brand-updform");
    let brand_name = form.querySelector("#brand-name").value = "teste";
    $('#brand-updform').find("#brand-provider").html(option);

    $('#brand-updform').modal('show');
}

function brand_add() {

    document.querySelector('#brand-form').addEventListener('submit', event => {
        event.preventDefault();
    });

    let brand = document.querySelector("#brand-name");
    let provider = document.querySelector("#brand-provider");

    if (brand) {

        let data = {
            brand: brand.value,
            provider: provider.value
        };

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        if (data.brand.length !== 0) {
            const URL = BASE_URL + 'brand/add';
            fetch(URL, options)
                    .then(function() {

                        let message = "brand registered successfully";
                        let modal = document.querySelector('#brand-alert');

                        modal.querySelector('#alert-class').classList.add('alert-success');
                        modal.querySelector('#alert-class').textContent = message;
                        $('#brand-alert').modal('show');

                        $('#brand-alert').on('hide.bs.modal', function() {
                            window.location.reload();
                        });

                    })
                    .catch(function() {

                        let message = "brand registration failed";
                        let modal = document.querySelector('#brand-alert');

                        modal.querySelector('#alert-class').classList.add('alert-warning');
                        modal.querySelector('#alert-class').textContent = message;
                        $('#brand-alert').modal('show');

                        $('#brand-alert').on('hide.bs.modal', function() {
                            window.location.reload();
                        });

                    });
        }
    }

}

function brand_del(id) {

    if (id) {
        let data = {id: id};

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        const URL = BASE_URL + 'brand/del';
        fetch(URL, options)
                .then(function() {

                    let message = "brand removed successfully";
                    let modal = document.querySelector('#brand-alert');

                    modal.querySelector('#alert-class').classList.add('alert-success');
                    modal.querySelector('#alert-class').textContent = message;
                    $('#brand-alert').modal('show');

                    $('#brand-alert').on('hide.bs.modal', function() {
                        window.location.reload();
                    });

                })
                .catch(function() {

                    let message = "failed to remove the brand";
                    let modal = document.querySelector('#brand-alert');

                    modal.querySelector('#alert-class').classList.add('alert-warning');
                    modal.querySelector('#alert-class').textContent = message;
                    $('#brand-alert').modal('show');

                    $('#brand-alert').on('hide.bs.modal', function() {
                        window.location.reload();
                    });

                });
    }

}

