$(document).ready(function() {
    const darkSwitch = $("#darkSwitch");

    // Check if the user has a theme preference in local storage
    const darkThemeSelected = localStorage.getItem("darkSwitch") === "dark";

    // Initialize theme based on the preference
    if (darkThemeSelected) {
        $("body").addClass("dark");
    }

    // Handle theme toggle checkbox change
    darkSwitch.change(function() {
        if (this.checked) {
            $("body").addClass("dark");
            localStorage.setItem("darkSwitch", "dark");
        } else {
            $("body").removeClass("dark");
            localStorage.removeItem("darkSwitch");
        }
    });
});


// Function to set a cookie
function setCookie(name, value, daysToExpire) {
    var expires = "";
    
    if (daysToExpire) {
      var date = new Date();
      date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
  
    document.cookie = name + "=" + value + expires + "; path=/";
}



$(document).ready(function() {

    $("#Login-Form").submit(function() {

        // Validate email
        var email = $("#email_address").val();
        if (email === "") {
            displayError("Please enter your username or email address!", '#email_address');
            return false;
        }

        // Validate password
        var password = $("#password").val();
        if (password === "") {
            displayError("Password should not be empty!", '#password');
            return false;
        }
    });

    function displayError(errorMessage, elementId) {
        new Toast('Form Validation', 'now', errorMessage + ' *', 'text-danger').show();
        $(elementId).focus();
        console.log(errorMessage);
    }
});


$(document).ready(function() {

    $("#Signup-Form").submit(function() {

        var username, email, number, password;

        username = $('#username').val();
        email = $('#email_address').val();
        number = $('#phone').val();
        password = $('#password').val();

        // Validate user
        if (username === "") {
            displayError("Username should not be empty!", '#username');
            return false;
        }

        // Validate email
        if (email === "") {
            displayError("Email address should not be empty!", '#email_address');
            return false;
        }
        if (!isValidEmail(email)) {
            displayError('Please enter a valid email address!', '#email_address');
            return false;
        }

        // Validate phone
        if (number === "") {
            displayError("Phone number should not be empty!", '#phone');
            return false;
        }

        // Validate password
        if (password === "") {
            displayError("Password should not be empty!", '#password');
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