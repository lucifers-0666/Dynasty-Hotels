<style>
  .footer { background: #2A221C; color: rgba(255,255,255,0.9); }
  .footer-inner { max-width: 1320px; margin: 0 auto; padding: 120px 24px 64px; }
  .footer-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 40px; }
  .footer h4 { font-size: 18px; font-weight: 600; color: #ffffff; margin-bottom: 24px; letter-spacing: 0.5px; }
  .footer a { font-size: 15px; color: rgba(255,255,255,0.7); text-decoration: none; line-height: 2.2; display: inline-block; transition: color 240ms ease, transform 240ms ease; }
  .footer a:hover { color: #C9A96E; transform: translateX(4px); }
  .footer .about p { font-size: 15px; line-height: 1.9; color: rgba(255,255,255,0.75); }
  .footer .contact-item { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 10px; color: rgba(255,255,255,0.8); }
  .footer .contact-item i { width: 18px; height: 18px; color: rgba(255,255,255,0.8); flex-shrink: 0; }
  .footer .newsletter-wrap { display: flex; gap: 10px; margin-top: 8px; }
  .footer .newsletter-input { flex: 1; padding: 12px 14px; border-radius: 10px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #ffffff; outline: none; }
  .footer .newsletter-input::placeholder { color: rgba(255,255,255,0.85); }
  .footer .newsletter-btn { padding: 12px 18px; background: #C9A96E; color: #2A221C; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: filter 240ms ease, transform 240ms ease; }
  .footer .newsletter-btn:hover { filter: brightness(1.05); transform: translateY(-1px); }
  .footer .social-row { display: flex; gap: 10px; margin-top: 16px; }
  .footer .social-btn { width: 44px; height: 44px; display: grid; place-items: center; border-radius: 50%; color: rgba(255,255,255,0.6); transition: transform 280ms ease, color 280ms ease; }
  .footer .social-btn:hover { transform: rotate(8deg); color: #C9A96E; }
  .footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 32px; margin-top: 64px; display: flex; align-items: center; justify-content: space-between; gap: 16px; font-size: 14px; color: rgba(255,255,255,0.5); flex-wrap: wrap; }
  .payments { display: flex; align-items: center; gap: 10px; }
  .pay-pill { width: 56px; height: 28px; border-radius: 6px; background: #ffffff; color: #222; display: grid; place-items: center; font-size: 12px; font-weight: 700; }
  @media (max-width: 768px) { .footer-grid { grid-template-columns: 1fr; } }
</style>

<footer class="footer" role="contentinfo">
  <div class="footer-inner">
    <div class="footer-grid">
      <!-- About -->
      <div class="about">
        <h4>About</h4>
        <p>Dynasty Hotel blends timeless elegance with modern comfort. Discover award‑winning hospitality, curated experiences, and serene spaces crafted for discerning travelers.</p>
      </div>

      <!-- Quick Links -->
      <div class="links">
        <h4>Quick Links</h4>
        <nav>
          <a href="room.php">Rooms & Suites</a><br>
          <a href="food.php">Dining</a><br>
          <a href="Booking.php">Spa & Wellness</a><br>
          <a href="activities.php">Experiences</a><br>
          <a href="wedding.php">Events</a><br>
          <a href="gift-cards.php">Gift Cards</a>
        </nav>
      </div>

      <!-- Contact -->
      <div class="contact">
        <h4>Contact</h4>
        <div class="contact-item"><i data-lucide="map-pin"></i><span>123 Luxury Avenue, Downtown Hyderabad</span></div>
        <div class="contact-item"><i data-lucide="phone"></i><a href="tel:+1234567890" style="color:rgba(255,255,255,0.8)">+1 (234) 567‑8900</a></div>
        <div class="contact-item"><i data-lucide="mail"></i><a href="mailto:info@dynastyhotels.com" style="color:rgba(255,255,255,0.8)">info@dynastyhotels.com</a></div>
        <div class="social-row">
          <a href="#" class="social-btn" aria-label="Facebook"><i data-lucide="facebook"></i></a>
          <a href="#" class="social-btn" aria-label="Instagram"><i data-lucide="instagram"></i></a>
          <a href="#" class="social-btn" aria-label="Twitter"><i data-lucide="twitter"></i></a>
          <a href="#" class="social-btn" aria-label="LinkedIn"><i data-lucide="linkedin"></i></a>
          <a href="#" class="social-btn" aria-label="YouTube"><i data-lucide="youtube"></i></a>
        </div>
      </div>

      <!-- Newsletter -->
      <div class="newsletter">
        <h4>Newsletter</h4>
        <form class="footer-newsletter-form" aria-label="Subscribe to newsletter">
          <div class="newsletter-wrap">
            <input type="email" class="newsletter-input" placeholder="Your email address" required>
            <button type="submit" class="newsletter-btn">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <div>© 2025 Dynasty Hotel. All rights reserved.</div>
      <div class="payments">
        <span>We accept:</span>
        <div class="pay-pill">VISA</div>
        <div class="pay-pill">MC</div>
        <div class="pay-pill">AMEX</div>
        <div class="pay-pill">UPI</div>
      </div>
      <div>
        <a href="privacy-policy.php">Privacy</a> • <a href="terms-conditions.php">Terms</a> • <a href="sitemap.php">Sitemap</a>
      </div>
    </div>
  </div>
</footer>

<script>
  // Newsletter submit feedback
  const footerForm = document.querySelector('.footer-newsletter-form');
  if (footerForm) {
    footerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = footerForm.querySelector('.newsletter-btn');
      const original = btn.textContent;
      btn.textContent = 'Thanks!';
      setTimeout(() => { btn.textContent = original; footerForm.reset(); }, 1800);
    });
  }
  // Initialize Lucide icons if available
  if (window.lucide && typeof lucide.createIcons === 'function') { lucide.createIcons(); }
</script>

</body>
</html>
