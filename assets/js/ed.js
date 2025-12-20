document.addEventListener("DOMContentLoaded", () => {
    function validateForm(event) {
        // Get form fields
        const oldPassword = document.getElementById("old_password").value.trim();
        const newPassword = document.getElementById("new_password").value.trim();
        const confirmPassword = document.getElementById("confirm_password").value.trim();
        const errorMessageDiv = document.getElementById("error-message");

        // Clear previous error message
        errorMessageDiv.style.display = "none";
        errorMessageDiv.textContent = "";

        // Perform validations
        if (!oldPassword) {
            errorMessageDiv.textContent = "Old password is required.";
            errorMessageDiv.style.display = "block";
            event.preventDefault();
            return;
        }

        if (!newPassword) {
            errorMessageDiv.textContent = "New password is required.";
            errorMessageDiv.style.display = "block";
            event.preventDefault();
            return;
        }

        if (newPassword.length < 8) {
            errorMessageDiv.textContent = "New password must be at least 8 characters long.";
            errorMessageDiv.style.display = "block";
            event.preventDefault();
            return;
        }

        if (newPassword !== confirmPassword) {
            errorMessageDiv.textContent = "New passwords do not match.";
            errorMessageDiv.style.display = "block";
            event.preventDefault();
            return;
        }

        // Form is valid; proceed to submit
    }

    // Attach the validateForm function to the submit button
    const form = document.querySelector("form");
    form.addEventListener("submit", validateForm);
});
function toggleDropdown(event) {
    var dropdown = document.getElementById('dropdownMenu');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}

// Close dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.matches('.profile') && !event.target.matches('.profile *')) {
        var dropdown = document.getElementById('dropdownMenu');
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        }
    }
};