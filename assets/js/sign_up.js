document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");

    // Function to display error messages below the respective input
    const showError = (input, message) => {
        // Check if error already exists
        let errorElement = input.nextElementSibling;
        if (!errorElement || !errorElement.classList.contains("error-message")) {
            errorElement = document.createElement("p");
            errorElement.className = "error-message";
            errorElement.style.color = "red";
            input.parentNode.insertBefore(errorElement, input.nextSibling);
        }
        errorElement.textContent = message;
    };

    // Function to clear previous error messages
    const clearErrors = () => {
        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach((message) => message.remove());
    };

    // Validate email format
    const isValidEmail = (email) => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    };

    form.addEventListener("submit", (event) => {
        clearErrors(); // Clear old errors
        let isValid = true;

        // Validate username
        if (!username.value.trim()) {
            showError(username, "Username is required.");
            isValid = false;
        }

        // Validate email
        if (!email.value.trim()) {
            showError(email, "Email is required.");
            isValid = false;
        } else if (!isValidEmail(email.value.trim())) {
            showError(email, "Please enter a valid email address.");
            isValid = false;
        }

        // Validate password
        if (!password.value.trim()) {
            showError(password, "Password is required.");
            isValid = false;
        } else if (password.value.length < 6) {
            showError(password, "Password must be at least 6 characters long.");
            isValid = false;
        }

        // Validate confirm password
        if (!confirmPassword.value.trim()) {
            showError(confirmPassword, "Please confirm your password.");
            isValid = false;
        } else if (password.value !== confirmPassword.value) {
            showError(confirmPassword, "Passwords do not match.");
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});
// Function to toggle password visibility
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const toggleBtn = field.nextElementSibling;
    if (field.type === "password") {
        field.type = "text";
        toggleBtn.textContent = "Hide";
    } else {
        field.type = "password";
        toggleBtn.textContent = "Show";
    }
}
