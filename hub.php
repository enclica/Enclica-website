<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'browse';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/565/1920/1080.jpg?hmac=DgBZuobItzao7nbc4UdFZAifr5hr8uNlMjf9e92Zjtg); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3 card">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Enclica HUB
                </h1>
                <p class="col-md-8 fs-4">Inspect your account activity.</p>
                <p>Percentage of activity based off your activity.</p>

                <div id="messages">

                </div>
                <div class="col-md-9">
                    <div class="progress" style="background-color: rgba(120,120,120,0.5); backdrop-filter: blur(5px);">
                        <div class="progress-bar" id="logina" role="progressbar" style="width: 15%" aria-valuenow="15"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" id="messagea" role="progressbar" style="width: 0%"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" id="settingsa" role="progressbar" style="width: 0%"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" id="loggedout" role="progressbar" style="width: 0%"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" id="other" role="progressbar" style="width: 0%"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <br />
                    <span class="badge bg-primary">Login's <span id="loginnum">0</span></span>
                    <span
                        class="badge bg-success">Messages
                        sent <span id="msgnum">0</span></span>
                        <span class="badge bg-info">Settings changes <span
                            id="setnum">0</span></span>
                            <span class="badge bg-danger">Logout's <span
                            id="logoutnum">0</span></span>
                            <span class="badge bg-warning">Other <span
                            id="other">0</span></span>
                    <div class="col-md-9">
                        <div class=" p-5">

                            <h3>User activity history.</h3>
                            <p>is this activity sold to third parties? No we dont sell this information to third
                                parties
                                this is to help you understand your track record.</p>
                            <p>You can delete all activity within a single click and none of this data contains
                                information
                                that involces messages, searches, etc only the activity like activity: searched or
                                ativity:
                                sent message.. </p>

                            <p>how does this help me?</p>
                            <p>This can help you understand your habits online and can help your digital wellbeing
                            </p>

                            <!-- table with all activity with the id of activity-->
                            <button class="btn btn-primary" type="button" onclick="clearactivity();">Clear all
                                activity</button>

                            <button class="btn btn-primary" type="button" onclick="getactivity();">Get all
                                activity</button>
                            <div class="table-responsive">
                                <table class="table-responsive table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Acivity</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>

                                    <tbody id="activity">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                var totalActivity = 0;
                var logina = 0;
                var messagea = 0;
                var settingsa = 0;
                var logouta = 0;
                var othera = 0;

                function getactivity() {
                    $("#logina").css("width", (logina / totalActivity) * 0 + "%");
                    $("#messagea").css("width", (messagea / totalActivity) * 0 + "%");
                    $("#settingsa").css("width", (settingsa / totalActivity) * 0 + "%");
                    $.get("/api/user/getactivity/", {
                        token: getCookie('token')
                    }, function(data) {
                        //set vars to 0
                        logina = 0;
                        messagea = 0;
                        settingsa = 0;
                        logouta = 0;
                        othera = 0;
                        totalActivity = 0;

                        $('#activity').html('');
                        console.log(data);
                        if (data.error) {
                            $('#messages').append('<div class="alert alert-danger" role="alert">' +
                                data.data + " | You have most likely are not logged in" +
                                '</div>');

                            $("#logina").css("width", (logina / totalActivity) * 0 + "%");
                            $("#messagea").css("width", (messagea / totalActivity) * 0 + "%");
                            $("#settingsa").css("width", (settingsa / totalActivity) * 0 + "%");
                            $("#loggedout").css("width", (logouta / totalActivity) * 0 + "%");
                            $("#other").css("width", (othera / totalActivity) * 0 + "%");

                            return;
                        }
                        for (var i = 0; i < data.length; i++) {



                            //add acitivity to the table
                            $('#activity').append('<tr><th scope="row">' + data[i].ID + '</th><td>' +
                                data[i]
                                .activity + '</td><td>' + data[i].time + '</td></tr>');
                            totalActivity++;

                            if (data[i].activity == "activity: login") {
                                logina++;
                            }
                            if (data[i].activity == "activity: sent message") {
                                messagea++;
                            }
                            if (data[i].activity == "activity: setting change") {
                                settingsa++;
                            }
                            if (data[i].activity == "activity: logout") {
                                logouta++;
                            }else{
                                othera++;
                            }


                        }

                        $("#logina").css("width", (logina / totalActivity) * 100 + "%");
                        $("#messagea").css("width", (messagea / totalActivity) * 100 + "%");
                        $("#settingsa").css("width", (settingsa / totalActivity) * 100 + "%");
                        $("#loggedout").css("width", (logouta / totalActivity) * 100 + "%");
                        $("#loginnum").text(logina);
                        $("#msgnum").text(messagea);
                        $("#setnum").text(settingsa);
                        $("#logoutnum").text(logouta);
                        $("#other").text(othera);
                    });

                }






                function clearactivity() {
                    $.post('/api/user/clearactivity/', {
                        token: getCookie('token')
                    }, function(data) {
                        if (data.error) {
                            $('#messages').append('<div class="alert alert-danger" role="alert">' + data
                                .error + '</div>');
                            return;
                        }
                        $('#activity').empty();
                        totalActivity = 0;
                        logina = 0;
                        messagea = 0;
                        settingsa = 0;
                        getactivity();
                    });
                }

                (function() {
                    getactivity();
                })();
                </script>



            </div>
        </div>
        <div class="m-5" ></div>
        <div class="p-5 m-6 pb-4 card rounded-3">

            <h1>Warnings:</h1>
            <p>This will show any violations your account may have.</p>
            <p>If you have any questions about this please contact us.</p>
            <p>These warnings are automated by our system and does not explicitly affect your account but after 10 warnings we investigate.</p>
            <p>if you wish to clear these warnings please contact enclica for removal.</p>
            <canvas id="warningicon" alt="">
            </canvas>
            <p id="currentstatus"></p>
            <div id="messagesv">

            </div>


            <script type="text/javascript">
            (function() {
                //set canvas width and height to 20x20
                var canvas = document.getElementById('warningicon');
                var ctx = canvas.getContext('2d');
                ctx.canvas.width = 20;
                ctx.canvas.height = 20;
                //set css to 20x20
                canvas.style.width = '80px';
                canvas.style.height = '80px';
                
                //set the color of the canvas
     
                $.get("/api/user/getwarnings/", {
                    token: getCookie('token')
                }, function(data) {
                   /* if (data.error) {
                        $('#messagesv').append('<div class="alert alert-danger" role="alert">' + data.error +
                            '</div>');
                        return;
                    }*/

                    //check to see if there are any warnings if the number is above one show warningsvg with a svg image of a warning icon
                    if (data.data == "No data") {
                  //change the warning icon in canvas to a check icon drawing using js

                
                 
                      //pulsate a circle in the canvas
                        var pulsate = function() {
                            ctx.clearRect(0, 0, 20, 20);
                            ctx.beginPath();
                            ctx.arc(10, 10, 10, 0, Math.PI * 2, true);
                            ctx.closePath();
                            ctx.fillStyle = '#00ff00';
                            ctx.fill();
                            ctx.beginPath();
                            ctx.arc(10, 10, 10, 0, Math.PI * 2, true);
                            ctx.closePath();
                            ctx.fillStyle = '#ffffff';
                            ctx.fill();
                        };
                        var pulsateInterval = setInterval(pulsate, 500);
                        setTimeout(function() {
                            clearInterval(pulsateInterval);
                        }, 1000);
                        //set the text to no warnings
                        $('#currentstatus').text('No warnings');

                    } else {

                        //set the text to warnings
                        $('#currentstatus').text('Warnings');
                        //set the warning icon in canvas to a warning icon drawing using js
                        var warning = function() {
                            ctx.clearRect(0, 0, 20, 20);
                            ctx.beginPath();
                            ctx.moveTo(10, 10);
                            ctx.lineTo(10, 0);
                            ctx.lineTo(20, 10);
                            ctx.closePath();
                            ctx.fillStyle = '#ff0000';
                            ctx.fill();
                        };
                        var warningInterval = setInterval(warning, 500);
                        setTimeout(function() {
                            clearInterval(warningInterval);
                        }, 1000);
                    





                
                    data.forEach(element => {
                        if(element.serverity == 3){
                        $('#messagesv').append('<div class="alert alert-danger" role="alert">Serious violation: ' + element.warning +'</div>');
                        }else{
                        $('#messagesv').append('<div class="alert alert-warning" role="alert">' + element.warning +'</div>');
                        }
                    });
                    }
                });
            })();
            </script>




        </div>
        <br/>
        <br/>
    </div>
</div>
</div>
</div>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {

    include dirname(__FILE__) . '/inc/footer.php';
}
?>