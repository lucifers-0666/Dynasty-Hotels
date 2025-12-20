function togglePaymentFields() {
    const paymentMethod = document.getElementById('payment-method').value;
    
    // Hide all payment-specific sections initially
    document.querySelector('.card-fields').style.display = 'none';
    document.querySelector('.gpay-fields').style.display = 'none';
    document.querySelector('.cash-fields').style.display = 'none';
    
    // Show payment fields based on the selected method
    if (paymentMethod === 'credit-card' || paymentMethod === 'debit-card') {
        document.querySelector('.card-fields').style.display = 'block';
    } else if (paymentMethod === 'gpay') {
        document.querySelector('.gpay-fields').style.display = 'block';
    } else if (paymentMethod === 'cash') {
        document.querySelector('.cash-fields').style.display = 'block';
    }
}

// Inline validation
function validateForm(event) {
    let isValid = true;
    clearErrors(); // Clear previous errors

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const guests = document.getElementById('guests').value;
    const mealType = document.getElementById('meal_type').value;
    const bookingDate = document.getElementById('booking_date').value;

    if (!name) {
        isValid = false;
        document.getElementById('name-error').textContent = "Name is required.";
    }

    if (!email || !email.includes("@")) {
        isValid = false;
        document.getElementById('email-error').textContent = "Enter a valid email.";
    }

    if (!phone || phone.length !== 10 || isNaN(phone)) {
        isValid = false;
        document.getElementById('phone-error').textContent = "Enter a valid 10-digit phone number.";
    }

    if (!guests || guests <= 0) {
        isValid = false;
        document.getElementById('guests-error').textContent = "Number of guests is required.";
    }

    if (!bookingDate) {
        isValid = false;
        document.getElementById('booking-date-error').textContent = "Booking date is required.";
    }

    if (!mealType) {
        isValid = false;
        document.getElementById('meal-type-error').textContent = "Meal type is required.";
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
}

function clearErrors() {
    document.querySelectorAll(".error").forEach(function (errorElement) {
        errorElement.textContent = "";
    });
}

document.getElementById("enquiryForm").addEventListener("submit", validateForm);
