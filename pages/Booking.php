<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking Form</title>
    <link rel="stylesheet" href="../assets/css/Booking.css"/>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Event Booking Form</h2>
        </div>
        <form action="/submit-event" method="post">
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            
            <label for="number">Phone Number :</label>
            <input type="tel" id="number" name="number" placeholder="Enter your phone number" required>
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="purpose">Purpose of Event</label>
            <select id="purpose" name="purpose" required>
                <option value="">Select purpose</option>
                <option value="wedding">Wedding</option>
                <option value="birthday">Birthday</option>
                <option value="conference">Conference</option>
                <option value="other">Other</option>
            </select>
            
            <label for="guests">Number of Guests :</label>
            <input type="number" id="guests" name="guests" placeholder="Enter number of guests" required>
            
            <label for="date">Event Date :</label>
            <input type="date" id="date" name="date" required>
            
            <label for="additional">Additional Information</label>
            <textarea id="additional" name="additional" rows="4" placeholder="Any additional details or requests"></textarea>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>


