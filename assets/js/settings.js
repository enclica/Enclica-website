//get user info from /api/user/info/

function userinfo() {
    var em = "";
    //javascript console log with multiple css styling 
    console.log('%cUser Info', 'color: #0099ff; font-weight: bold; font-size: 20px;');
    $.get("/api/user/info/sigular", { "token": getCookie("token") }, function(da) {
        em = da;
    });
    //change emailinput field to email address
    $('#emailinput').val(em.email);
}

function changeemail() {
    var email = $('#emailinput').val();
    console.log("CHANGING EMAIL TO " + email);
    $.post("/api/user/info/", { "token": getCookie("token"), "email": email }, function(da) {
        var obj = da;
        console.log("CHANGED EMAIL TO " + email);
        //append to alert with bootstrap 5 alert, if suceess then success if error then danger.
        if (da.error) {
            $('#alert-settings').append("<div class='alert alert-danger' role='alert'>" + da.error + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        } else {
            $('#alert-settings').append('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                '<strong>Success!</strong> Email changed to ' + email + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>');
        }
        //  console.table(obj);
    });
}


(function() {
    userinfo();
});