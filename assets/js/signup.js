//document finished loading all js
function su() {
    $('#alert').html('');

    $.post('/api/user/signup/', { "username": $('#username').val(), "email": $('#email').val(), "password": $('#password').val(), "confirm_password": $('#password2').val() }, function(da) {

        if (da.data.username_err) {
            console.log(da.data.username_err);
            $('#alert').append(`<div class='alert alert-danger' role='alert'>${da.data.username_err}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        }
        if (da.data.password_err) {
            console.log(da.data.password_err);
            $('#alert').append(`<div class='alert alert-danger' role='alert'>${da.data.password_err}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        }
        if (da.data.confirm_password_err) {
            console.log(da.data.confirm_password_err);
            $('#alert').append(`<div class='alert alert-danger' role='alert'>${da.data.confirm_password_err}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        }
        if (da.data.email_err) {
            console.log(da.data.email_err);
            $('#alert').append(`<div class='alert alert-danger' role='alert'>${da.data.email_err}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        }

        if (!da.error) {
            $('#alert').append(`<div class='alert alert-success' role='alert'>You have been signed up goto the login page to login. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        }

    });



    return false;


}

$(document).ready(function() {
    console.log("2");
    $('#signupform').on('submit', function(e) {
        e.preventDefault();
        su();
    });

});