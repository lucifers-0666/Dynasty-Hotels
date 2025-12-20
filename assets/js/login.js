document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signinForm");
    const usernameOrEmailInput = document.getElementById("username_or_email");
    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.getElementById("togglePassword");
    const clientError = document.getElementById("clientError");

    form.addEventListener("submit", function (event) {
        // Clear previous error messages
        clearErrors();

        // Validate fields
        let isValid = true;

        // Validate username or email
        if (usernameOrEmailInput.value.trim() === "") {
            displayError("usernameError", "Please enter your username or email.");
            isValid = false;
        }

        // Validate password
        if (passwordInput.value.trim() === "") {
            displayError("passwordError", "Please enter your password.");
            isValid = false;
        }

        // Prevent submission if there are errors
        if (!isValid) {
            clientError.style.display = "block";
            event.preventDefault();
        } else {
            clientError.style.display = "none";
        }
    });

    // Toggle password visibility
    togglePasswordButton.addEventListener("click", function () {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        togglePasswordButton.textContent = type === "password" ? "Show" : "Hide";
    });

    // Utility: Display error
    function displayError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        if (errorElement) {
            errorElement.style.display = "block";
            errorElement.textContent = message;
        }
    }

    // Utility: Clear all error messages
    function clearErrors() {
        document.querySelectorAll(".error-message").forEach((error) => {
            error.style.display = "none";
        });
    }
});




document.getElementById("signinForm").addEventListener("submit", function (e) {
    let hasError = false;

    // Clear previous error messages
    document.getElementById("usernameError").style.display = "none";
    document.getElementById("passwordError").style.display = "none";

    // Validate Username or Email
    const usernameOrEmail = document.getElementById("username_or_email").value.trim();
    if (!usernameOrEmail) {
        document.getElementById("usernameError").style.display = "block";
        hasError = true;
    }

    // Validate Password
    const password = document.getElementById("password").value.trim();
    if (!password) {
        document.getElementById("passwordError").style.display = "block";
        hasError = true;
    }

    // Prevent form submission if there are errors
    if (hasError) {
        e.preventDefault();
    }
});





