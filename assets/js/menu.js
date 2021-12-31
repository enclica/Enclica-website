refreshmenu();

function refreshmenu() {
    $('#login-menu').html('');
    $('#login').text('login/signup');

    //if token cookie is null then
    if (getCookie('token') == null) {
        console.log("1");
        $('#login-mnu').html('login/signup');
        $('#login-menu').html(`
        <li><a class="dropdown-item" href="login">Login</a></li>
        <li><a class="dropdown-item" href="signup">Signup</a></li>
        `);
        return;
    }

    console.log("2");
    if (getCookie("token")) {
        //get user info and output the username in the login-mnu text and have a logout button on the dropdown of login-menu

        $.get("/api/user/info/", { "token": getCookie("token") }, function(data) {



            $('#login-mnu').html(data.data.username);
            $('#login-menu').html(`
        
            <li><a class="dropdown-item" href="settings">Account settings</a></li>
            <li><a class="dropdown-item n-o" id="logout-btn" href="#">Logout</a></li>

            `);

        });



    } else {





        $('#login-mnu').html('login/signup');
        $('#login-menu').html(`
        <li><a class="dropdown-item" href="login">Login</a></li>
        <li><a class="dropdown-item" href="signup">Signup</a></li>`);
    }
}

$('#logout-btn').on('click', function() {
    $.ajax({
        url: '/api/logout/',
        type: 'POST',
        data: {
            token: getCookie("token")
        },
        success: function(data) {
            if (data.success) {
                setCookie("token", "", -1);
                window.location.href = "/";
            }
        }
    });
});