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
            <li><a class="dropdown-item" href="hub">Hub</a></li>
            <li><a class="dropdown-item n-o" onclick="logout();">Logout</a></li>
            `);




        });
    } else {
        $('#login-mnu').html('login/signup');
        $('#login-menu').html(`
        <li><a class="dropdown-item" href="login">Login</a></li>
        <li><a class="dropdown-item" href="signup">Signup</a></li>`);
    }


}









function logout() {
    $.ajax({
        url: '/api/user/logout/',
        type: 'POST',
        data: {
            token: getCookie("token")
        },
        success: function(data) {
            if (!data.error) {
                setCookie("token", "", -1);
                $('#logo').trigger('click');
                refreshmenu();
            }
        }
    });

}