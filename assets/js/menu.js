document.addEventListener('DOMContentLoaded', function () {
    const cartList = document.getElementById('cart');

    // Function to update the cart display on the client side
    function updateCart(item, price) {
        const li = document.createElement('li');
        li.textContent = `${item} - ₹${price.toFixed(2)}`;
        cartList.appendChild(li);
    }

    // Handling the Add to Cart button click (no reload)
    const forms = document.querySelectorAll('.add-to-cart-form');
    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form from reloading the page

            const item = this.item.value;
            const price = parseFloat(this.price.value);

            // Check if the item is already in the cart to prevent duplicates
            let itemAlreadyInCart = false;
            const cartItems = cartList.getElementsByTagName('li');
            for (let cartItem of cartItems) {
                if (cartItem.textContent.includes(item)) {
                    itemAlreadyInCart = true;
                    break;
                }
            }

            // If the item isn't in the cart, add it and show an alert
            if (!itemAlreadyInCart) {
                updateCart(item, price);
                alert(`${item} has been added to your cart!`);
            } else {
                alert(`${item} is already in your cart.`);
            }
        });
    });
});
