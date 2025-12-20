function togglePaymentFields() {
    const paymentMethod = document.getElementById('payment-method').value;
    
    // Get the individual sections
    const cardFields = document.querySelector('.card-fields');
    const gpayFields = document.querySelector('.gpay-fields');
    const cashFields = document.querySelector('.cash-fields');
    
    // Reset all fields to be hidden initially
    cardFields.style.display = 'none';
    gpayFields.style.display = 'none';
    cashFields.style.display = 'none';
    
    // Show payment fields based on the selected method
    if (paymentMethod === 'credit-card' || paymentMethod === 'debit-card') {
        // Show card details fields
        cardFields.style.display = 'block';
    } else if (paymentMethod === 'gpay') {
        // Show GPay scanner image and block other payment fields
        gpayFields.style.display = 'block';
    } else if (paymentMethod === 'cash') {
        // Show cash payment message and block other payment fields
        cashFields.style.display = 'block';
    }
}

function validateForm(event) {
    event.preventDefault(); // Prevent form submission to check validation

    // Clear previous error messages
    clearErrors();

  
    let isValid = true;

    // Capture form field values
    const name = document.getElementById("name").value.trim();
    const number = document.getElementById("number").value.trim();
    const email = document.getElementById("email").value.trim();
    const roomType = document.getElementById("room-type").value;
    const checkinDate = document.getElementById("checkin-date").value.trim();
    const checkoutDate = document.getElementById("checkout-date").value.trim();
    const paymentMethod = document.getElementById("payment-method").value;
    const cardNumber = document.getElementById("card-number").value.trim();
    const expiryDate = document.getElementById("expiry-date").value.trim();
    const cvv = document.getElementById("cvv").value.trim();

    // Validation checks and inline error messages
    if (!name) {
        isValid = false;
        document.getElementById("name-error").textContent = "Name is required.";
    }

    if (!number || isNaN(number) || number.length < 10) {
        isValid = false;
        document.getElementById("phone-error").textContent = "Enter a valid phone number.";
    }

    if (!email || !email.includes("@")) {
        isValid = false;
        document.getElementById("email-error").textContent = "Enter a valid email address.";
    }

    if (!roomType) {
        isValid = false;
        document.getElementById("room-type-error").textContent = "Please select a room type.";
    }

    if (!checkinDate) {
        isValid = false;
        document.getElementById("checkin-date-error").textContent = "Check-in date is required.";
    }

    if (!checkoutDate) {
        isValid = false;
        document.getElementById("checkout-date-error").textContent = "Check-out date is required.";
    }

    if (!paymentMethod) {
        isValid = false;
        document.getElementById("payment-method-error").textContent = "Please select a payment method.";
    }

    // Payment-specific validations
    if (paymentMethod === "credit-card" || paymentMethod === "debit-card") {
        if (!cardNumber || cardNumber.length !== 16 || isNaN(cardNumber)) {
            isValid = false;
            document.getElementById("card-number-error").textContent = "Enter a valid 16-digit card number.";
        }
        if (!expiryDate) {
            isValid = false;
            document.getElementById("expiry-date-error").textContent = "Expiry date is required.";
        }
        if (!cvv || cvv.length !== 3 || isNaN(cvv)) {
            isValid = false;
            document.getElementById("cvv-error").textContent = "Enter a valid 3-digit CVV.";
        }
    }

    // If form is valid, submit it
    if (isValid) {
        document.getElementById("bookingForm").submit();
    }
}

// Clear previous error messages
function clearErrors() {
    const errors = document.querySelectorAll(".error");
    errors.forEach(error => error.textContent = "");
}

// Attach the validateForm function to the form's submit event
document.getElementById("bookingForm").addEventListener("submit", validateForm);