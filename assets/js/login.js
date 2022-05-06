function login() {
    $.post("/api/user/login/", { "username": $('#username').val(), "password": $('#password').val() }, function(data) {
        $('#alert').html('');


        var obj = data;

        if (obj.error) {
            //show bootstrap alert witn error message of obj.data with close button
            $('#alert').append('<div class="alert alert-danger alert-dismissible" role="alert">' + obj.data + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            return;
        }

        //set cookie with token
        setCookie("token", obj.token, 999999999999);


        //reload menu via a function call
        refreshmenu();

        //press the enclica logo
        $('#logo').trigger('click');


    });
}

$(document).ready(function() {
    $('#loginform').on('submit', function(e) {
        $('#alert').html('');
        e.preventDefault();
        login();
    });

});

function sendpasswordcode() {
    console.log('REQUEST SENT.')
    if ($('#username').val() == '') {
        $('#alert').append(`<div class='alert alert-danger' role='alert'>Please enter your username in the username field to reset your password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        return;
    }
    $.post("/api/user/passwordchange/", { "token": getCookie("token"), "username": $('#username').val() }, function(da) {
        //show modal dialog

        $('#passwordmodal').modal('show');

    });
}

function changepassword() {

    $.post("/api/user/passwordchange/", { "token": getCookie("token"), "code": $('#code').val(), "password": $('#npassword').val() }, function(da) {
        if (da.error) {
            $('#alert-settings').append(`<div class='alert alert-danger' role='alert'>An error occured while resetting your password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            $('#passwordmodal').modal('hide');
            return;
        }
        $('#alert-settings').append(`<div class='alert alert-success' role='alert'>Your password has been changed.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        $('#passwordmodal').modal('hide');
    });
}