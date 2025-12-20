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


function validateForm() {
    // Clear previous error messages
    document.querySelectorAll(".error").forEach((error) => (error.textContent = ""));

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

    let isValid = true;

    // Validation checks with inline error messages
    if (!name) {
        document.getElementById("name-error").textContent = "Name is required.";
        isValid = false;
    }

    if (!number || isNaN(number) || number.length < 10) {
        document.getElementById("number-error").textContent = "Enter a valid phone number.";
        isValid = false;
    }

    if (!email || !email.includes("@")) {
        document.getElementById("email-error").textContent = "Enter a valid email address.";
        isValid = false;
    }

    if (!roomType) {
        document.getElementById("room-type-error").textContent = "Please select a room type.";
        isValid = false;
    }

    // Check-in date validation
    if (!checkinDate) {
        document.getElementById("checkin-date-error").textContent = "Check-in date is required.";
        isValid = false;
    } else {
        const today = new Date().setHours(0, 0, 0, 0); // Current date with time reset
        const selectedCheckinDate = new Date(checkinDate).setHours(0, 0, 0, 0);
        if (selectedCheckinDate < today) {
            document.getElementById("checkin-date-error").textContent = "Check-in date cannot be in the past.";
            isValid = false;
        }
    }

    if (!checkoutDate) {
        document.getElementById("checkout-date-error").textContent = "Check-out date is required.";
        isValid = false;
    }

    // Ensure check-out is after check-in
    if (checkinDate && checkoutDate) {
        const selectedCheckinDate = new Date(checkinDate);
        const selectedCheckoutDate = new Date(checkoutDate);
        if (selectedCheckoutDate <= selectedCheckinDate) {
            document.getElementById("checkout-date-error").textContent = "Check-out date must be after check-in date.";
            isValid = false;
        }
    }

    if (!paymentMethod) {
        document.getElementById("payment-method-error").textContent = "Please select a payment method.";
        isValid = false;
    }

    if (paymentMethod === "credit-card" || paymentMethod === "debit-card") {
        if (!cardNumber || cardNumber.length !== 16 || isNaN(cardNumber)) {
            document.getElementById("card-number-error").textContent = "Enter a valid 16-digit card number.";
            isValid = false;
        }
        if (!expiryDate) {
            document.getElementById("expiry-date-error").textContent = "Expiry date is required.";
            isValid = false;
        }
        if (!cvv || cvv.length !== 3 || isNaN(cvv)) {
            document.getElementById("cvv-error").textContent = "Enter a valid 3-digit CVV.";
            isValid = false;
        }
    }

    if (!isValid) {
        return false;
    }

    document.getElementById("bookingForm").submit();
}
