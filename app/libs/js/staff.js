const BASE_URL = "http://localhost/ecommerce-panel/";

// ############# CRUD Brand #############
function staff_addform() {

    $('#staff-addform').modal('show');
}

function staff_updform(data) {
    $('#staff-updform').modal('show');

    document.querySelector("#staff-id").value = data.id;

    //let form = document.querySelector("#staff-form");
    document.querySelector("#staff-name").value = data.name;

}

function staff_add() {

    document.querySelector('#staff-form').addEventListener('submit', event => {
        event.preventDefault();
    });

    let staff = document.querySelector("#staff-name");

    if (staff) {

        let data = {
            staff: staff.value
        };

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        if (staff.length !== 0) {
            const URL = BASE_URL + 'staff/add';
            fetch(URL, options)
                    .then(function() {

                        let message = "staff registered successfully";
                        let modal = document.querySelector('#staff-alert');

                        modal.querySelector('#alert-class').classList.add('alert-success');
                        modal.querySelector('#alert-class').textContent = message;
                        $('#staff-alert').modal('show');

                        $('#staff-alert').on('hide.bs.modal', function() {
                            window.location.reload();
                        });

                    })
                    .catch(function() {

                        let message = "staff registration failed";
                        let modal = document.querySelector('#staff-alert');

                        modal.querySelector('#alert-class').classList.add('alert-warning');
                        modal.querySelector('#alert-class').textContent = message;
                        $('#staff-alert').modal('show');

                        $('#staff-alert').on('hide.bs.modal', function() {
                            window.location.reload();
                        });

                    });
        }
    }

}

function staff_update() {

    document.querySelector('#staff-form').addEventListener('submit', event => {
        event.preventDefault();
    });


    let id = document.querySelector("#staff-id");
    let staff = document.querySelector("#staff-name");
    console.log(staff);

    if (id.value) {

        let data = {
            id: id.value,
            staff: staff.value
        };

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        if (staff.length !== 0) {
            const URL = BASE_URL + 'staff/update';
            fetch(URL, options)
                    .then(function() {

                        let message = "staff updated successfully";
                        let modal = document.querySelector('#staff-alert');

                        modal.querySelector('#alert-class').classList.add('alert-success');
                        modal.querySelector('#alert-class').textContent = message;
                        $('#staff-alert').modal('show');

                        $('#staff-alert').on('hide.bs.modal', function() {
                            window.location.reload();
                        });

                    })
                    .catch(function() {

                        let message = "staff updated failed";
                        let modal = document.querySelector('#staff-alert');

                        modal.querySelector('#alert-class').classList.add('alert-warning');
                        modal.querySelector('#alert-class').textContent = message;
                        $('#staff-alert').modal('show');

                        $('#staff-alert').on('hide.bs.modal', function() {
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

