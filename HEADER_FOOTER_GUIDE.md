# Dynasty Hotels - Header & Footer Integration Guide

## 📁 Files Created

### 1. Header Component
- **Location:** `includes/header.php`
- **Size:** ~300 lines
- **Features:**
  - Two-tier header (top bar + main nav)
  - Sticky navigation with shrink effect
  - Scroll progress bar
  - Dropdown menus for Accommodations, Dining, Experiences
  - Expanding search bar
  - Mobile hamburger menu with full-screen overlay
  - Active page highlighting (PHP-based)

### 2. Footer Component
- **Location:** `includes/footer.php`
- **Size:** ~250 lines
- **Features:**
  - 4-column responsive layout
  - Contact information with icons
  - Newsletter signup form
  - Social media icons
  - Trust & certification badges
  - Payment method icons
  - Back-to-top floating button
  - Animated entrance on scroll

---

## 🚀 How to Use

### Method 1: PHP Include (Recommended)
Add to any PHP page:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynasty Hotels</title>
    <!-- Other meta tags -->
</head>
<body>
    
    <!-- Include Header -->
    <?php include 'includes/header.php'; ?>
    
    <!-- Your Page Content -->
    <main>
        <h1>Your Content Here</h1>
    </main>
    
    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>
```

---

## 📝 Update Existing Pages

### For Root Pages (index.php, room.php, etc.)

**Before:**
```php
<!DOCTYPE html>
<html>
<head>...</head>
<body>
    <!-- Old header code -->
    <header>...</header>
    
    <main>
        Your content
    </main>
    
    <!-- Old footer code -->
    <footer>...</footer>
</body>
</html>
```

**After:**
```php
<?php include 'includes/header.php'; ?>

<main>
    Your content
</main>

<?php include 'includes/footer.php'; ?>
```

### For Pages/ Directory (pages/faq.php, etc.)

```php
<?php include '../includes/header.php'; ?>

<main>
    Your content
</main>

<?php include '../includes/footer.php'; ?>
```

---

## 🎨 Features Breakdown

### Header Features

1. **Top Bar** (Dismissible)
   - Phone: +1 (555) 123-4567
   - Email: info@dynastyhotel.com
   - Tagline: "Luxury Living, Unmatched Comfort"
   - Language selector (EN)
   - Currency selector (USD)
   - Social media icons (Facebook, Instagram, Twitter)
   - Close button (X)

2. **Main Navigation**
   - Logo: "DYNASTY HOTELS" with gold underline
   - Menu items: Home, Accommodations, Dining & Bars, Spa & Wellness, Experiences, Events, Gallery, About
   - Dropdowns for: Accommodations, Dining & Bars, Experiences
   - Search button (expands to search bar)
   - User account icon
   - "Book Now" button (gold, with calendar icon)
   - Mobile hamburger menu (< 1024px)

3. **Scroll Effects**
   - Progress bar at top (shows scroll position)
   - Header shrinks from 70px to 60px
   - Background becomes semi-transparent with blur
   - Smooth transitions

4. **Mobile Menu**
   - Full-screen overlay
   - Vertical centered navigation
   - Gold divider lines
   - Large "Book Now" button at center
   - Close X button

### Footer Features

1. **Main Content** (4 Columns)
   - **Column 1:** About Dynasty Hotel (logo, tagline, description)
   - **Column 2:** Quick Links (Explore section with 8 links)
   - **Column 3:** Guest Services (8 service links)
   - **Column 4:** Contact info, newsletter signup, social media

2. **Trust Bar**
   - 6 certification badges
   - Forbes 5-Star, AAA Five Diamond, Leading Hotels, TripAdvisor, Green Globe, World's Best 2024
   - Hover effect: grayscale to color, scale up

3. **Bottom Bar**
   - Copyright text
   - Payment method icons (Visa, Mastercard, Amex, PayPal)
   - Legal links: Privacy Policy, Terms & Conditions, Sitemap, Accessibility

4. **Back to Top Button**
   - Fixed position (bottom-right)
   - Appears after scrolling 300px
   - Smooth scroll animation
   - Gold circular button with arrow

---

## 🎯 Active Page Highlighting

The header automatically detects the current page and highlights the active menu item.

**How it works:**
```php
$current_page = basename($_SERVER['PHP_SELF']); // Gets "index.php", "room.php", etc.
```

Then in navigation:
```php
<a href="index.php" class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
    Home
</a>
```

**Active styling:**
- Gold text color (#D4AF37)
- Gold bottom border (3px)
- Bold font weight (600)

---

## 📱 Responsive Breakpoints

### Desktop (1440px+)
- Full 4-column footer
- All header elements visible
- 35px spacing between nav items

### Laptop (1024-1439px)
- 4-column footer (slightly narrower)
- Reduced nav spacing to 25px
- Smaller font sizes

### Tablet (768-1023px)
- Footer: 2 columns x 2 rows
- Hide top bar
- Show hamburger menu
- Logo centered

### Mobile (320-767px)
- Footer: All columns stack vertically
- Header: Hamburger only
- Logo left, book button icon only
- Social icons larger (50px)
- Trust badges: horizontal scroll

---

## 🎨 Color Palette

```css
Cream Shades:
- cream-50: #FAF8F3 (lightest, backgrounds)
- cream-100: #F5F3ED (medium)
- cream-200: #E8E4DC (darker, text)

Gold Shades:
- gold-500: #D4AF37 (primary gold)
- gold-600: #C9A961 (hover states)

Brown Shades:
- brown-700: #5D4037 (text)
- brown-800: #4E342E (medium)
- brown-900: #3E2723 (darkest, backgrounds)
```

---

## 🔧 Customization Guide

### Change Hotel Name
In `includes/header.php`, line ~80:
```php
<span class="font-display text-3xl text-brown-900">DYNASTY</span>
<span class="font-display text-sm text-brown-700">HOTELS</span>
```

### Change Contact Info
In `includes/footer.php`, line ~60:
```php
<a href="tel:+15551234567">+1 (555) 123-4567</a>
<a href="mailto:reservations@dynastyhotel.com">reservations@dynastyhotel.com</a>
<p>123 Luxury Avenue, City, State 12345</p>
```

### Add/Remove Navigation Items
In `includes/header.php`, line ~100-120:
```php
<a href="new-page.php" class="nav-link">New Page</a>
```

### Change Colors
Update Tailwind config in `includes/header.php`, line ~10-30:
```javascript
colors: {
    gold: {
        500: '#YOUR_COLOR', // Change gold color
    }
}
```

---

## 🐛 Troubleshooting

### Issue: Icons not showing
**Solution:** Ensure Lucide script is loaded:
```html
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>
```

### Issue: Active page not highlighting
**Solution:** Check file naming matches exactly:
```php
// If your file is "Room.php" but code checks "room.php", it won't match
$current_page = strtolower(basename($_SERVER['PHP_SELF']));
```

### Issue: Mobile menu not closing
**Solution:** Check JavaScript is at bottom of header.php file

### Issue: Dropdown not appearing
**Solution:** Check parent has class "dropdown" and child has "dropdown-menu"

### Issue: Footer links pointing to wrong pages
**Solution:** Update relative paths:
```php
// Root level pages
href="room.php"

// Pages in /pages directory
href="pages/faq.php"

// From /pages directory to root
href="../room.php"
```

---

## ✅ Testing Checklist

- [ ] Header displays correctly on all pages
- [ ] Footer displays correctly on all pages
- [ ] Active page highlighting works
- [ ] Dropdown menus appear on hover
- [ ] Search bar expands and collapses
- [ ] Mobile menu opens and closes
- [ ] Back-to-top button appears after scrolling
- [ ] All links work correctly
- [ ] Newsletter form submits
- [ ] Icons display properly
- [ ] Responsive on mobile (320px width)
- [ ] Responsive on tablet (768px width)
- [ ] Responsive on desktop (1440px width)
- [ ] Scroll progress bar works
- [ ] Header shrinks on scroll
- [ ] Social icons have hover effects
- [ ] Trust badges have hover effects

---

## 🚀 Next Steps

1. **Remove old header/footer code** from existing pages
2. **Replace with include statements** for new components
3. **Update navigation links** to match your page structure
4. **Customize contact information** in footer
5. **Test on all pages** to ensure consistency
6. **Verify mobile responsiveness** on real devices
7. **Add actual social media links** to icons
8. **Connect newsletter form** to email service (e.g., Mailchimp)

---

## 📞 Support

Need help? Check:
- **Lucide Icons:** https://lucide.dev/icons/
- **Tailwind CSS:** https://tailwindcss.com/docs
- **PHP Includes:** https://www.php.net/manual/en/function.include.php

---

## 🎉 Summary

You now have:
- ✅ Professional luxury hotel header with navigation
- ✅ Comprehensive footer with all sections
- ✅ Fully responsive (mobile, tablet, desktop)
- ✅ Active page highlighting
- ✅ Smooth animations and transitions
- ✅ Search functionality
- ✅ Mobile menu overlay
- ✅ Back-to-top button
- ✅ Newsletter signup
- ✅ Social media integration
- ✅ Trust badges & certifications
- ✅ Payment method display

**Your Dynasty Hotels website now has top 1% modern luxury design components!** 🏨✨
