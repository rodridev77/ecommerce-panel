const BASE_URL = "http://localhost/ecommerce-panel/";

function login() {

    document.querySelector('#login-form').addEventListener('submit', event => {
        event.preventDefault();
    });

    let form = document.querySelector("#login-form");
    let email = form.querySelector("#login-email");
    let password = form.querySelector("#login-password");

    if (form) {

        let data = {
            email: email.value,
            password: password.value
        };

        let options = {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        if (data.email.length !== 0) {
            const URL = BASE_URL + 'auth/login';
            fetch(URL, options).then(response => response.json())
                    .then(data => {
                        if (data.success === true) {
                            window.location = BASE_URL;
                        } else {

                            let message = "authentication failed";
                            let modal = document.querySelector('#auth-alert');

                            modal.querySelector('#alert-class').classList.add('alert-warning');
                            modal.querySelector('#alert-class').textContent = message;
                            $('#auth-alert').modal('show');
                        }

                    })
                    .catch(error => {
                        console.log(error);
                    });
        }
    }

}
