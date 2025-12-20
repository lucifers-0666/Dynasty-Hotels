<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);

// Include header
include '../includes/header.php';
?>

<!-- Additional Styles for Homepage -->
<link rel="stylesheet" href="../assets/css/index.css">
<style>
    /* Special Offers Banner */
    .special-offer-banner {
      background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
      color: #fdf5e6;
      padding: 15px 20px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 1001;
    }
    .special-offer-banner.hidden {
      display: none;
    }
    .offer-text {
      flex: 1;
      font-size: 16px;
      font-weight: 500;
    }
    .offer-countdown {
      display: flex;
      gap: 15px;
      margin: 0 20px;
    }
    .countdown-item {
      text-align: center;
    }
    .countdown-number {
      font-size: 24px;
      font-weight: bold;
      display: block;
    }
    .countdown-label {
      font-size: 11px;
      text-transform: uppercase;
    }
    .offer-btn {
      background: #fdf5e6;
      color: #bd8c5e;
      padding: 10px 25px;
      border: none;
      border-radius: 5px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.3s;
    }
    .offer-btn:hover {
      transform: scale(1.05);
    }
    .close-banner {
      background: none;
      border: none;
      color: #fdf5e6;
      font-size: 24px;
      cursor: pointer;
      margin-left: 15px;
    }
    
    /* Chatbot Button */
    .chatbot-button {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(189, 140, 94, 0.4);
      z-index: 1000;
      transition: transform 0.3s;
    }
    .chatbot-button:hover {
      transform: scale(1.1);
    }
    .chatbot-button i {
      color: white;
      font-size: 28px;
    }
    .online-badge {
      position: absolute;
      top: -2px;
      right: -2px;
      width: 18px;
      height: 18px;
      background: #22c55e;
      border: 2px solid white;
      border-radius: 50%;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
    
    /* Chatbot Window */
    .chatbot-window {
      position: fixed;
      bottom: 100px;
      right: 30px;
      width: 350px;
      height: 500px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.3);
      display: none;
      flex-direction: column;
      z-index: 1000;
    }
    .chatbot-window.active {
      display: flex;
    }
    .chat-header {
      background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
      color: white;
      padding: 15px;
      border-radius: 15px 15px 0 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .chat-body {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      background: #fdf5e6;
    }
    .chat-message {
      background: white;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .quick-actions {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-top: 15px;
    }
    .quick-action-btn {
      background: #bd8c5e;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
      transition: background 0.3s;
    }
    .quick-action-btn:hover {
      background: #a07a4d;
    }
    .chat-input-area {
      padding: 15px;
      background: white;
      border-radius: 0 0 15px 15px;
      display: flex;
      gap: 10px;
    }
    .chat-input-area input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 20px;
      outline: none;
    }
    .chat-input-area button {
      background: #bd8c5e;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
    }
    
    /* ========== DESIGN ENHANCEMENTS ========== */
    
    /* Smooth Scrolling */
    html {
      scroll-behavior: smooth;
    }
    
    /* Sticky Header with Shrink Effect */
    header {
      position: sticky;
      top: 0;
      z-index: 999;
      transition: all 0.3s ease;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    header.scrolled {
      padding: 10px 0;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    header.scrolled .logo img {
      max-height: 50px;
      transition: all 0.3s ease;
    }
    
    /* Floating Book Now Button */
    .floating-book-btn {
      position: fixed;
      bottom: 100px;
      right: 30px;
      background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
      color: white;
      padding: 15px 30px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 16px;
      box-shadow: 0 5px 25px rgba(189, 140, 94, 0.5);
      cursor: pointer;
      z-index: 998;
      transition: all 0.3s ease;
      animation: pulse-btn 2s infinite;
      border: none;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .floating-book-btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 8px 30px rgba(189, 140, 94, 0.7);
    }
    @keyframes pulse-btn {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    
    /* Back to Top Button */
    .back-to-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 997;
      box-shadow: 0 4px 15px rgba(189, 140, 94, 0.4);
    }
    .back-to-top.visible {
      opacity: 1;
      visibility: visible;
    }
    .back-to-top:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(189, 140, 94, 0.6);
    }
    
    /* Scroll Reveal Animations */
    .scroll-reveal {
      opacity: 0;
      transform: translateY(50px);
      transition: all 0.8s ease;
    }
    .scroll-reveal.revealed {
      opacity: 1;
      transform: translateY(0);
    }
    .scroll-reveal-left {
      opacity: 0;
      transform: translateX(-50px);
      transition: all 0.8s ease;
    }
    .scroll-reveal-left.revealed {
      opacity: 1;
      transform: translateX(0);
    }
    .scroll-reveal-right {
      opacity: 0;
      transform: translateX(50px);
      transition: all 0.8s ease;
    }
    .scroll-reveal-right.revealed {
      opacity: 1;
      transform: translateX(0);
    }
    
    /* Image Hover Effects */
    .hover-zoom {
      overflow: hidden;
      border-radius: 10px;
    }
    .hover-zoom img {
      transition: transform 0.5s ease, filter 0.5s ease;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .hover-zoom:hover img {
      transform: scale(1.1);
      filter: brightness(1.1);
    }
    
    /* Card Lift Effect */
    .card-lift {
      transition: all 0.3s ease;
    }
    .card-lift:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    /* Button Hover Effects - Enhanced */
    button, .btn, a.btn {
      transition: all 0.3s ease;
      cursor: pointer;
    }
    button:hover, .btn:hover, a.btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    button:active, .btn:active, a.btn:active {
      transform: translateY(0);
    }
    
    /* Gold Shimmer Effect */
    .gold-shimmer {
      position: relative;
      overflow: hidden;
    }
    .gold-shimmer::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -100%;
      width: 50%;
      height: 200%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
      transform: rotate(45deg);
      animation: shimmer 3s infinite;
    }
    @keyframes shimmer {
      0% { left: -100%; }
      100% { left: 200%; }
    }
    

    
    /* Section Dividers */
    .section-divider {
      width: 100px;
      height: 3px;
      background: linear-gradient(90deg, transparent, #d4af37, transparent);
      margin: 20px auto;
    }
    
    /* Decorative Gold Border */
    .gold-border-top {
      border-top: 3px solid #d4af37;
      padding-top: 30px;
    }
    
    /* Progress Bar */
    .scroll-progress {
      position: fixed;
      top: 0;
      left: 0;
      width: 0%;
      height: 4px;
      background: linear-gradient(90deg, #bd8c5e, #d4af37);
      z-index: 10000;
      transition: width 0.1s ease;
    }
    
    /* Social Proof Notification */
    .social-proof-notification {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background: white;
      padding: 15px 20px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
      display: flex;
      align-items: center;
      gap: 15px;
      z-index: 996;
      opacity: 0;
      transform: translateX(-100%);
      transition: all 0.5s ease;
    }
    .social-proof-notification.show {
      opacity: 1;
      transform: translateX(0);
    }
    .social-proof-notification img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
    .social-proof-text {
      font-size: 14px;
      color: #333;
    }
    .social-proof-time {
      font-size: 12px;
      color: #666;
    }
    
    /* Mobile Responsive Adjustments */
    @media (max-width: 768px) {
      .floating-book-btn {
        padding: 12px 20px;
        font-size: 14px;
        bottom: 80px;
        right: 15px;
      }
      .back-to-top {
        width: 45px;
        height: 45px;
        bottom: 20px;
        right: 15px;
      }
      .chatbot-button {
        width: 50px;
        height: 50px;
        bottom: 20px;
        right: 15px;
      }
      .chatbot-window {
        width: 90%;
        right: 5%;
        bottom: 80px;
      }
      .social-proof-notification {
        left: 10px;
        right: 10px;
        bottom: 10px;
      }
    }
    
    /* ========== ADDITIONAL ENHANCEMENTS ========== */
    
    /* Enhanced Typography */
    h1, h2, h3, h4, h5, h6 {
      letter-spacing: 1px;
      position: relative;
    }
    h1 { font-size: 48px; line-height: 1.2; }
    h2 { font-size: 42px; line-height: 1.3; margin-bottom: 20px; }
    h3 { font-size: 32px; line-height: 1.4; }
    
    h2::after {
      content: '';
      display: block;
      width: 80px;
      height: 3px;
      background: linear-gradient(90deg, #d4af37, transparent);
      margin: 15px auto 0;
    }
    
    /* Decorative Section Headers */
    .section-header {
      text-align: center;
      margin-bottom: 60px;
      position: relative;
    }
    .section-header h2 {
      color: #bd8c5e;
      margin-bottom: 15px;
    }
    .section-header p {
      color: #666;
      font-size: 18px;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.8;
    }
    .section-header::before,
    .section-header::after {
      content: '✦';
      color: #d4af37;
      font-size: 20px;
      position: absolute;
      top: -10px;
    }
    .section-header::before {
      left: calc(50% - 100px);
    }
    .section-header::after {
      right: calc(50% - 100px);
    }
    
    /* Urgency Badges */
    .urgency-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: linear-gradient(135deg, #dc3545, #ff4757);
      color: white;
      padding: 8px 15px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      animation: pulse-urgency 2s infinite;
      box-shadow: 0 3px 10px rgba(220, 53, 69, 0.4);
      z-index: 10;
    }
    @keyframes pulse-urgency {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    
    /* Limited Availability Indicator */
    .limited-availability {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #fff3cd;
      color: #856404;
      padding: 8px 15px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      margin-top: 10px;
    }
    .limited-availability i {
      color: #ffc107;
      animation: blink 1.5s infinite;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.3; }
    }
    
    /* Enhanced Form Focus States */
    input:focus, textarea:focus, select:focus {
      border-color: #d4af37 !important;
      box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2) !important;
      outline: none !important;
      transform: translateY(-2px);
      transition: all 0.3s ease;
    }
    
    /* Button Loading State */
    button.loading {
      position: relative;
      color: transparent !important;
      pointer-events: none;
    }
    button.loading::after {
      content: '';
      position: absolute;
      width: 16px;
      height: 16px;
      top: 50%;
      left: 50%;
      margin-left: -8px;
      margin-top: -8px;
      border: 2px solid #ffffff;
      border-radius: 50%;
      border-top-color: transparent;
      animation: spin 0.6s linear infinite;
    }
    
    /* Parallax Hero Section */
    .hero-section {
      position: relative;
      overflow: hidden;
      min-height: 600px;
    }
    .hero-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      transform: translateZ(0);
      will-change: transform;
    }
    .hero-content {
      position: relative;
      z-index: 2;
    }
    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(189,140,94,0.7), rgba(212,175,55,0.5));
      z-index: 1;
    }
    
    /* Scroll Down Indicator */
    .scroll-indicator {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
      animation: bounce 2s infinite;
      cursor: pointer;
    }
    .scroll-indicator i {
      font-size: 30px;
      color: white;
      text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
      40% { transform: translateX(-50%) translateY(-10px); }
      60% { transform: translateX(-50%) translateY(-5px); }
    }
    
    /* Breadcrumb Navigation */
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 15px 0;
      font-size: 14px;
      color: #666;
    }
    .breadcrumb a {
      color: #bd8c5e;
      text-decoration: none;
      transition: color 0.3s;
    }
    .breadcrumb a:hover {
      color: #d4af37;
    }
    .breadcrumb span {
      color: #999;
    }
    
    /* Image Lazy Load Effect */
    img {
      transition: opacity 0.3s ease;
    }
    img[loading="lazy"] {
      opacity: 0;
    }
    img.loaded {
      opacity: 1;
    }
    
    /* Success Checkmark Animation */
    .success-checkmark {
      display: none;
      width: 80px;
      height: 80px;
      margin: 0 auto;
    }
    .success-checkmark.show {
      display: block;
      animation: scaleIn 0.5s ease;
    }
    .checkmark-circle {
      stroke: #28a745;
      stroke-width: 3;
      stroke-dasharray: 166;
      stroke-dashoffset: 166;
      animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }
    .checkmark-check {
      stroke: #28a745;
      stroke-width: 3;
      stroke-linecap: round;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.6s forwards;
    }
    @keyframes stroke {
      100% { stroke-dashoffset: 0; }
    }
    @keyframes scaleIn {
      0% { transform: scale(0); }
      100% { transform: scale(1); }
    }
    
    /* Tooltip */
    .tooltip {
      position: relative;
      display: inline-block;
    }
    .tooltip .tooltiptext {
      visibility: hidden;
      width: 200px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 8px;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -100px;
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 13px;
    }
    .tooltip .tooltiptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #333 transparent transparent transparent;
    }
    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }
    
    /* Hamburger Menu */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      padding: 10px;
      z-index: 1001;
    }
    .hamburger span {
      width: 30px;
      height: 3px;
      background: #bd8c5e;
      transition: all 0.3s ease;
      border-radius: 3px;
    }
    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(8px, 8px);
    }
    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }
    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(8px, -8px);
    }
    
    /* Mobile Menu Overlay */
    .mobile-menu-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.8);
      z-index: 999;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .mobile-menu-overlay.active {
      display: block;
      opacity: 1;
    }
    
    @media (max-width: 768px) {
      .hamburger {
        display: flex;
      }
      .nav-left, .nav-right {
        position: fixed;
        top: 0;
        left: -100%;
        width: 80%;
        max-width: 300px;
        height: 100vh;
        background: white;
        padding: 80px 20px 20px;
        transition: left 0.3s ease;
        z-index: 1000;
        overflow-y: auto;
      }
      .nav-left.active, .nav-right.active {
        left: 0;
      }
      .nav-left ul, .nav-right ul {
        flex-direction: column;
        gap: 20px;
      }
      .nav-left ul li, .nav-right ul li {
        width: 100%;
      }
      .nav-left ul li a, .nav-right ul li a {
        display: block;
        padding: 15px;
        border-bottom: 1px solid #f0f0f0;
      }
      h1 { font-size: 32px; }
      h2 { font-size: 28px; }
      h3 { font-size: 24px; }
    }
    
    /* Section Spacing Enhancement */
    section {
      padding: 80px 20px;
    }
    section:nth-child(even) {
      background: #fdf5e6;
    }
    section:nth-child(odd) {
      background: white;
    }
    
    /* Card Enhancement with Border */
    .enhanced-card {
      border: 2px solid transparent;
      transition: all 0.3s ease;
    }
    .enhanced-card:hover {
      border-color: #d4af37;
    }
    
    /* Price Tag Styling */
    .price-tag {
      font-size: 32px;
      font-weight: 700;
      color: #bd8c5e;
      position: relative;
    }
    .price-tag sup {
      font-size: 18px;
      top: -10px;
    }
    .price-tag .period {
      font-size: 16px;
      color: #666;
      font-weight: 400;
    }
  </style>

<!-- Special Offers Banner -->
<div class="special-offer-banner" id="offerBanner">
  <div class="offer-text">
    <strong>🎉 Winter Special:</strong> Save 30% on Weekend Stays - Book Before Dec 31st!
  </div>
  <div class="offer-countdown" id="countdown">
    <div class="countdown-item">
      <span class="countdown-number" id="days">00</span>
      <span class="countdown-label">Days</span>
    </div>
    <div class="countdown-item">
      <span class="countdown-number" id="hours">00</span>
      <span class="countdown-label">Hours</span>
    </div>
    <div class="countdown-item">
      <span class="countdown-number" id="minutes">00</span>
      <span class="countdown-label">Minutes</span>
    </div>
    <div class="countdown-item">
      <span class="countdown-number" id="seconds">00</span>
      <span class="countdown-label">Seconds</span>
    </div>
  </div>
  <button class="offer-btn" onclick="window.location.href='room.php'">Book Now</button>
  <button class="close-banner" onclick="closeBanner()">×</button>
</div>

<!-- Chatbot Button & Window -->
<div class="chatbot-button" onclick="toggleChat()">
  <i class="fas fa-concierge-bell"></i>
  <div class="online-badge"></div>
</div>

<div class="chatbot-window" id="chatWindow">
  <div class="chat-header">
    <div>
      <strong>Dynasty Concierge</strong>
      <div style="font-size: 12px;">Online - We're here to help!</div>
    </div>
    <button onclick="toggleChat()" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer;">×</button>
  </div>
  <div class="chat-body">
    <div class="chat-message">
      Hello! I'm your Dynasty Hotel concierge. How may I assist you today?
    </div>
    <div class="quick-actions">
      <button class="quick-action-btn" onclick="quickAction('availability')">Check Availability</button>
      <button class="quick-action-btn" onclick="quickAction('rooms')">View Rooms</button>
      <button class="quick-action-btn" onclick="quickAction('dining')">Dining Reservations</button>
      <button class="quick-action-btn" onclick="quickAction('spa')">Spa Bookings</button>
      <button class="quick-action-btn" onclick="quickAction('attractions')">Local Attractions</button>
      <button class="quick-action-btn" onclick="quickAction('contact')">Contact Us</button>
    </div>
  </div>
  <div class="chat-input-area">
    <input type="text" placeholder="Type your message..." id="chatInput">
    <button onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
  </div>
</div>

<!-- Floating Book Now Button -->
<a href="room.php" class="floating-book-btn">
  <i class="fas fa-calendar-check"></i>
  <span>Book Now</span>
</a>

<!-- Social Proof Notification -->
<div class="social-proof-notification" id="socialProof">
  <i class="fas fa-user-circle" style="font-size: 40px; color: #bd8c5e;"></i>
  <div>
    <div class="social-proof-text"><strong>Sarah from USA</strong> just booked a room</div>
    <div class="social-proof-time">2 minutes ago</div>
  </div>
</div>


<main>
  
  
          <div class="slider">
        
            <div class="slide active">
                  <img src="../assets/images/index\1_Leela-Palace-Bengaluru_Exterior.jpg" alt="First Slide">
                <div class="caption">
              <h4 class="h4-box">Experience Unmatched Luxury</h4>
              <p>Indulge in ultimate comfort and elegance at our hotel. Enjoy exquisite dining and world-class amenities tailored to your every need.</p>
              <a href="Stay.php" class="btn-danger">Book Your Stay Now</a>
          </div>
          </div>
              
          <div class="slide active">
                  <img src="../assets/images/index\facade-front-drive-way.png" alt="2nd Slide">
          </div>
              
          <div class="slide active">
                  <img src="../assets/images/index\poolside-facade.png" alt="3rd Slide">
          </div>
          <!-- <div class="slide active">
<video controls class="slider-video">
        <source src="../assets/images/index\Best 5 Star Luxury Hotel in Bengaluru, Karnataka The Leela Palace Bengaluru.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      </div> -->
          </div>

          <div class="navigation">
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
          </div>

          <div class="slider-pagination">
              <span class="dot active"></span>
              <span class="dot"></span>
              <span class="dot"></span>
          </div>
            </div>
          
            <div class="booking-bar">
    <div class="booking-option">
    <div id="occupancy-summary">
      <label> 0 Room, 0 Adult, 0 Children :</label>
    
</div>

<div id="occupancyModal" class="occupancy-modal">
    <div class="occupancy-item">
        <span>Rooms</span>
        <div class="counter">
            <button onclick="updateCount('rooms', -1)">-</button>
            <span id="rooms-count">0</span>
            <button onclick="updateCount('rooms', 1)">+</button>
        </div>
    </div>
    <div class="occupancy-item">
        <span>Adults</span>
        <div class="counter">
            <button onclick="updateCount('adults', -1)">-</button>
            <span id="adults-count">0</span>
            <button onclick="updateCount('adults', 1)">+</button>
        </div>
    </div>
    <div class="occupancy-item">
        <span>Children</span>
        <div class="counter">
            <button onclick="updateCount('children', -1)">-</button>
            <span id="children-count">0</span>
            <button onclick="updateCount('children', 1)">+</button>
        </div>
    </div>
    <button class="done-button" onclick="closeModal()">Done</button>
</div>

    </div>
    <div class="booking-option">
  <span>Check-in - </span>
  <input type="date" id="checkin" placeholder="Check-in" min="2024-11-10">
  <span>Check-out -</span>
  <input type="date" id="checkout" placeholder="Check-out" min="2024-11-10">
</div>




    <div class="booking-option">
        <label for="room-type">Type of Room:</label>
        <select id="room-type">
            <option value="single">Single Room</option>
            <option value="double">Double Room</option>
            <option value="suite">Royal Suite</option>
            <option value="suite">Maharaja Suite</option>
            <option value="suite">Duplex Suite</option>
            <option value="suite">Luxury Suite</option>

        </select>
    </div>
    <button class="book-button">BOOK</button>
</div>

<!-- Occupancy Modal -->




            
            <div class="center-container top-space bottom-space diss">
                <h1 class="scroll-up">The Dynasty Hotel</h1>
                <h5 class="scroll-up">"Luxury Living, Unmatched Comfort"</h5>
            </div>

<section class="story-section">
              
        <div class="container1">
        
            <div class="frame2">

                    <div class="dusk-img">
                        <img src="../assets/images/about_us\welcome.jpg" alt="Hotel Lobby">
                    </div>

              </div>
                    <br>
            <div class="decorative-divider">
                  <h2>Welcome</h2>
                      <img class="icon-img"src="../assets/images/index\noun-divider-5574945.svg " alt="decorative divider">
                </div>
                    <p> <span class="w-word">D</span><span class="highlight">ynasty Hotels</span>, 
                    a hallmark of elegance and refinement since <span class="highlight">1992</span>.
                    From its beginnings as a <span class="highlight">boutique establishment</span>, 
                    Dynasty Hotels has flourished into a distinguished collection of properties, each embodying a unique blend of 
                    <span class="highlight">timeless luxury</span> and <span class="highlight">contemporary sophistication</span>.</p>
        
                    <div class="arch-line2">
  <video id="sliderVideo" autoplay loop muted>
    <source src="../assets/images/index/Best 5 Star Luxury Hotel in Bengaluru, Karnataka The Leela Palace Bengaluru.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <div class="video-controls">
    <button id="playPauseBtn">&#9658;</button> <!-- Play icon (â–¶) -->
    <button id="muteBtn"><i class="fas fa-volume-up"></i></button>

  </div>
</div>

        
      </div>

</section>

          




  <div class="arch-line" >
<!-- expriment -->
<section class="about-us2">
  <div class="description">
      <h1 >The Grand Lobby</h1>
      <div class="divider">
                      <img class="icon" src="../assets/images/index\noun-calligraphy-element-6271479.svg" alt="Responsible Luxury"> 
                 </div>
                 <p>
    Welcome to <span style="color:  #bd8c5e; font-weight: bold;">The Dynasty Hotel</span>
    , where <span style="font-weight: bold; color: #bd8c5e;">elegance meets comfort</span>.
     Our <span style="font-weight: bold; color: #bd8c5e">grand lobby</span>, with its
      high ceilings, large windows,
       and plush seating, creates an inviting atmosphere bathed in natural light. A 
       <span style="color:  #bd8c5e; font-weight: bold;">  magnificent chandelier </span>
    adds sophistication, while our
     attentive concierge team
     is ready to assist with any needs. Whether 
     arriving,meeting,
      or unwinding, the Grand Lobby offers a <span style="color:  #bd8c5e; font-weight: bold;"> memorable setting.</span>
</p>

  </div>
  <div class="frame">
  <img src="../assets/images/index/manor-lobby-itcwindsor.jpg" alt="Dynasty Hotels Interior">
  </div>
</section>



       


<!-- expriment -->
          <section class="about-us">
                  <div class="custom-frame">
                    
                    <img src="../assets/images/index\leela-palace-kempinski-bangalore-bangalore-india-108556-2.webp" alt="Dynasty Hotels Interior">
                    </div>
                      <div class="description">
                          <h1>Luxurious Hallways</h1>
                          <div class="divider">
                      <img class="icon" src="../assets/images/index\noun-calligraphy-element-6271479.svg" alt="Responsible Luxury"> 
                 </div>
                 <ul style="list-style-type: square; padding-left: 20px; color: #92663c;">
  <li style="margin-bottom: 10px;">
    <span style="font-weight: bold;">A Symphony of Art and Architecture</span>
    <p style="margin: 5px 0 0 20px; line-height: 1.6; color: #333;">
      Our hotelâ€™s interiors are a harmonious blend of 
      <span style="color: #bd8c5e; font-weight: bold;">traditional charm</span> and 
      <span style="color: #bd8c5e; font-weight: bold;">modern sophistication</span>. 
      Each space is thoughtfully designed with an eye for detail, from the exquisite 
      <span style="color: #bd8c5e; font-weight: bold;">wall art</span> to the carefully chosen furnishings that reflect the highest standards of taste. 
      The vibrant hues and textures within the rooms create a serene ambiance, making it the perfect retreat after a day of exploration or business.
    </p>
  </li>
</ul>

                      </div>
          </section>


          <!-- font-weight: bold; color: #bd8c5e;"> -->

        <section class="about-us2">
  <div class="description">
      <h1>Luxurious Bar</h1>
      <div class="divider">
                      <img class="icon" src="../assets/images/index\noun-calligraphy-element-6271479.svg" alt="Responsible Luxury"> 
                 </div><p>
  Step into the exquisite ambiance of the <span style="color: #bd8c5e; font-weight: bold;">Dynasty Bar</span>, where sophistication meets relaxation. Our carefully curated selection features the finest craft beers from around the world, including:
  <ul style="list-style-type: square; margin-top: 10px; padding-left: 20px; color: #333;">
    <li><span style="color:#92663c;" ><strong>Heineken</strong></span> - A classic lager known for its refreshing taste.</li>
    <li><span style="color:#92663c;" ><strong>Guinness</strong></span> - The iconic Irish stout with rich flavors and a creamy head.</li>
    <li><span style="color:#92663c;" ><strong>Chimay Blue</strong></span> - A Belgian strong ale with dark fruit notes and a smooth finish.</li>
    <li><span style="color:#92663c;" ><strong>Dogfish Head 60 Minute IPA</strong></span> - A hoppy and flavorful IPA loved by craft beer enthusiasts.</li>
    <li><span style="color:#92663c;" ><strong>Blue Moon</strong></span> - A Belgian-style wheat ale that pairs perfectly with citrus.</li>
  </ul>
         </br>
  Whether you're unwinding after a long day or celebrating a special occasion, our bartenders are dedicated to providing exceptional service, guiding you through our extensive menu. Enjoy the vibrant atmosphere complemented by tasteful decor, plush seating, and soft lighting.
</p>
<p>
  Join us at the <span style="color: #bd8c5e; font-weight: bold;">Dynasty Bar</span> and indulge in a truly memorable experienceâ€”perfect for beer enthusiasts and casual drinkers alike. Cheers to unforgettable moments!
</p>

  </div>
  <div class="frame">
  <img src="../assets/images/index\bar.jpg" alt="Luxury Hallways">

  </div>
</section>







          <section class="about-us">
                              <div class="custom-frame">
                                  <img src="../assets/images/index/Culinary.jpg.webp" alt="Dynasty Hotels Interior" >
                              </div>
                <div class="description">
                                  <h1>Elegant Dinner Table</h1>
                                  <div class="divider">
                      <img class="icon" src="../assets/images/index\noun-calligraphy-element-6271479.svg" alt="Responsible Luxury"> 
                 </div>
                 <p style="font-size:16px; line-height:1.6; color:#333;">
  Experience dining like never before at our beautifully set dinner table, where every <span style="font-weight:bold; color:#bd8c5e;">dish</span> is a celebration of flavor. Indulge in our chef's signature offerings, including:
  <ul style="list-style-type: square; margin-top: 10px; padding-left: 20px; color: #333;">
    <li><span style="color:#bd8c5e; font-weight:bold;">Mouthwatering Lobster Bisque</span> - A rich and creamy delight that tantalizes the taste buds.</li>
    <li><span style="color:#bd8c5e; font-weight:bold;">Tender Filet Mignon</span> - Perfectly cooked to melt in your mouth, served with seasonal sides.</li>
    <li><span style="color:#bd8c5e; font-weight:bold;">Decadent Chocolate SoufflÃ©</span> - A luscious dessert thatâ€™s a feast for the senses.</li>
  </ul>
  The table is graced with fine china and sparkling glassware, designed to complement the vibrant colors of each course. With luxurious linens and fresh floral arrangements, the atmosphere is as inviting as the cuisine. Whether for an intimate dinner or a grand celebration, our table promises culinary moments to cherish.
</p>

                              <br>
                            <br>
                                <a href="booking.php" class="button-b">Book Table </a>
                        <br>
                </div>
          </section>




          <section class="about-us2">
  <div class="description">
      <h1>Meet Our Master Chef</h1>
      <div class="divider">
                      <img class="icon" src="../assets/images/index\noun-calligraphy-element-6271479.svg" alt="Responsible Luxury"> 
                 </div>
                 <p style="font-size:16px; line-height:1.6; color:#333;">
  At the heart of our culinary excellence is <span style="color: #bd8c5e; font-weight: bold;">Vikas Khanna</span>, whose passion for gastronomy transforms each dish into a masterpiece. With years of experience and a dedication to using the freshest ingredients, Chef Michael crafts menus that celebrate both local flavors and international cuisine.
</p>
<strong style="font-size:16px; color:#92663c;">Key Highlights:</strong>
<ul style="list-style-type: square; margin-top: 10px; padding-left: 20px; color: #333;">
  <li><span style="font-weight: bold;">Blends traditional recipes</span> with innovative techniques.</li>
  <li>Curates <span style="color: #bd8c5e;">seasonal menus</span> featuring the finest produce.</li>
  <li>Specializes in <span style="color: #bd8c5e;">personalized dining experiences</span> for every guest.</li>
  <li>Committed to sustainability by sourcing from <span style="color: #bd8c5e;">local farms</span>.</li>
</ul>
<p style="font-size:16px; line-height:1.6; color:#333;">
  Join us for an unforgettable culinary journey that reflects Chef Michael's artistry and passion for exceptional dining.
</p>

  </div>
  <div class="frame">
  <img src="../assets/images/index\spectra-all-day-dining-restaurant-gurugram.jpg.webp" alt="Grand Lobby">

  </div>
</section>

</div>








</div>


          <div class="arch-line" >
                  <div class="center-container top-space bottom-space diss">
                          <h1 class="scroll-up">"Luxury and Wellness Redefined"</h1>    <!-- Relax, Recharge, and Revitalize -->

                          
                          <h5 class="scroll-up"> "Our Gym, Spa, and Pool â€“ For Your Complete Well-Being"</h5>
                      </div>


                      <button class="nav-button prev" onclick="moveSlide(-1)">&#10094;</button>

                      <div class="carousel-container">
    <!-- <button class="nav-button prev">&#10094;</button> -->

    <div class="carousel">
      <div class="carousel-track">
      <div class="carousel-item active">
          <img src="../assets/images/index\pool3.webp" alt="pool">
          <div class="carousel-caption">
          <h3>Pools</h3>
         
<p>
    Relax in our <span style="color:  #bd8c5e; font-weight: bold;">elegant pool</span> area, surrounded by lush greenery and comfortable loungers. Enjoy refreshing dips and attentive poolside service for a truly serene escape.
</p>

          </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/images/index\theayer.jpg" alt="">
          <div class="carousel-caption">
          <h3>Theater</h3>
<p>
    Our <span style="color:  #bd8c5e; font-weight: bold;">luxurious theater</span> offers plush seating and top-tier audio-visuals, perfect for an unforgettable movie or live show experience.
</p>



          </div>
</div>

<div class="carousel-item">
          <img src="../assets/images/index\spa.jpg" alt="">
          <div class="carousel-caption">
          <h3>Spa</h3>
<p>
    Relax and rejuvenate at ourluxurious spa, offering  <span style="color:  #bd8c5e; font-weight: bold;">soothing massages and wellness </span> treatments in a serene environment.
</p>



          </div>
</div>
        <div class="carousel-item">
          <img src="../assets/images/index\Amenities-Gym.webp" alt="">
          <div class="carousel-caption">
          <h3>Gym</h3>
<p>
    Stay active in our <span style="color:  #bd8c5e; font-weight: bold;">state-of-the-art gym</span>, equipped with modern fitness equipment and designed for all levels of workout.
</p>


          </div>
        </div>
        <div class="carousel-item active">
          <img src="../assets/images/index\garden.jpg" alt="The Leela Palace Agra">
          <div class="carousel-caption">
          <h3>Garden</h3>
<p>
    Stroll through our <span style="color:  #bd8c5e; font-weight: bold;">beautifully landscaped garden</span>, a peaceful oasis filled with lush greenery and vibrant flowers, perfect for relaxation and reflection.
</p>



          </div>
        </div>

        <div class="carousel-item">
          <img src="../assets/images/index\children-area.avif" alt="The Leela Hyderabad">
          <div class="carousel-caption">
          <h3>Children's Area</h3>
<p>
    Our children's area<span style="color:  #bd8c5e; font-weight: bold;"> offers a safe and fun environment </span> with engaging activities and play zones, perfect for young guests to explore and enjoy.
</p>



          </div>
        </div>
        <div class="carousel-item active">
          <img src="../assets/images/index\hotel-7885138_1280.webp" alt="The Leela Palace Agra">
          <div class="carousel-caption">
          <h3>Outdoor Area</h3>
<p>
    Unwind in our <span style="color:  #bd8c5e; font-weight: bold;">relaxing outdoor area</span>, featuring comfortable seating and scenic views for a peaceful escape.
</p>

          </div>
        </div>
        
        <div class="carousel-item">
          <img src="../assets/images/index\wedding-jaipur-luxury-hotel.jpg.webp" alt="The Leela Sikkim">
          <div class="carousel-caption">
          <h3>Wedding Hall</h3>
          
<p>
    Our <span style="color:  #bd8c5e; font-weight: bold;">elegant wedding hall</span> offers a beautiful setting with luxurious amenities for your special day.
</p>


          </div>
        </div>
       
      </div>
    </div>
    <!-- <button class="nav-button next">&#10095;</button> -->
  </div>
  <button class="nav-button next" onclick="moveSlide(1)">&#10095;</button>


</div>
          <!-- arch slider star here -->
          
          <div class="arch-container">
            <div class="arch-slider-wrapper arch-frame">
              <div class="arch-slider">
                <div class="arch-slide-frame">
                  <img src="../assets/images/index/cuisines.png" alt="Slide 1">
                </div>
                <div class="arch-slide-frame">
                  <img src="../assets/images/index/design-and-detailing.png" alt="Slide 2">
                </div>
                <div class="arch-slide-frame">
                  <img src="../assets/images/index/dining.png" alt="Slide 3">
                </div>
                <button class="arch-prev">&#10094;</button>
              <button class="arch-next">&#10095;</button>
              </div>
          </div>
            <!-- Right: Description -->
            <div class="arch-description">
             
              <h2 style="color:#865d37;">Explore Our Finest Cuisines</h2>
<p>
    Discover a world of <span style="color:  #bd8c5e; font-weight: bold;">exquisite tastes</span>
    and <span style="color:  #bd8c5e; font-weight: bold;">elegant presentation</span>. From 
    <span style="color:  #bd8c5e; font-weight: bold;">dining experiences</span> to <span style="color:  #bd8c5e; font-weight: bold;">intricate designs</span>, 
    our spaces provide the perfect setting for a memorable meal. Our range of cuisines offers something for everyone, blending 
    <span style="color:  #bd8c5e; font-weight: bold;">traditional flavors</span> with <span style="color:  #bd8c5e; font-weight: bold;">modern techniques</span>.
</p>
<p>
    Since opening our doors in <span style="color:  #bd8c5e; font-weight: bold;">1992</span>, we have been dedicated to providing an unmatched blend of 
    <span style="color:  #bd8c5e; font-weight: bold;">luxury</span> and <span style="color:  #bd8c5e; font-weight: bold;">comfort</span>. Whether you are here to relax 
    or to savor some of the <span style="color:  #bd8c5e; font-weight: bold;">finest culinary offerings</span>, we ensure an experience that leaves a 
    <span style="color:  #bd8c5e; font-weight: bold;">lasting impression</span>.
</p>
<p>
    Our guests also enjoy exclusive access to <span style="color:  #bd8c5e; font-weight: bold;">state-of-the-art amenities</span>, including our 
    <span style="color:  #bd8c5e; font-weight: bold;">lavish spa</span>, <span style="color:  #bd8c5e; font-weight: bold;">beautiful landscaped gardens</span>, 
    and <span style="color:  #bd8c5e; font-weight: bold;">exceptional event spaces</span> perfect for 
    <span style="color:  #bd8c5e; font-weight: bold;">weddings</span> and 
    <span style="color:  #bd8c5e; font-weight: bold;">corporate gatherings</span>.
</p>
<ul style="list-style-type: square;">
    <li><strong>Authentic International Cuisine</strong> â€“ A blend of global flavors to excite your palate.</li>
    <li><strong>Locally Sourced Ingredients</strong> â€“ Fresh and sustainable, supporting local farmers.</li>
    <li><strong>Exquisite Dining Spaces</strong> â€“ Perfect for intimate dinners or grand celebrations.</li>
    <li><strong>Dedicated Culinary Team</strong> â€“ Bringing passion and expertise to every dish.</li>
</ul>


          </br>

              <a href="about_us.php" class="arch-button">Learn More</a>
            </div>
          </div> 



      <div class="arch-line" >
         <div class="slider-body">
            <div class="last-main">
            <h3 class="gr">#Guest Review </h3>
              <div class="last-singer">
                
                <button id="prev-slide" class="slide-button symbol">&#10094;</button>
                <div class="img-list">
                 
                  <img src="../assets/images/index\IMG-20241113-WA0001.jpg" alt="img 1" class="last-img">
                  <img src="../assets/images/index\IMG-20241113-WA0010.jpg" alt="img 2" class="last-img">
                  <img src="../assets/images/index\IMG-20241113-WA0009.jpg" alt="img 3" class="last-img">
                  <img src="../assets/images/index\IMG-20241113-WA0008.jpg" alt="img 4" class="last-img">
                  <img src="../assets/images/index\IMG-20241113-WA0009.jpg" alt="img 5" class="last-img">


                  <img src="../assets/images/index\IMG-20241113-WA0007.jpg" alt="img 1" class="last-img">
                  <img src="../assets/images/index\IMG-20241113-WA0011.jpg" alt="img 2" class="last-img">
                  <img src="../assets/images/index\IMG-20241113-WA0004.jpg" alt="img 3" class="last-img">
                  <img src="../assets/images/index\outsidedinner.jpg" alt="img 4" class="last-img">



              </div>
                  <button id="next-slide" class="slide-button symbol">&#10095;</button>
              </div>
              <div class="last-bar">
                <div class="last-track">
                  <div class="last-thumb"></div>
                </div>
              </div>
            </div>
          </div>
      </div>    
        
</main>

<!-- Instagram Feed Integration Section -->
<section class="instagram-feed-section" style="padding: 80px 20px; background: #fdf5e6;">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">#DynastyExperience</h2>
    <p style="color: #666; margin-bottom: 10px;">Follow us on Instagram for daily inspiration</p>
    <a href="#" style="color: #bd8c5e; font-weight: 600; text-decoration: none; margin-bottom: 40px; display: inline-block;">@DynastyHotels <i class="fab fa-instagram"></i></a>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; margin-top: 30px;">
      <div style="position: relative; aspect-ratio: 1; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); border-radius: 10px; overflow: hidden; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
          <i class="fas fa-image"></i>
        </div>
        <div style="position: absolute; bottom: 10px; left: 10px; right: 10px; background: rgba(0,0,0,0.7); padding: 10px; border-radius: 5px; color: white; font-size: 12px;">
          <i class="fas fa-heart"></i> 1.2K <i class="fas fa-comment" style="margin-left: 10px;"></i> 89
        </div>
      </div>
      
      <div style="position: relative; aspect-ratio: 1; background: linear-gradient(135deg, #a07a4d 0%, #bd8c5e 100%); border-radius: 10px; overflow: hidden; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
          <i class="fas fa-image"></i>
        </div>
        <div style="position: absolute; bottom: 10px; left: 10px; right: 10px; background: rgba(0,0,0,0.7); padding: 10px; border-radius: 5px; color: white; font-size: 12px;">
          <i class="fas fa-heart"></i> 2.1K <i class="fas fa-comment" style="margin-left: 10px;"></i> 156
        </div>
      </div>
      
      <div style="position: relative; aspect-ratio: 1; background: linear-gradient(135deg, #d4af37 0%, #a07a4d 100%); border-radius: 10px; overflow: hidden; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
          <i class="fas fa-image"></i>
        </div>
        <div style="position: absolute; bottom: 10px; left: 10px; right: 10px; background: rgba(0,0,0,0.7); padding: 10px; border-radius: 5px; color: white; font-size: 12px;">
          <i class="fas fa-heart"></i> 3.4K <i class="fas fa-comment" style="margin-left: 10px;"></i> 203
        </div>
      </div>
      
      <div style="position: relative; aspect-ratio: 1; background: linear-gradient(135deg, #bd8c5e 0%, #a07a4d 100%); border-radius: 10px; overflow: hidden; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
          <i class="fas fa-image"></i>
        </div>
        <div style="position: absolute; bottom: 10px; left: 10px; right: 10px; background: rgba(0,0,0,0.7); padding: 10px; border-radius: 5px; color: white; font-size: 12px;">
          <i class="fas fa-heart"></i> 1.8K <i class="fas fa-comment" style="margin-left: 10px;"></i> 127
        </div>
      </div>
    </div>
    
    <button style="margin-top: 30px; background: linear-gradient(45deg, #833ab4 0%, #fd1d1d 50%, #fcb045 100%); color: white; padding: 15px 40px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: transform 0.3s;">
      <i class="fab fa-instagram"></i> Follow Us on Instagram
    </button>
  </div>
</section>

<!-- Loyalty & Rewards Program Section -->
<section class="loyalty-program-section" style="padding: 80px 20px; background: linear-gradient(135deg, #2c1810 0%, #4a2c1d 100%); color: white;">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <i class="fas fa-crown" style="font-size: 60px; color: #d4af37; margin-bottom: 20px;"></i>
    <h2 style="font-size: 42px; margin-bottom: 15px;">Dynasty Rewards Club</h2>
    <p style="font-size: 18px; color: #fdf5e6; margin-bottom: 50px;">Earn points, unlock exclusive benefits, and enjoy VIP treatment</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; margin-bottom: 40px;">
      <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px; border: 2px solid #d4af37;">
        <i class="fas fa-medal" style="font-size: 48px; color: #cd7f32; margin-bottom: 15px;"></i>
        <h3 style="color: #cd7f32; font-size: 24px; margin-bottom: 15px;">Bronze Tier</h3>
        <p style="color: #fdf5e6; margin-bottom: 20px;">Welcome benefits</p>
        <ul style="list-style: none; padding: 0; text-align: left; color: #fdf5e6;">
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>5% off all bookings</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Free WiFi upgrade</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Birthday surprise</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Early check-in</li>
        </ul>
      </div>
      
      <div style="background: rgba(255,255,255,0.15); padding: 30px; border-radius: 15px; border: 2px solid #c0c0c0; transform: scale(1.05);">
        <i class="fas fa-medal" style="font-size: 48px; color: #c0c0c0; margin-bottom: 15px;"></i>
        <h3 style="color: #c0c0c0; font-size: 24px; margin-bottom: 15px;">Silver Tier</h3>
        <p style="color: #fdf5e6; margin-bottom: 20px;">Enhanced rewards</p>
        <ul style="list-style: none; padding: 0; text-align: left; color: #fdf5e6;">
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>10% off all bookings</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Room upgrade (subject to availability)</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Late check-out until 2 PM</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Welcome amenities</li>
        </ul>
      </div>
      
      <div style="background: rgba(255,255,255,0.2); padding: 30px; border-radius: 15px; border: 2px solid #ffd700;">
        <i class="fas fa-medal" style="font-size: 48px; color: #ffd700; margin-bottom: 15px;"></i>
        <h3 style="color: #ffd700; font-size: 24px; margin-bottom: 15px;">Gold Tier</h3>
        <p style="color: #fdf5e6; margin-bottom: 20px;">VIP privileges</p>
        <ul style="list-style: none; padding: 0; text-align: left; color: #fdf5e6;">
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>15% off all bookings</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Guaranteed room upgrade</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Late check-out until 4 PM</li>
          <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #28a745; margin-right: 10px;"></i>Complimentary spa treatment</li>
        </ul>
      </div>
    </div>
    
    <div style="background: rgba(212, 175, 55, 0.2); padding: 30px; border-radius: 15px; border-left: 4px solid #d4af37; text-align: left; max-width: 600px; margin: 0 auto;">
      <h4 style="color: #d4af37; margin-bottom: 15px;"><i class="fas fa-gift"></i> How It Works</h4>
      <p style="color: #fdf5e6; line-height: 1.8;">Earn 10 points for every $1 spent on accommodations, dining, and spa services. Redeem points for free nights, room upgrades, dining vouchers, and exclusive experiences.</p>
    </div>
    
    <button style="margin-top: 30px; background: #d4af37; color: #2c1810; padding: 15px 40px; border: none; border-radius: 8px; font-size: 18px; font-weight: 700; cursor: pointer; transition: transform 0.3s;">
      Join Now - It's Free!
    </button>
  </div>
</section>

<!-- Guest Testimonials Section -->
<section class="testimonials-section" style="padding: 80px 20px; background: #fdf5e6;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <h2 style="text-align: center; font-size: 42px; color: #333; margin-bottom: 15px;">What Our Guests Say</h2>
    <p style="text-align: center; color: #666; margin-bottom: 50px;">Discover why travelers choose Dynasty Hotels</p>
    
    <div class="testimonials-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px;">
      <div class="testimonial-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(189, 140, 94, 0.15); border-top: 4px solid #bd8c5e;">
        <div style="color: #d4af37; margin-bottom: 15px; font-size: 20px;">★★★★★</div>
        <p style="color: #555; line-height: 1.8; margin-bottom: 20px; font-style: italic;">"Absolutely spectacular! The attention to detail and exceptional service made our anniversary unforgettable. The Presidential Suite exceeded all expectations."</p>
        <div style="display: flex; align-items: center; gap: 15px;">
          <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">SM</div>
          <div>
            <div style="font-weight: bold; color: #333;">Sarah Martinez</div>
            <div style="font-size: 13px; color: #666;">Paris, France • November 2025</div>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(189, 140, 94, 0.15); border-top: 4px solid #bd8c5e;">
        <div style="color: #d4af37; margin-bottom: 15px; font-size: 20px;">★★★★★</div>
        <p style="color: #555; line-height: 1.8; margin-bottom: 20px; font-style: italic;">"From the rooftop dining to the spa experiences, every moment was magical. The staff's warmth and professionalism are unmatched. We'll definitely return!"</p>
        <div style="display: flex; align-items: center; gap: 15px;">
          <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">RK</div>
          <div>
            <div style="font-weight: bold; color: #333;">Rajesh Kumar</div>
            <div style="font-size: 13px; color: #666;">Mumbai, India • October 2025</div>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(189, 140, 94, 0.15); border-top: 4px solid #bd8c5e;">
        <div style="color: #d4af37; margin-bottom: 15px; font-size: 20px;">★★★★★</div>
        <p style="color: #555; line-height: 1.8; margin-bottom: 20px; font-style: italic;">"Perfect blend of traditional elegance and modern luxury. The culinary experience was extraordinary, and the concierge helped plan an amazing city tour."</p>
        <div style="display: flex; align-items: center; gap: 15px;">
          <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">EC</div>
          <div>
            <div style="font-weight: bold; color: #333;">Emma Chen</div>
            <div style="font-size: 13px; color: #666;">Singapore • December 2025</div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="platform-ratings" style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
      <div style="text-align: center;">
        <div style="font-size: 32px; font-weight: bold; color: #bd8c5e;">4.9/5</div>
        <div style="color: #666; font-size: 14px;">TripAdvisor</div>
      </div>
      <div style="text-align: center;">
        <div style="font-size: 32px; font-weight: bold; color: #bd8c5e;">4.8/5</div>
        <div style="color: #666; font-size: 14px;">Google Reviews</div>
      </div>
      <div style="text-align: center;">
        <div style="font-size: 32px; font-weight: bold; color: #bd8c5e;">9.2/10</div>
        <div style="color: #666; font-size: 14px;">Booking.com</div>
      </div>
    </div>
  </div>
</section>

<!-- Interactive Statistics Counter Section -->
<section class="statistics-section" style="background: linear-gradient(135deg, #bd8c5e 0%, #a07a4d 100%); padding: 80px 20px; color: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; text-align: center;">
      <div class="stat-item">
        <i class="fas fa-hotel" style="font-size: 48px; margin-bottom: 15px; color: #fdf5e6;"></i>
        <div class="counter" data-target="500" style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">0</div>
        <div style="font-size: 18px; color: #fdf5e6;">Luxury Rooms</div>
      </div>
      <div class="stat-item">
        <i class="fas fa-award" style="font-size: 48px; margin-bottom: 15px; color: #fdf5e6;"></i>
        <div class="counter" data-target="50" style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">0</div>
        <div style="font-size: 18px; color: #fdf5e6;">Years of Excellence</div>
      </div>
      <div class="stat-item">
        <i class="fas fa-users" style="font-size: 48px; margin-bottom: 15px; color: #fdf5e6;"></i>
        <div class="counter" data-target="15000" style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">0</div>
        <div style="font-size: 18px; color: #fdf5e6;">Happy Guests Annually</div>
      </div>
      <div class="stat-item">
        <i class="fas fa-concierge-bell" style="font-size: 48px; margin-bottom: 15px; color: #fdf5e6;"></i>
        <div style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">24/7</div>
        <div style="font-size: 18px; color: #fdf5e6;">Concierge Service</div>
      </div>
    </div>
  </div>
</section>

<!-- Sustainability & Green Initiatives Section -->
<section class="sustainability-section" style="padding: 80px 20px; background: #f0f8f0;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 50px;">
      <i class="fas fa-leaf" style="font-size: 60px; color: #28a745; margin-bottom: 20px;"></i>
      <h2 style="font-size: 42px; color: #333;">Our Commitment to Sustainability</h2>
      <p style="color: #666; font-size: 18px;">Luxury with responsibility</p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
      <div style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border-top: 4px solid #28a745;">
        <i class="fas fa-solar-panel" style="font-size: 48px; color: #28a745; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Solar Energy</h3>
        <p style="color: #666; line-height: 1.6;">70% of our energy comes from renewable solar sources</p>
      </div>
      
      <div style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border-top: 4px solid #28a745;">
        <i class="fas fa-recycle" style="font-size: 48px; color: #28a745; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Zero Waste Goal</h3>
        <p style="color: #666; line-height: 1.6;">Comprehensive recycling and composting programs</p>
      </div>
      
      <div style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border-top: 4px solid #28a745;">
        <i class="fas fa-water" style="font-size: 48px; color: #28a745; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Water Conservation</h3>
        <p style="color: #666; line-height: 1.6;">Smart irrigation and low-flow fixtures save 40% water</p>
      </div>
      
      <div style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border-top: 4px solid #28a745;">
        <i class="fas fa-carrot" style="font-size: 48px; color: #28a745; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Local Sourcing</h3>
        <p style="color: #666; line-height: 1.6;">80% of ingredients from local organic farms</p>
      </div>
    </div>
    
    <div style="margin-top: 40px; background: white; padding: 30px; border-radius: 15px; border-left: 4px solid #28a745;">
      <h4 style="color: #28a745; margin-bottom: 15px;"><i class="fas fa-certificate"></i> Certifications & Recognition</h4>
      <p style="color: #666; line-height: 1.8;">LEED Gold Certified • Green Key Global • EarthCheck Silver • ISO 14001 Environmental Management</p>
    </div>
  </div>
</section>

<!-- Event Spaces & Meeting Rooms Section -->
<section class="event-spaces-section" style="padding: 80px 20px; background: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <h2 style="text-align: center; font-size: 42px; color: #333; margin-bottom: 15px;">Event & Conference Spaces</h2>
    <p style="text-align: center; color: #666; margin-bottom: 50px;">State-of-the-art venues for every occasion</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
      <div style="background: #fdf5e6; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <div style="height: 200px; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
          <i class="fas fa-building"></i>
        </div>
        <div style="padding: 30px;">
          <h3 style="color: #bd8c5e; margin-bottom: 15px;">Grand Ballroom</h3>
          <p style="color: #666; margin-bottom: 15px;">Perfect for weddings, galas, and large conferences</p>
          <ul style="list-style: none; padding: 0; color: #555;">
            <li style="margin-bottom: 8px;"><i class="fas fa-users" style="color: #bd8c5e; margin-right: 10px;"></i>Capacity: 500 guests</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-ruler-combined" style="color: #bd8c5e; margin-right: 10px;"></i>Size: 5,000 sq ft</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-lightbulb" style="color: #bd8c5e; margin-right: 10px;"></i>Customizable lighting</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-volume-up" style="color: #bd8c5e; margin-right: 10px;"></i>Premium sound system</li>
          </ul>
          <button style="margin-top: 20px; background: #bd8c5e; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; width: 100%;">Request Quote</button>
        </div>
      </div>
      
      <div style="background: #fdf5e6; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <div style="height: 200px; background: linear-gradient(135deg, #a07a4d 0%, #bd8c5e 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
          <i class="fas fa-handshake"></i>
        </div>
        <div style="padding: 30px;">
          <h3 style="color: #bd8c5e; margin-bottom: 15px;">Executive Boardroom</h3>
          <p style="color: #666; margin-bottom: 15px;">Intimate setting for business meetings</p>
          <ul style="list-style: none; padding: 0; color: #555;">
            <li style="margin-bottom: 8px;"><i class="fas fa-users" style="color: #bd8c5e; margin-right: 10px;"></i>Capacity: 20 guests</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-ruler-combined" style="color: #bd8c5e; margin-right: 10px;"></i>Size: 800 sq ft</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-tv" style="color: #bd8c5e; margin-right: 10px;"></i>85" 4K Display</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-wifi" style="color: #bd8c5e; margin-right: 10px;"></i>High-speed WiFi</li>
          </ul>
          <button style="margin-top: 20px; background: #bd8c5e; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; width: 100%;">Request Quote</button>
        </div>
      </div>
      
      <div style="background: #fdf5e6; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <div style="height: 200px; background: linear-gradient(135deg, #d4af37 0%, #a07a4d 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
          <i class="fas fa-star"></i>
        </div>
        <div style="padding: 30px;">
          <h3 style="color: #bd8c5e; margin-bottom: 15px;">Rooftop Terrace</h3>
          <p style="color: #666; margin-bottom: 15px;">Open-air venue with stunning city views</p>
          <ul style="list-style: none; padding: 0; color: #555;">
            <li style="margin-bottom: 8px;"><i class="fas fa-users" style="color: #bd8c5e; margin-right: 10px;"></i>Capacity: 150 guests</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-ruler-combined" style="color: #bd8c5e; margin-right: 10px;"></i>Size: 2,500 sq ft</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-umbrella" style="color: #bd8c5e; margin-right: 10px;"></i>Weather-protected</li>
            <li style="margin-bottom: 8px;"><i class="fas fa-utensils" style="color: #bd8c5e; margin-right: 10px;"></i>Full catering available</li>
          </ul>
          <button style="margin-top: 20px; background: #bd8c5e; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; width: 100%;">Request Quote</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Local Attractions Guide Section -->
<section class="attractions-guide-section" style="padding: 80px 20px; background: #fdf5e6;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <h2 style="text-align: center; font-size: 42px; color: #333; margin-bottom: 15px;">Explore the Neighborhood</h2>
    <p style="text-align: center; color: #666; margin-bottom: 50px;">Discover the best attractions near Dynasty Hotels</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
      <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <i class="fas fa-landmark" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 10px;">National Museum</h3>
        <p style="color: #666; margin-bottom: 10px; font-size: 14px;">World-class art and history exhibits</p>
        <p style="color: #bd8c5e; font-weight: 600;">📍 0.5 km • 5 min walk</p>
      </div>
      
      <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <i class="fas fa-shopping-bag" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 10px;">Grand Plaza</h3>
        <p style="color: #666; margin-bottom: 10px; font-size: 14px;">Luxury shopping and dining</p>
        <p style="color: #bd8c5e; font-weight: 600;">📍 1.2 km • 10 min drive</p>
      </div>
      
      <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <i class="fas fa-tree" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 10px;">Central Park</h3>
        <p style="color: #666; margin-bottom: 10px; font-size: 14px;">Beautiful gardens and walking trails</p>
        <p style="color: #bd8c5e; font-weight: 600;">📍 0.8 km • 8 min walk</p>
      </div>
      
      <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <i class="fas fa-theater-masks" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 10px;">City Theatre</h3>
        <p style="color: #666; margin-bottom: 10px; font-size: 14px;">Live performances and shows</p>
        <p style="color: #bd8c5e; font-weight: 600;">📍 1.5 km • 12 min drive</p>
      </div>
    </div>
    
    <div style="text-align: center; margin-top: 40px;">
      <button style="background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); color: white; padding: 15px 40px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer;">
        <i class="fas fa-map"></i> View Interactive Map
      </button>
    </div>
  </div>
</section>

<!-- Dining Experiences Detailed Section -->
<section class="dining-detailed-section" style="padding: 80px 20px; background: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <h2 style="text-align: center; font-size: 42px; color: #333; margin-bottom: 15px;">Culinary Excellence</h2>
    <p style="text-align: center; color: #666; margin-bottom: 50px;">Award-winning restaurants and bars</p>
    
    <div style="display: flex; flex-direction: column; gap: 40px;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; align-items: center;">
        <div style="height: 350px; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 72px;">
          <i class="fas fa-utensils"></i>
        </div>
        <div>
          <h3 style="font-size: 32px; color: #bd8c5e; margin-bottom: 15px;">The Golden Fork</h3>
          <p style="color: #666; line-height: 1.8; margin-bottom: 15px;">Michelin-starred fine dining featuring contemporary fusion cuisine. Chef Marcus brings 20 years of culinary expertise.</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Cuisine:</strong> International Fusion</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Hours:</strong> 6:00 PM - 11:00 PM</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Dress Code:</strong> Smart Casual</p>
          <p style="color: #555; margin-bottom: 20px;"><strong>Price Range:</strong> $$$ - $$$$</p>
          <button style="background: #bd8c5e; color: white; padding: 12px 30px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
            <i class="fas fa-calendar"></i> Reserve Table
          </button>
        </div>
      </div>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; align-items: center;">
        <div>
          <h3 style="font-size: 32px; color: #bd8c5e; margin-bottom: 15px;">Rooftop Sky Bar</h3>
          <p style="color: #666; line-height: 1.8; margin-bottom: 15px;">Panoramic city views with craft cocktails and live music. Perfect for sunset drinks and socializing.</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Speciality:</strong> Signature Cocktails</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Hours:</strong> 5:00 PM - 2:00 AM</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Entertainment:</strong> Live DJ (Fri-Sat)</p>
          <p style="color: #555; margin-bottom: 20px;"><strong>Price Range:</strong> $$ - $$$</p>
          <button style="background: #bd8c5e; color: white; padding: 12px 30px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
            <i class="fas fa-cocktail"></i> View Menu
          </button>
        </div>
        <div style="height: 350px; background: linear-gradient(135deg, #a07a4d 0%, #bd8c5e 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 72px;">
          <i class="fas fa-cocktail"></i>
        </div>
      </div>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; align-items: center;">
        <div style="height: 350px; background: linear-gradient(135deg, #d4af37 0%, #a07a4d 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 72px;">
          <i class="fas fa-coffee"></i>
        </div>
        <div>
          <h3 style="font-size: 32px; color: #bd8c5e; margin-bottom: 15px;">Dynasty Café</h3>
          <p style="color: #666; line-height: 1.8; margin-bottom: 15px;">All-day casual dining with fresh pastries, artisanal coffee, and light meals. Perfect for breakfast or afternoon tea.</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Cuisine:</strong> Café & Bakery</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Hours:</strong> 6:00 AM - 10:00 PM</p>
          <p style="color: #555; margin-bottom: 10px;"><strong>Specialties:</strong> Fresh Pastries, Coffee</p>
          <p style="color: #555; margin-bottom: 20px;"><strong>Price Range:</strong> $ - $$</p>
          <button style="background: #bd8c5e; color: white; padding: 12px 30px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
            <i class="fas fa-book"></i> See Menu
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Spa & Wellness Detailed Section -->
<section class="spa-wellness-section" style="padding: 80px 20px; background: #f5f9fa;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 50px;">
      <i class="fas fa-spa" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
      <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">Spa & Wellness Center</h2>
      <p style="color: #666; font-size: 18px;">Rejuvenate your body, mind, and spirit</p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px;">
      <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-hands" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Massage Therapies</h3>
        <ul style="list-style: none; padding: 0; color: #666;">
          <li style="margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
            <strong>Swedish Massage</strong><br>
            <span style="font-size: 14px;">60 min - $120 | 90 min - $180</span>
          </li>
          <li style="margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
            <strong>Deep Tissue</strong><br>
            <span style="font-size: 14px;">60 min - $140 | 90 min - $210</span>
          </li>
          <li style="margin-bottom: 10px;">
            <strong>Hot Stone Therapy</strong><br>
            <span style="font-size: 14px;">90 min - $220</span>
          </li>
        </ul>
      </div>
      
      <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-leaf" style="font-size: 48px; color: #28a745; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Facial Treatments</h3>
        <ul style="list-style: none; padding: 0; color: #666;">
          <li style="margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
            <strong>Hydrating Facial</strong><br>
            <span style="font-size: 14px;">60 min - $150</span>
          </li>
          <li style="margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
            <strong>Anti-Aging Treatment</strong><br>
            <span style="font-size: 14px;">75 min - $200</span>
          </li>
          <li style="margin-bottom: 10px;">
            <strong>Gold Radiance Facial</strong><br>
            <span style="font-size: 14px;">90 min - $280</span>
          </li>
        </ul>
      </div>
      
      <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-heart" style="font-size: 48px; color: #dc3545; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Wellness Packages</h3>
        <ul style="list-style: none; padding: 0; color: #666;">
          <li style="margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
            <strong>Half Day Retreat</strong><br>
            <span style="font-size: 14px;">4 hours - $350</span>
          </li>
          <li style="margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
            <strong>Full Day Escape</strong><br>
            <span style="font-size: 14px;">8 hours - $650</span>
          </li>
          <li style="margin-bottom: 10px;">
            <strong>Couples Romance</strong><br>
            <span style="font-size: 14px;">3 hours - $550</span>
          </li>
        </ul>
      </div>
    </div>
    
    <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
      <h3 style="color: #bd8c5e; margin-bottom: 20px; text-align: center;">Spa Facilities</h3>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 25px; text-align: center;">
        <div>
          <i class="fas fa-hot-tub" style="font-size: 36px; color: #bd8c5e; margin-bottom: 10px;"></i>
          <p style="color: #333; font-weight: 600;">Jacuzzi</p>
        </div>
        <div>
          <i class="fas fa-water" style="font-size: 36px; color: #bd8c5e; margin-bottom: 10px;"></i>
          <p style="color: #333; font-weight: 600;">Sauna</p>
        </div>
        <div>
          <i class="fas fa-snowflake" style="font-size: 36px; color: #bd8c5e; margin-bottom: 10px;"></i>
          <p style="color: #333; font-weight: 600;">Steam Room</p>
        </div>
        <div>
          <i class="fas fa-dumbbell" style="font-size: 36px; color: #bd8c5e; margin-bottom: 10px;"></i>
          <p style="color: #333; font-weight: 600;">Fitness Center</p>
        </div>
        <div>
          <i class="fas fa-swimmer" style="font-size: 36px; color: #bd8c5e; margin-bottom: 10px;"></i>
          <p style="color: #333; font-weight: 600;">Indoor Pool</p>
        </div>
        <div>
          <i class="fas fa-sun" style="font-size: 36px; color: #bd8c5e; margin-bottom: 10px;"></i>
          <p style="color: #333; font-weight: 600;">Relaxation Lounge</p>
        </div>
      </div>
    </div>
    
    <div style="text-align: center; margin-top: 40px;">
      <button style="background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); color: white; padding: 15px 40px; border: none; border-radius: 8px; font-size: 18px; font-weight: 600; cursor: pointer;">
        <i class="fas fa-calendar-check"></i> Book Spa Appointment
      </button>
      <p style="margin-top: 15px; color: #666; font-size: 14px;">Open daily: 8:00 AM - 10:00 PM</p>
    </div>
  </div>
</section>

<!-- Weather Widget & Local Info Section -->
<section class="weather-widget-section" style="padding: 80px 20px; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
      <div>
        <h2 style="font-size: 42px; margin-bottom: 20px;">Plan Your Visit</h2>
        <p style="font-size: 18px; margin-bottom: 30px; opacity: 0.9;">Check current weather conditions before you arrive</p>
        
        <div style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px;">
          <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
            <i class="fas fa-sun" style="font-size: 60px;"></i>
            <div>
              <div style="font-size: 48px; font-weight: bold;">72°F</div>
              <div style="font-size: 18px; opacity: 0.9;">Partly Cloudy</div>
            </div>
          </div>
          
          <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 20px;">
            <div>
              <i class="fas fa-tint"></i> Humidity: 65%
            </div>
            <div>
              <i class="fas fa-wind"></i> Wind: 8 mph
            </div>
            <div>
              <i class="fas fa-eye"></i> Visibility: 10 mi
            </div>
            <div>
              <i class="fas fa-temperature-high"></i> Feels like: 74°F
            </div>
          </div>
        </div>
      </div>
      
      <div>
        <h3 style="font-size: 32px; margin-bottom: 25px;">7-Day Forecast</h3>
        <div style="display: flex; flex-direction: column; gap: 15px;">
          <div style="background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 600;">Monday</span>
            <div style="display: flex; align-items: center; gap: 15px;">
              <i class="fas fa-cloud-sun" style="font-size: 24px;"></i>
              <span>75° / 62°</span>
            </div>
          </div>
          <div style="background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 600;">Tuesday</span>
            <div style="display: flex; align-items: center; gap: 15px;">
              <i class="fas fa-sun" style="font-size: 24px;"></i>
              <span>78° / 64°</span>
            </div>
          </div>
          <div style="background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 600;">Wednesday</span>
            <div style="display: flex; align-items: center; gap: 15px;">
              <i class="fas fa-cloud-rain" style="font-size: 24px;"></i>
              <span>70° / 58°</span>
            </div>
          </div>
          <div style="background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 600;">Thursday</span>
            <div style="display: flex; align-items: center; gap: 15px;">
              <i class="fas fa-cloud" style="font-size: 24px;"></i>
              <span>73° / 60°</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mobile App Promotion Section -->
<section class="mobile-app-section" style="padding: 80px 20px; background: #2c1810; color: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
      <div>
        <i class="fas fa-mobile-alt" style="font-size: 80px; color: #d4af37; margin-bottom: 20px;"></i>
        <h2 style="font-size: 42px; margin-bottom: 20px;">Download Our App</h2>
        <p style="font-size: 18px; margin-bottom: 30px; color: #fdf5e6; line-height: 1.8;">
          Experience Dynasty Hotels at your fingertips. Book rooms, order room service, access digital keys, and earn rewards effortlessly.
        </p>
        
        <div style="margin-bottom: 30px;">
          <h4 style="color: #d4af37; margin-bottom: 15px;">App Features:</h4>
          <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>Mobile check-in & digital room keys</li>
            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>In-app room service ordering</li>
            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>Spa & dining reservations</li>
            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>Track Dynasty Rewards points</li>
            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>Exclusive app-only offers</li>
          </ul>
        </div>
        
        <div style="display: flex; gap: 15px;">
          <a href="#" style="display: inline-block;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store" style="height: 50px;">
          </a>
          <a href="#" style="display: inline-block;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" style="height: 50px;">
          </a>
        </div>
      </div>
      
      <div style="text-align: center;">
        <div style="background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); padding: 60px 40px; border-radius: 30px; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
          <i class="fas fa-mobile-screen-button" style="font-size: 180px; color: white;"></i>
          <div style="margin-top: 20px; font-size: 18px; color: white; opacity: 0.9;">
            Available on iOS & Android
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Transportation Services Section -->
<section class="transportation-section" style="padding: 80px 20px; background: #fdf5e6;">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">Transportation Services</h2>
    <p style="color: #666; margin-bottom: 50px;">Seamless travel from airport to hotel and beyond</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
      <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-car" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Airport Shuttle</h3>
        <p style="color: #666; margin-bottom: 20px;">Complimentary shuttle service every 30 minutes</p>
        <p style="color: #bd8c5e; font-weight: bold;">Free for Guests</p>
      </div>
      
      <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-car-side" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Luxury Sedan</h3>
        <p style="color: #666; margin-bottom: 20px;">Private car service with professional chauffeur</p>
        <p style="color: #bd8c5e; font-weight: bold;">From $75</p>
      </div>
      
      <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-van-shuttle" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Group Transportation</h3>
        <p style="color: #666; margin-bottom: 20px;">Spacious vans for families and groups</p>
        <p style="color: #bd8c5e; font-weight: bold;">From $120</p>
      </div>
      
      <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="fas fa-bicycle" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Bike Rental</h3>
        <p style="color: #666; margin-bottom: 20px;">Explore the city on two wheels</p>
        <p style="color: #bd8c5e; font-weight: bold;">From $15/day</p>
      </div>
    </div>
    
    <button style="margin-top: 40px; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); color: white; padding: 15px 40px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer;">
      <i class="fas fa-phone"></i> Book Transportation
    </button>
  </div>
</section>

<!-- Family Services & Kids Activities Section -->
<section class="family-services-section" style="padding: 80px 20px; background: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 50px;">
      <i class="fas fa-children" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
      <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">Family-Friendly Services</h2>
      <p style="color: #666; font-size: 18px;">Creating memorable experiences for the whole family</p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
      <div style="background: #fdf5e6; padding: 30px; border-radius: 15px; border-top: 4px solid #bd8c5e;">
        <i class="fas fa-child" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Kids' Club</h3>
        <p style="color: #666; line-height: 1.6;">Supervised activities for ages 5-12 including arts, crafts, games, and pool time. Professional childcare staff.</p>
        <p style="color: #bd8c5e; font-weight: 600; margin-top: 15px;">Daily 9 AM - 6 PM</p>
      </div>
      
      <div style="background: #fdf5e6; padding: 30px; border-radius: 15px; border-top: 4px solid #bd8c5e;">
        <i class="fas fa-baby" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Babysitting Services</h3>
        <p style="color: #666; line-height: 1.6;">Certified, background-checked babysitters available for in-room care. Advanced reservation required.</p>
        <p style="color: #bd8c5e; font-weight: 600; margin-top: 15px;">$25/hour (3-hour minimum)</p>
      </div>
      
      <div style="background: #fdf5e6; padding: 30px; border-radius: 15px; border-top: 4px solid #bd8c5e;">
        <i class="fas fa-utensils" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Kids' Menu</h3>
        <p style="color: #666; line-height: 1.6;">Specially designed children's menu with healthy, delicious options. High chairs and booster seats available.</p>
        <p style="color: #bd8c5e; font-weight: 600; margin-top: 15px;">All Restaurants</p>
      </div>
      
      <div style="background: #fdf5e6; padding: 30px; border-radius: 15px; border-top: 4px solid #bd8c5e;">
        <i class="fas fa-bed" style="font-size: 42px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h3 style="color: #333; margin-bottom: 15px;">Baby Amenities</h3>
        <p style="color: #666; line-height: 1.6;">Cribs, bottle warmers, baby monitors, and children's bathrobes. Complimentary for all families.</p>
        <p style="color: #bd8c5e; font-weight: 600; margin-top: 15px;">Request at Booking</p>
      </div>
    </div>
  </div>
</section>

<!-- Pet Policy Section -->
<section class="pet-policy-section" style="padding: 80px 20px; background: #f5f9fa;">
  <div style="max-width: 900px; margin: 0 auto; text-align: center;">
    <i class="fas fa-paw" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
    <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">Pet-Friendly Hotel</h2>
    <p style="color: #666; font-size: 18px; margin-bottom: 40px;">Your furry friends are welcome at Dynasty Hotels</p>
    
    <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: left;">
      <h3 style="color: #bd8c5e; margin-bottom: 20px;">Pet Policy Details</h3>
      <ul style="color: #666; line-height: 2;">
        <li><strong>Welcome:</strong> Dogs and cats up to 25 lbs</li>
        <li><strong>Fee:</strong> $50 per night, per pet (maximum $150 per stay)</li>
        <li><strong>Maximum:</strong> 2 pets per room</li>
        <li><strong>Amenities:</strong> Pet beds, bowls, treats, and waste bags provided</li>
        <li><strong>Service Animals:</strong> Always welcome at no charge</li>
        <li><strong>Walking Area:</strong> Designated pet relief area on property</li>
        <li><strong>Requirements:</strong> Current vaccinations and must be well-behaved</li>
      </ul>
      
      <div style="background: #fdf5e6; padding: 20px; border-radius: 10px; margin-top: 25px; border-left: 4px solid #bd8c5e;">
        <strong style="color: #bd8c5e;">Important:</strong> Pets must not be left unattended in rooms. Professional pet-sitting services can be arranged through concierge.
      </div>
    </div>
  </div>
</section>

<!-- Safety & Security Information Section -->
<section class="safety-section" style="padding: 80px 20px; background: white;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 50px;">
      <i class="fas fa-shield-alt" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
      <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">Your Safety is Our Priority</h2>
      <p style="color: #666; font-size: 18px;">Comprehensive safety measures for your peace of mind</p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
      <div style="text-align: center;">
        <i class="fas fa-video" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h4 style="color: #333; margin-bottom: 10px;">24/7 Security</h4>
        <p style="color: #666;">Round-the-clock security staff and surveillance systems</p>
      </div>
      
      <div style="text-align: center;">
        <i class="fas fa-fire-extinguisher" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h4 style="color: #333; margin-bottom: 10px;">Fire Safety</h4>
        <p style="color: #666;">Sprinkler systems, smoke detectors, and emergency exits</p>
      </div>
      
      <div style="text-align: center;">
        <i class="fas fa-first-aid" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h4 style="color: #333; margin-bottom: 10px;">Medical Services</h4>
        <p style="color: #666;">On-call physician and first aid trained staff</p>
      </div>
      
      <div style="text-align: center;">
        <i class="fas fa-key" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
        <h4 style="color: #333; margin-bottom: 10px;">Secure Access</h4>
        <p style="color: #666;">Electronic key cards and restricted floor access</p>
      </div>
    </div>
    
    <div style="background: #fdf5e6; padding: 30px; border-radius: 15px; margin-top: 40px; text-align: center;">
      <h4 style="color: #bd8c5e; margin-bottom: 15px;">COVID-19 Safety Protocols</h4>
      <p style="color: #666; line-height: 1.8;">
        Enhanced cleaning procedures • Contactless check-in • Social distancing measures • 
        Hand sanitizing stations • Air filtration systems • Staff health screening
      </p>
    </div>
  </div>
</section>

<!-- Accessibility Information Section -->
<section class="accessibility-section" style="padding: 80px 20px; background: #fdf5e6;">
  <div style="max-width: 900px; margin: 0 auto; text-align: center;">
    <i class="fas fa-universal-access" style="font-size: 60px; color: #bd8c5e; margin-bottom: 20px;"></i>
    <h2 style="font-size: 42px; color: #333; margin-bottom: 15px;">Accessibility</h2>
    <p style="color: #666; font-size: 18px; margin-bottom: 40px;">We're committed to ensuring all guests have a comfortable stay</p>
    
    <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: left;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div>
          <h4 style="color: #bd8c5e; margin-bottom: 15px;">Accessible Features</h4>
          <ul style="color: #666; line-height: 2;">
            <li>ADA-compliant guest rooms</li>
            <li>Wheelchair accessible entrances</li>
            <li>Roll-in showers and grab bars</li>
            <li>Lowered counters and sinks</li>
            <li>Visual fire alarms and doorbells</li>
          </ul>
        </div>
        
        <div>
          <h4 style="color: #bd8c5e; margin-bottom: 15px;">Additional Services</h4>
          <ul style="color: #666; line-height: 2;">
            <li>Service animals welcome</li>
            <li>Accessible parking spaces</li>
            <li>Elevators to all floors</li>
            <li>TTY/TDD telephones available</li>
            <li>Braille and large-print materials</li>
          </ul>
        </div>
      </div>
      
      <div style="background: #f0f9ff; padding: 20px; border-radius: 10px; margin-top: 25px; text-align: center;">
        <p style="color: #555;"><strong>Need Specific Accommodations?</strong><br>
        Please contact us at least 48 hours before arrival to ensure proper arrangements.<br>
        <a href="tel:+15551234567" style="color: #bd8c5e;">+1 (555) 123-4567</a> | 
        <a href="mailto:accessibility@dynastyhotels.com" style="color: #bd8c5e;">accessibility@dynastyhotels.com</a></p>
      </div>
    </div>
  </div>
</section>

<!-- Enhanced Newsletter Signup Section -->
<section class="newsletter-enhanced" style="padding: 80px 20px; background: #fdf5e6;">
  <div style="max-width: 800px; margin: 0 auto; text-align: center;">
    <i class="fas fa-envelope-open" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
    <h2 style="font-size: 38px; color: #333; margin-bottom: 15px;">Stay Informed</h2>
    <p style="font-size: 18px; color: #666; margin-bottom: 30px;">Exclusive Offers & Updates Delivered to Your Inbox</p>
    
    <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border: 2px solid #bd8c5e;">
      <p style="color: #555; margin-bottom: 25px; line-height: 1.6;">Subscribe for exclusive rates, early booking access, insider travel tips, and special seasonal offers.</p>
      
      <form onsubmit="subscribeEnhanced(event)" style="max-width: 500px; margin: 0 auto;">
        <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px;">
          <input type="email" placeholder="Your Email Address" required style="padding: 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; outline: none; transition: border 0.3s;" onfocus="this.style.borderColor='#bd8c5e'">
          <input type="text" placeholder="First Name (Optional)" style="padding: 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; outline: none; transition: border 0.3s;" onfocus="this.style.borderColor='#bd8c5e'">
        </div>
        
        <div style="text-align: left; margin-bottom: 20px; font-size: 14px; color: #666;">
          <div style="margin-bottom: 8px;"><strong>Send me updates about:</strong></div>
          <label style="display: block; margin-bottom: 8px; cursor: pointer;">
            <input type="checkbox" checked style="margin-right: 8px;"> Special Offers & Promotions
          </label>
          <label style="display: block; margin-bottom: 8px; cursor: pointer;">
            <input type="checkbox" checked style="margin-right: 8px;"> Events & Experiences
          </label>
          <label style="display: block; margin-bottom: 8px; cursor: pointer;">
            <input type="checkbox" style="margin-right: 8px;"> Wellness & Spa Tips
          </label>
          <label style="display: block; cursor: pointer;">
            <input type="checkbox" style="margin-right: 8px;"> Culinary News & Recipes
          </label>
        </div>
        
        <button type="submit" style="width: 100%; background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%); color: white; padding: 15px; border: none; border-radius: 8px; font-size: 18px; font-weight: 600; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
          Subscribe Now
        </button>
      </form>
      
      <div style="margin-top: 25px;">
        <div style="background: #f0f9ff; padding: 15px; border-radius: 8px; border-left: 4px solid #bd8c5e; margin-bottom: 15px;">
          <strong style="color: #bd8c5e;">🎁 Welcome Gift:</strong>
          <span style="color: #555;"> Get 10% off your next stay when you subscribe!</span>
        </div>
        <p style="font-size: 12px; color: #999;">We respect your privacy. Unsubscribe anytime with one click.</p>
      </div>
    </div>
    
    <div style="margin-top: 30px;">
      <p style="color: #666; margin-bottom: 15px;">Follow us on social media:</p>
      <div style="display: flex; justify-content: center; gap: 20px;">
        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: #bd8c5e; color: white; border-radius: 50%; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: #bd8c5e; color: white; border-radius: 50%; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: #bd8c5e; color: white; border-radius: 50%; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: #bd8c5e; color: white; border-radius: 50%; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <i class="fab fa-pinterest"></i>
        </a>
        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: #bd8c5e; color: white; border-radius: 50%; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Old footer removed - using new footer from includes/footer.php -->
            <script src="../assets/js/index.js" defer></script>
            <script>
            // Special Offers Banner Countdown
            function startCountdown() {
              const endDate = new Date('December 31, 2025 23:59:59').getTime();
              
              const timer = setInterval(function() {
                const now = new Date().getTime();
                const distance = endDate - now;
                
                if (distance < 0) {
                  clearInterval(timer);
                  document.getElementById('offerBanner').style.display = 'none';
                  return;
                }
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
              }, 1000);
            }
            
            function closeBanner() {
              document.getElementById('offerBanner').classList.add('hidden');
              localStorage.setItem('bannerClosed', 'true');
            }
            
            // Check if banner was previously closed
            if (localStorage.getItem('bannerClosed') !== 'true') {
              startCountdown();
            } else {
              document.getElementById('offerBanner').classList.add('hidden');
            }
            
            // Chatbot Functionality
            function toggleChat() {
              const chatWindow = document.getElementById('chatWindow');
              chatWindow.classList.toggle('active');
            }
            
            function quickAction(action) {
              const responses = {
                availability: 'I can help you check room availability. What dates are you interested in?',
                rooms: 'We have several room types available. Would you like to see our Deluxe Rooms, Suites, or Presidential Suite?',
                dining: 'Our restaurants offer fine dining experiences. When would you like to make a reservation?',
                spa: 'Our spa offers various treatments. Are you interested in massages, facials, or wellness packages?',
                attractions: 'The local area has many attractions including museums, parks, and shopping. What interests you?',
                contact: 'You can reach us at +91 8238650390 or email info@dynastyhotels.com. How can we assist you?'
              };
              
              const chatBody = document.querySelector('.chat-body');
              const newMessage = document.createElement('div');
              newMessage.className = 'chat-message';
              newMessage.textContent = responses[action];
              chatBody.appendChild(newMessage);
              chatBody.scrollTop = chatBody.scrollHeight;
            }
            
            function sendMessage() {
              const input = document.getElementById('chatInput');
              if (input.value.trim() !== '') {
                const chatBody = document.querySelector('.chat-body');
                const newMessage = document.createElement('div');
                newMessage.className = 'chat-message';
                newMessage.style.background = '#e8f4f8';
                newMessage.textContent = 'Thank you for your message. A concierge will respond shortly!';
                chatBody.appendChild(newMessage);
                chatBody.scrollTop = chatBody.scrollHeight;
                input.value = '';
              }
            }
            
            // Statistics Counter Animation
            const counters = document.querySelectorAll('.counter');
            let started = false;
            
            function startCounting() {
              counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;
                
                const updateCounter = () => {
                  current += increment;
                  if (current < target) {
                    counter.textContent = Math.floor(current) + '+';
                    requestAnimationFrame(updateCounter);
                  } else {
                    counter.textContent = target + '+';
                  }
                };
                
                updateCounter();
              });
            }
            
            // Trigger counter when section is visible
            window.addEventListener('scroll', () => {
              if (!started) {
                const statsSection = document.querySelector('.statistics-section');
                const rect = statsSection.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                  started = true;
                  startCounting();
                }
              }
            });
            
            // Enhanced Newsletter Subscription
            function subscribeEnhanced(e) {
              e.preventDefault();
              alert('🎉 Thank you for subscribing! Check your email for your 10% discount code.');
              e.target.reset();
            }
            
            // Chat input enter key
            document.getElementById('chatInput')?.addEventListener('keypress', function(e) {
              if (e.key === 'Enter') {
                sendMessage();
              }
            });
            
            // Virtual Tour Functions
            function openVirtualTour(location) {
              alert('🎥 Virtual 360° Tour\n\nOpening immersive ' + location + ' tour...\n\nNote: This demo shows the functionality. In production, this would launch a full 360° viewer with interactive hotspots.');
            }
            
            // Availability Check Function
            function checkAvailability() {
              const checkin = document.getElementById('checkin-date').value;
              const checkout = document.getElementById('checkout-date').value;
              
              if (!checkin || !checkout) {
                alert('Please select check-in and check-out dates');
                return;
              }
              
              // Simulate availability check
              document.getElementById('availability-results').style.display = 'block';
              
              setTimeout(() => {
                alert('✅ Great news! Multiple rooms are available for your dates.\n\nWould you like to proceed with booking?');
              }, 500);
            }
            
            // Set minimum dates for availability calendar
            window.addEventListener('load', function() {
              const today = new Date().toISOString().split('T')[0];
              const checkinInput = document.getElementById('checkin-date');
              const checkoutInput = document.getElementById('checkout-date');
              
              if (checkinInput) {
                checkinInput.min = today;
                checkinInput.addEventListener('change', function() {
                  const nextDay = new Date(this.value);
                  nextDay.setDate(nextDay.getDate() + 1);
                  checkoutInput.min = nextDay.toISOString().split('T')[0];
                });
              }
            });
            
            
            // ========== DESIGN ENHANCEMENT FUNCTIONS ==========
            
            // Sticky Header Shrink on Scroll
            let lastScroll = 0;
            window.addEventListener('scroll', function() {
              const header = document.querySelector('header');
              const scrollProgress = document.getElementById('scrollProgress');
              const backToTop = document.getElementById('backToTop');
              const currentScroll = window.pageYOffset;
              
              // Sticky header effect
              if (currentScroll > 100) {
                header.classList.add('scrolled');
              } else {
                header.classList.remove('scrolled');
              }
              
              // Scroll progress bar
              const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
              const scrollPercent = (currentScroll / docHeight) * 100;
              scrollProgress.style.width = scrollPercent + '%';
              
              // Back to top button
              if (currentScroll > 300) {
                backToTop.classList.add('visible');
              } else {
                backToTop.classList.remove('visible');
              }
              
              lastScroll = currentScroll;
            });
            
            // Scroll to Top Function
            function scrollToTop() {
              window.scrollTo({
                top: 0,
                behavior: 'smooth'
              });
            }
            
            // Scroll Reveal Animation
            function reveal() {
              const reveals = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right');
              
              for (let i = 0; i < reveals.length; i++) {
                const windowHeight = window.innerHeight;
                const elementTop = reveals[i].getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < windowHeight - elementVisible) {
                  reveals[i].classList.add('revealed');
                }
              }
            }
            
            window.addEventListener('scroll', reveal);
            window.addEventListener('load', reveal);
            
            // Social Proof Notifications
            const socialProofMessages = [
              { name: 'Sarah from USA', action: 'just booked a room', time: '2 minutes ago' },
              { name: 'John from UK', action: 'just reserved a table', time: '5 minutes ago' },
              { name: 'Maria from Spain', action: 'booked a spa treatment', time: '8 minutes ago' },
              { name: 'David from Canada', action: 'reserved the ballroom', time: '12 minutes ago' },
              { name: 'Emma from Australia', action: 'purchased a gift card', time: '15 minutes ago' }
            ];
            
            let proofIndex = 0;
            function showSocialProof() {
              const notification = document.getElementById('socialProof');
              const message = socialProofMessages[proofIndex];
              
              notification.querySelector('.social-proof-text').innerHTML = 
                `<strong>${message.name}</strong> ${message.action}`;
              notification.querySelector('.social-proof-time').textContent = message.time;
              
              notification.classList.add('show');
              
              setTimeout(() => {
                notification.classList.remove('show');
              }, 5000);
              
              proofIndex = (proofIndex + 1) % socialProofMessages.length;
            }
            
            // Show first social proof after 3 seconds, then every 15 seconds
            setTimeout(showSocialProof, 3000);
            setInterval(showSocialProof, 15000);
            
            // Add smooth scroll for all anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
              anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                  target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                  });
                }
              });
            });
            
            // Add scroll-reveal class to main sections
            document.addEventListener('DOMContentLoaded', function() {
              // Add scroll-reveal to section headings
              const headings = document.querySelectorAll('h2, h3');
              headings.forEach((heading, index) => {
                if (index % 2 === 0) {
                  heading.classList.add('scroll-reveal');
                } else {
                  heading.classList.add('scroll-reveal-left');
                }
              });
              
              // Add card-lift to cards
              const cards = document.querySelectorAll('.room-card, .testimonial-card, .service-card, .activity-card');
              cards.forEach(card => {
                card.classList.add('card-lift');
              });
              
              // Add hover-zoom to images
              const images = document.querySelectorAll('img[src*="room"], img[src*="dining"], img[src*="spa"]');
              images.forEach(img => {
                if (!img.closest('.hover-zoom')) {
                  const wrapper = document.createElement('div');
                  wrapper.className = 'hover-zoom';
                  img.parentNode.insertBefore(wrapper, img);
                  wrapper.appendChild(img);
                }
              });
              
              // Lazy load images
              if ('loading' in HTMLImageElement.prototype) {
                const images = document.querySelectorAll('img[loading="lazy"]');
                images.forEach(img => {
                  img.addEventListener('load', function() {
                    this.classList.add('loaded');
                  });
                });
              }
            });
            
            
            // ========== ADDITIONAL ENHANCEMENT FUNCTIONS ==========
            
            // Parallax Effect for Hero Section
            window.addEventListener('scroll', function() {
              const heroSection = document.querySelector('.hero-section');
              const heroBg = document.querySelector('.hero-bg');
              
              if (heroSection && heroBg) {
                const scrolled = window.pageYOffset;
                const parallaxSpeed = 0.5;
                heroBg.style.transform = `translateY(${scrolled * parallaxSpeed}px)`;
              }
            });
            
            // Hamburger Menu Toggle
            function toggleMobileMenu() {
              const hamburger = document.querySelector('.hamburger');
              const navLeft = document.querySelector('.nav-left');
              const navRight = document.querySelector('.nav-right');
              const overlay = document.querySelector('.mobile-menu-overlay');
              
              if (hamburger && navLeft && overlay) {
                hamburger.classList.toggle('active');
                navLeft.classList.toggle('active');
                overlay.classList.toggle('active');
                
                // Prevent body scroll when menu is open
                if (navLeft.classList.contains('active')) {
                  document.body.style.overflow = 'hidden';
                } else {
                  document.body.style.overflow = '';
                }
              }
            }
            
            // Close mobile menu when clicking overlay
            document.addEventListener('click', function(e) {
              if (e.target.classList.contains('mobile-menu-overlay')) {
                toggleMobileMenu();
              }
            });
            
            // Button Loading State
            function setButtonLoading(button, loading) {
              if (loading) {
                button.classList.add('loading');
                button.disabled = true;
              } else {
                button.classList.remove('loading');
                button.disabled = false;
              }
            }
            
            // Example usage for booking buttons
            document.querySelectorAll('button[type="submit"]').forEach(button => {
              button.addEventListener('click', function(e) {
                // Simulate loading state
                setButtonLoading(this, true);
                setTimeout(() => {
                  setButtonLoading(this, false);
                }, 2000);
              });
            });
            
            // Show Success Checkmark
            function showSuccessCheckmark() {
              const checkmark = document.createElement('div');
              checkmark.className = 'success-checkmark show';
              checkmark.innerHTML = `
                <svg viewBox="0 0 52 52">
                  <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                  <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
              `;
              document.body.appendChild(checkmark);
              
              setTimeout(() => {
                checkmark.remove();
              }, 2000);
            }
            
            // Add urgency badges to room cards
            document.addEventListener('DOMContentLoaded', function() {
              const roomCards = document.querySelectorAll('.room-card');
              const urgencyTexts = ['Only 2 Left!', 'Last Room!', 'Popular Choice!', 'Almost Full!'];
              
              roomCards.forEach((card, index) => {
                if (index < 3) { // Add urgency to first 3 cards
                  const badge = document.createElement('div');
                  badge.className = 'urgency-badge';
                  badge.textContent = urgencyTexts[index] || urgencyTexts[0];
                  card.style.position = 'relative';
                  card.appendChild(badge);
                }
              });
            });
            
            // Scroll Indicator Click Handler
            document.addEventListener('DOMContentLoaded', function() {
              const scrollIndicator = document.querySelector('.scroll-indicator');
              if (scrollIndicator) {
                scrollIndicator.addEventListener('click', function() {
                  window.scrollTo({
                    top: window.innerHeight,
                    behavior: 'smooth'
                  });
                });
              }
            });
            
            // Enhanced Form Validation with Animation
            document.querySelectorAll('input[required], textarea[required]').forEach(input => {
              input.addEventListener('invalid', function(e) {
                e.preventDefault();
                this.classList.add('shake');
                setTimeout(() => {
                  this.classList.remove('shake');
                }, 500);
              });
            });
            
            // Add shake animation
            const style = document.createElement('style');
            style.textContent = `
              @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
              }
              .shake {
                animation: shake 0.5s;
                border-color: #dc3545 !important;
              }
            `;
            document.head.appendChild(style);
            
            // Price Animation on Scroll
            function animatePrices() {
              const priceElements = document.querySelectorAll('.price-tag');
              priceElements.forEach(price => {
                const rect = price.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom >= 0) {
                  price.style.animation = 'fadeInUp 0.6s ease';
                }
              });
            }
            window.addEventListener('scroll', animatePrices);
            window.addEventListener('load', animatePrices);
          </script>

<?php include '../includes/footer.php'; ?>

<script>
  lucide.createIcons();
</script>
