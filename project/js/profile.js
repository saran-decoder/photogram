// This is edit profile image preview jquery
$(document).ready(function() {
    let profileinput = $('.file-input'),
        selectinput = $('.profile_input'),
        curElement = $('.view_image'); // Cache the image element
    
    /** CLICK LISTENER */
    selectinput.click(function() {
        console.log('Update image clicked!');
        profileinput.click();
        console.log('Opening Your File & Processing!');
    });

    $(profileinput).change(function(){
        console.log('File image select & Opened!');
        var reader = new FileReader();

        reader.onload = function (e) {
            // Check if the event has a target result
            if (e.target.result) {
                // Create a Blob URL from the loaded data and set it as the image source
                curElement.attr('src', URL.createObjectURL(new Blob([e.target.result])));
                $('.change-avatar').removeClass('d-none');
            }
        };

        // read the image file as a data URL
        reader.readAsArrayBuffer(this.files[0]);
    });
});



$(document).ready(function() {

    $("#Profile-Form1").submit(function() {

        var username, email, number;

        username = $('#profile-name').val();
        email = $('#profile-email').val();
        number = $('#profile-phone').val();

        // Validate user
        if (username === "") {
            displayError("Username should not be empty!", '#profile-name');
            return false;
        }

        // Validate email
        if (email === "") {
            displayError("Email address should not be empty!", '#profile-email');
            return false;
        }
        if (!isValidEmail(email)) {
            displayError('Please enter a valid email address!', '#profile-email');
            return false;
        }

        // Validate phone
        if (number === "") {
            displayError("Phone number should not be empty!", '#profile-phone');
            return false;
        }
    });

    $("#Profile-Form2").submit(function() {

        var currentPass, newPass;

        currentPass = $('#profile-current-password').val();
        newPass = $('#profile-new-password').val();

        if (currentPass === newPass) {
            displayError("Current password should not be empty! or Current password and new password is equal", '#profile-current-password');
            return false;
        }

        // Validate current
        // if (currentPass === "") {
        //     displayError("Current password should not be empty!", '#profile-current-password');
        //     return false;
        // }

        // Validate new
        if (newPass === "") {
            displayError("New password should not be empty!", '#profile-new-password');
            return false;
        }
    });

    function isValidEmail(email) {
        // Use a regular expression for basic email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function displayError(errorMessage, elementId) {
        new Toast('Form Validation', 'now', errorMessage + ' *', 'text-danger').show();
        $(elementId).focus();
        console.log(errorMessage);
    }

});


// This is user all session delete jquery api calling
$(document).on('click', '.tab-pane #das', function(){
    id = $(this).closest('.device').data('id');
    d = new Dialog("Clear All Session", "Are you sure want to clear this sessions");
    d.setButtons([
        {
            'name': "Clear All",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this session ${id} is not delete`);
                
                $.post('/api/profile/das',
                {
                    id: id
                }, function(data, textSuccess, xhr){
                    console.log('HTTP Status:', xhr.status);
                    console.log('Response:', data);

                    if(textSuccess == "success"){ //means 200
                        console.log('All most working cool.');
                        window.location.reload();
                    }
                });

                $(event.data.modal).modal('hide')
            }
        },
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        }
    ]);
    d.show();
});



// This is Testing
let pressTimer;
$(".longPress").mouseup(function () {
  clearTimeout(pressTimer);
  return false;
}).mousedown(function () {
  pressTimer = window.setTimeout(function () {
    window.location.href = "#";
  }, 1000);
  return false;
});




$(document).ready(function() {
    let clickCount = 0;

    $('.longPress').click(function() {
        clickCount++;

        if (clickCount === 2) {
            // Double-click do any event
            alert('Hai Baby!');
        }
    });
});

// This is the user post image show js
// let id = $('#posts .hcf-masonry-card.rounded').closest('a').data('id');
// var id = $('#posts .hcf-masonry-card.rounded').attr("id");
// console.log("ID: " + id);
// $(document).on('click', '#posts #post-' + id + '.modal', function() {
//     $('#post-' + id).modal('show');
// });

// This is the user post image show js
$(document).on('click', '.hcf-masonry-card.rounded', function() {
    // Extract the post ID from the clicked element's id attribute
    var postId = $(this).attr("id").split('-')[1];
    
    // Show the modal corresponding to the post ID
    $('#post-' + postId + '.modal').modal('show');
});
$(document).on('click', '.modal-content .close', function() {
    // Find the closest modal to the clicked close button
    var modal = $(this).closest('.modal');

    // Hide the modal
    $(modal).modal('hide');
});
