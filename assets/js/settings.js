function userinfo() {
    var em = "";
    //javascript console log with multiple css styling 
    console.log('%cUser Info', 'color: #0099ff; font-weight: bold; font-size: 20px;');
    $.get("/api/user/info/sigular/", { "token": getCookie("token") }, function(da) {
        em = da;
    });
    //change emailinput field to email address
    $('#emailinput').val(em.email);
}

//load userinfo on pageload using $(document).ready(function() {
$(document).ready(function() {
    userinfo();
});

function changeemail() {
    var email = $('#emailinput').val();
    console.log("CHANGING EMAIL TO " + email);
    $.post("/api/user/changeemail/", { "token": getCookie("token"), "email": email }, function(da) {
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


function connectexcenote() {
    myRef = window.open(`https://excenote.cf/connect.php?appid=encconnecttoexce`, 'mywin', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
    //get value returned from myRefs window.open and show in console
    myRef.onload = function() {
        console.log(myRef.document.body.innerHTML);
    }
}


$('#excenote-btn').click(function() {
    connectexcenote();
});




function sendpasswordcode() {
    $('#pwd-btn').html(`Change password <div class="spinner-border spinner-border-sm" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`);
    $.post("/api/user/passwordchange/", { "token": getCookie("token") }, function(da) {
        //show modal dialog
        $('#passwordmodal').modal('show');
        $('#pwd-btn').html(`Change password`);
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