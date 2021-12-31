$('#loginform').on('submit', function(e) {
    $('#alert').html('');
    e.preventDefault();
    $.post("/api/user/login/", { "username": $('#username').val(), "password": $('#password').val() }, function(data) {



        var obj = data;

        if (obj.error) {
            //show bootstrap alert witn error message of obj.data with close button
            $('#alert').append('<div class="alert alert-danger alert-dismissible" role="alert">' + obj.data + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            return;
        }

        //set cookie with token
        setCookie("token", obj.token, 1);


        //reload menu via a function call
        refreshmenu();

        //press the enclica logo
        $('#logo').trigger('click');


    });
});