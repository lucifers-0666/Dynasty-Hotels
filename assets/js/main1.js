
// Smooth scroll to "About Us" section when clicking the "About Us" link
document.querySelector('a[href="#about-us-section"]').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default anchor click behavior

    // Scroll smoothly to the target section
    document.querySelector('#about-us-section').scrollIntoView({
        behavior: 'smooth'
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // No need for additional JS code if using CSS scroll-behavior.
    // But if you want more control, you can handle the click event:
    document.querySelector('a[href="#about-us-section"]').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior
        document.querySelector('#about-us-section').scrollIntoView({ behavior: 'smooth' });
    });
});
function submitEmail() {
    const email = document.getElementById("email").value;
    alert('Thank you for subscribing with: ${email}');
    // Reset the form
    document.getElementById("email").value = "";
}
// no work it 

    document.getElementsByClassName("logo").addEventListener("click", function() {
        location.reload(); // Refreshes the page
    });
