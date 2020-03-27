const BASE_URL = "http://localhost/ecommerce-panel/";

// ############# CRUD Brand #############
function brand_addform() {

    $('#brand-addform').modal('show');
}

function brand_add() {

    document.querySelector('#brand-form').addEventListener('submit', event => {
        event.preventDefault();
    });

    let inputBrand = document.querySelector("#brand-name");

    if (inputBrand) {
        let data = {brand: inputBrand.value};

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

