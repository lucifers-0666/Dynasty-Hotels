<?php
session_start(); // Start the session

// Define menu items
$menu = [
    'breakfast' => [
        ['name' => 'Aloo Paratha', 'price' => 50.00, 'image' => 'food\dish-1.png'],  
        ['name' => 'Masala Dosa', 'price' => 250.00, 'image' => 'food\dish2.jpg'],   
        ['name' => 'Idli with Sambar', 'price' => 150.00, 'image' => 'food/dish3.jpg'], 
        ['name' => 'Poha', 'price' => 70.00, 'image' => 'food/dish4.jpg'],          
        ['name' => 'Chole Bhature', 'price' => 125.00, 'image' => 'food/dish5.jpg'], 
        ['name' => 'Upma', 'price' => 70.00, 'image' => 'food/dish6.jpg'],         
    ],
    'lunch' => [
        ['name' => 'Chicken Biryani', 'price' => 200.00, 'image' => 'food/dish7.jpg'], 
        ['name' => 'Paneer Tikka Masala', 'price' => 270.00, 'image' => 'food/dish8.jpg'], 
        ['name' => 'Dal Makhani', 'price' => 130.00, 'image' => 'food/dish9.jpg'],      
        ['name' => 'Vegetable Korma', 'price' => 140.00, 'image' => 'food/dish10.jpg'], 
        ['name' => 'Butter Chicken', 'price' => 240.00, 'image' => 'food/dish11.jpg'], 
        ['name' => 'Rogan Josh', 'price' => 210.00, 'image' => 'food/dish12.jpg'],    
    ],
    'dinner' => [
        ['name' => 'Tandoori Chicken', 'price' => 300.00, 'image' => 'food/dish13.jpg'], 
        ['name' => 'Butter Naan', 'price' => 50.00, 'image' => 'food/dish14.jpg'],      
        ['name' => 'Prawn Masala', 'price' => 240.00, 'image' => 'food/dish15.jpg'],    
        ['name' => 'Palak Paneer', 'price' => 290.00, 'image' => 'food/dish16.jpg'],     
        ['name' => 'Biryani', 'price' => 200.00, 'image' => 'food/dish17.jpg'],         
        ['name' => 'Gulab Jamun', 'price' => 80.00, 'image' => 'food/dish18.jpg'],      
        ['name' => 'Kheer', 'price' => 150.00, 'image' => 'food/dish19.jpg'],            
    ],
];

// Handle form submission (adding to cart)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $price = $_POST['price'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add item to cart
    $_SESSION['cart'][] = ['item' => $item, 'price' => $price];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="food.css">
    <title>Hotel Dynasty Indian Menu</title>
</head>
<body>
    <div class="container">
        <h1>Hotel Dynasty Indian Menu</h1>

        <?php foreach ($menu as $meal => $items): ?>
            <h2><?php echo ucfirst($meal); ?></h2>
            <ul class="menu-list">
                <?php foreach ($items as $item): ?>
                    <li>
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="dish-image">
                        <div class="dish-info">
                            <h3><?php echo $item['name']; ?></h3>
                            <p>Price: â‚¹<?php echo number_format($item['price'], 2); ?></p>
                            <form method="POST" class="add-to-cart-form">
                                <input type="hidden" name="item" value="<?php echo $item['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                                <button type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>

        <h2>Your Cart</h2>
        <ul id="cart" class="cart-list">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <?php foreach ($_SESSION['cart'] as $cartItem): ?>
                    <li>
                        <?php echo $cartItem['item']; ?> - â‚¹<?php echo number_format($cartItem['price'], 2); ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
   
            <?php endif; ?>
        </ul>
    </div>

    <script src="food.js"></script>
</body>
</html>

