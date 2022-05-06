//when file is selected, determine platform and type based on extension and set appropriate fields
$('#packagefile').change(function() {
    //check to see if file is empty
    if ($('#packagefile').val() == '') {
        return;
    }

    let file = $('#packagefile')[0].files[0];
    let platform = $('#platform');
    let type = $('#packagetype');
    //type is a dropdown, with these options application, library, theme and any
    let filename = file.name;

    switch (filename.substring(filename.lastIndexOf('.') + 1).toLowerCase()) {

        case "zip":
            platform.val("any");
            type.val("any");
            break;
        case "exe":

            platform.val("windows");
            type.val("application");

            break;

        case "dmg":

            platform.val("macos");
            type.val("application");

            break;

        case "deb":

            platform.val("linux");
            type.val("application");

            break;

        case "rpm":

            platform.val("linux");

            type.val("application");

            break;

        case "apk":

            platform.val("android");
            type.val("application");

            break;

        case "js":

            platform.val("any");
            type.val("library");

            break;

        case "css":

            platform.val("any");
            type.val("library");

            break;

        case "html":

            platform.val("any");

            type.val("library");

            break;

        default:
            platform.val("any");
            type.val("any");
            break;


    }

});




//on form submit, check if all fields are filled in


$('#batonpublish').submit(function(e) {

            e.preventDefault();

            //get token from cookie
            let token = getCookie('token');
            let platform = $('#platform').val();
            let type = $('#packagetype').val();
            let file = $('#packagefile')[0].files[0];
            let packageversion = $('#packageversion').val();
            let packagedescription = $('#packagedescription').val();
            let packagename = $('#packagename').val();
            let packagelicense = $('#packagelicense').val();
            let packagelicenseurl = $('#packagelicenseurl').val();
            let packageicon = $('#packageicon')[0].files[0];
            let packagetags = $('#packagetags').val();
            if (platform == "") {
                alert("Please select a platform");
                e.preventDefault();
                return;
            } else if (type == "") {
                alert("Please select a type");
                e.preventDefault();

                return;
            } else if (file == undefined) {
                alert("Please select a file");
                e.preventDefault();

                return;
            } else if (packageversion == "") {
                alert("Please enter a version");
                e.preventDefault();

                return;
            } else if (packagedescription == "") {
                alert("Please enter a description");
                e.preventDefault();
                return;
            } else if (packagename == "") {
                alert("Please enter a name");
                e.preventDefault();
                return;
            } else if (packagelicense == "") {
                alert("Please enter a license");
                e.preventDefault();
                return;
            } else if (packagelicenseurl == "") {
                alert("Please enter a license url");
                e.preventDefault();

                return;
            }


            //   packagename cant have spaces
            else if (packagename.indexOf(' ') > -1) {
                alert("Package name cannot have spaces");
                e.preventDefault();

                return;
            }

            //prevent form from rdirecting to another page
            e.preventDefault();

            //ADD TOKEN TO FORM DATA
            //get form data from form
            let formData = new FormData(this);
            //add token to form data via cookie

            formData.append('token', token);

            //add all other form data to form data
            formData.append('platform', platform);
            formData.append('type', type);
            formData.append('packageversion', packageversion);
            formData.append('packagedescription', packagedescription);
            formData.append('packagename', packagename);
            formData.append('packagelicense', packagelicense);
            formData.append('packagelicenseurl', packagelicenseurl);
            formData.append('packagetags', packagetags);

            //add file to form data

            //encode file to base64
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                let base64 = reader.result;
                formData.append('packagefile', base64);
            };

            //add icon to form data
            if (packageicon != undefined) {
                //encode file to base64
                let reader = new FileReader();
                reader.readAsDataURL(packageicon);
                reader.onload = function() {
                    let base64 = reader.result;
                    formData.append('packageicon', base64);
                };


                //send form data to server
                $.ajax({
                    url: '/api/baton/publish',
                    type: 'POST',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    //CROS PROTOCOL ERROR
                    crossDomain: true,
                    contentType: 'multipart/form-data',
                    success: function(data) {
                            //if success, alert user
                            alert("Package published");
                        }
                        //if error, alert user
                }).fail(function(data) {
                    alert("Error publishing package");
                });









                return true;



            });