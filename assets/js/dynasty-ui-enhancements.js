/**
 * DYNASTY HOTEL - UI ENHANCEMENTS JAVASCRIPT
 * Animations, interactions, and dynamic effects
 * Version: 2.0 | December 2025
 */

(function() {
  'use strict';

  // ==========================================
  // UTILITY FUNCTIONS
  // ==========================================

  /**
   * Lerp (Linear Interpolation) for smooth cursor following
   */
  function lerp(start, end, factor) {
    return start + (end - start) * factor;
  }

  /**
   * Check if user prefers reduced motion
   */
  function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  /**
   * Debounce function for performance
   */
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  // ==========================================
  // CUSTOM CURSOR (Desktop Only)
  // ==========================================
  
  function initCustomCursor() {
    if (window.innerWidth <= 768 || prefersReducedMotion()) return;

    const cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    document.body.appendChild(cursor);

    let mouseX = 0, mouseY = 0;
    let cursorX = 0, cursorY = 0;

    // Track mouse position
    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });

    // Smooth cursor following with lerp
    function animateCursor() {
      cursorX = lerp(cursorX, mouseX, 0.15);
      cursorY = lerp(cursorY, mouseY, 0.15);
      
      cursor.style.transform = `translate(${cursorX - 12}px, ${cursorY - 12}px)`;
      requestAnimationFrame(animateCursor);
    }
    animateCursor();

    // Add hover effects on interactive elements
    const interactiveElements = document.querySelectorAll('a, button, input, select, textarea, .dynasty-booking-field, .dynasty-stat-card');
    
    interactiveElements.forEach(el => {
      el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
      el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
    });

    // Add click effect
    document.addEventListener('mousedown', () => cursor.classList.add('click'));
    document.addEventListener('mouseup', () => cursor.classList.remove('click'));
  }

  // ==========================================
  // HEADER SCROLL EFFECTS
  // ==========================================
  
  function initHeaderScrollEffects() {
    const header = document.querySelector('.dynasty-header');
    if (!header) return;

    let lastScroll = 0;

    window.addEventListener('scroll', debounce(() => {
      const currentScroll = window.pageYOffset;

      if (currentScroll > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }

      lastScroll = currentScroll;
    }, 10));
  }

  // ==========================================
  // PARALLAX HERO BACKGROUND
  // ==========================================
  
  function initParallaxEffect() {
    if (window.innerWidth <= 768 || prefersReducedMotion()) return;

    const heroBg = document.querySelector('.dynasty-hero-bg');
    if (!heroBg) return;

    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const parallaxSpeed = 0.5;
      heroBg.style.transform = `translateY(${scrolled * parallaxSpeed}px)`;
    });
  }

  // ==========================================
  // HERO TITLE SPLIT TEXT ANIMATION
  // ==========================================
  
  function initHeroTitleAnimation() {
    const heroTitle = document.querySelector('.dynasty-hero-title');
    if (!heroTitle) return;

    const text = heroTitle.textContent;
    const words = text.split(' ');
    
    heroTitle.innerHTML = words
      .map(word => `<span class="word">${word}</span>`)
      .join(' ');
  }

  // ==========================================
  // BOOKING FORM INTERACTIONS
  // ==========================================
  
  function initBookingFormInteractions() {
    const bookingFields = document.querySelectorAll('.dynasty-booking-field');
    
    bookingFields.forEach(field => {
      const input = field.querySelector('.dynasty-booking-input');
      
      if (input) {
        input.addEventListener('focus', () => {
          field.classList.add('focused');
        });
        
        input.addEventListener('blur', () => {
          field.classList.remove('focused');
        });
      }
    });
  }

  // ==========================================
  // SCROLL INDICATOR CLICK
  // ==========================================
  
  function initScrollIndicator() {
    const scrollIndicator = document.querySelector('.dynasty-scroll-indicator');
    if (!scrollIndicator) return;

    scrollIndicator.addEventListener('click', () => {
      const firstSection = document.querySelector('.dynasty-stats-bar') || 
                          document.querySelector('section:nth-of-type(2)');
      
      if (firstSection) {
        firstSection.scrollIntoView({ behavior: 'smooth' });
      }
    });

    // Hide scroll indicator on scroll
    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 100) {
        scrollIndicator.style.opacity = '0';
        scrollIndicator.style.pointerEvents = 'none';
      } else {
        scrollIndicator.style.opacity = '1';
        scrollIndicator.style.pointerEvents = 'auto';
      }
    });
  }

  // ==========================================
  // STATS COUNTER ANIMATION
  // ==========================================
  
  function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);
    const suffix = element.dataset.suffix || '';
    const prefix = element.dataset.prefix || '';

    function updateCounter() {
      current += increment;
      if (current < target) {
        element.textContent = prefix + Math.ceil(current) + suffix;
        requestAnimationFrame(updateCounter);
      } else {
        element.textContent = prefix + target + suffix;
      }
    }

    updateCounter();
  }

  function initStatsCounters() {
    const statNumbers = document.querySelectorAll('.dynasty-stat-number');
    
    const observerOptions = {
      threshold: 0.5,
      rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.animated) {
          const target = parseInt(entry.target.dataset.target) || 
                        parseInt(entry.target.textContent);
          
          entry.target.dataset.animated = 'true';
          animateCounter(entry.target, target);
        }
      });
    }, observerOptions);

    statNumbers.forEach(stat => observer.observe(stat));
  }

  // ==========================================
  // MAGNETIC BUTTONS
  // ==========================================
  
  function initMagneticButtons() {
    if (window.innerWidth <= 768 || prefersReducedMotion()) return;

    const magneticButtons = document.querySelectorAll('.dynasty-search-btn, .cta-magnetic');
    
    magneticButtons.forEach(button => {
      button.addEventListener('mousemove', (e) => {
        const rect = button.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        
        const distance = Math.sqrt(x * x + y * y);
        const maxDistance = 80;
        
        if (distance < maxDistance) {
          const strength = (maxDistance - distance) / maxDistance;
          const moveX = x * strength * 0.3;
          const moveY = y * strength * 0.3;
          
          button.style.transform = `translate(${moveX}px, ${moveY}px)`;
        }
      });
      
      button.addEventListener('mouseleave', () => {
        button.style.transform = 'translate(0, 0)';
      });
    });
  }

  // ==========================================
  // 3D TILT CARDS
  // ==========================================
  
  function init3DTiltCards() {
    if (window.innerWidth <= 768 || prefersReducedMotion()) return;

    const tiltCards = document.querySelectorAll('.tilt-card, .dynasty-stat-card');
    
    tiltCards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = ((y - centerY) / centerY) * -10;
        const rotateY = ((x - centerX) / centerX) * 10;
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
      });
      
      card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
      });
    });
  }

  // ==========================================
  // SEARCH ICON INTERACTION
  // ==========================================
  
  function initSearchIconInteraction() {
    const searchIcon = document.querySelector('.dynasty-search-icon');
    if (!searchIcon) return;

    searchIcon.addEventListener('click', () => {
      // Placeholder for search panel expansion
      console.log('Search icon clicked - implement search panel here');
      
      // Example: Create and show search panel
      const searchPanel = document.createElement('div');
      searchPanel.className = 'dynasty-search-panel';
      searchPanel.innerHTML = `
        <div class="dynasty-search-panel-inner">
          <input type="text" placeholder="Search..." class="dynasty-search-input">
          <button class="dynasty-search-close">×</button>
        </div>
      `;
      
      document.body.appendChild(searchPanel);
      
      setTimeout(() => searchPanel.classList.add('active'), 10);
      
      const closeBtn = searchPanel.querySelector('.dynasty-search-close');
      closeBtn.addEventListener('click', () => {
        searchPanel.classList.remove('active');
        setTimeout(() => searchPanel.remove(), 300);
      });
    });
  }

  // ==========================================
  // INTERSECTION OBSERVER FOR FADE-IN ANIMATIONS
  // ==========================================
  
  function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate]');
    
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const animationType = entry.target.dataset.animate;
          entry.target.classList.add(`dynasty-${animationType}`);
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    animatedElements.forEach(el => observer.observe(el));
  }

  // ==========================================
  // SEARCH BUTTON RIPPLE EFFECT
  // ==========================================
  
  function initRippleEffect() {
    const buttons = document.querySelectorAll('.dynasty-search-btn');
    
    buttons.forEach(button => {
      button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');
        
        this.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
      });
    });
  }

  // ==========================================
  // KEYBOARD NAVIGATION ENHANCEMENTS
  // ==========================================
  
  function initKeyboardNavigation() {
    // Enhance tab navigation visibility
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Tab') {
        document.body.classList.add('keyboard-nav');
      }
    });

    document.addEventListener('mousedown', () => {
      document.body.classList.remove('keyboard-nav');
    });

    // Escape key to close panels
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        const activePanel = document.querySelector('.dynasty-search-panel.active');
        if (activePanel) {
          activePanel.classList.remove('active');
          setTimeout(() => activePanel.remove(), 300);
        }
      }
    });
  }

  // ==========================================
  // PERFORMANCE OPTIMIZATIONS
  // ==========================================
  
  function initPerformanceOptimizations() {
    // Lazy load images below fold
    if ('IntersectionObserver' in window) {
      const lazyImages = document.querySelectorAll('img[loading="lazy"]');
      
      const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            if (img.dataset.src) {
              img.src = img.dataset.src;
              img.removeAttribute('data-src');
            }
            imageObserver.unobserve(img);
          }
        });
      });

      lazyImages.forEach(img => imageObserver.observe(img));
    }

    // Preload critical assets
    const criticalAssets = [
      '../assets/images/index/v3.avif',
      '../assets/images/index/v2.avif'
    ];

    criticalAssets.forEach(src => {
      const link = document.createElement('link');
      link.rel = 'preload';
      link.as = 'image';
      link.href = src;
      document.head.appendChild(link);
    });
  }

  // ==========================================
  // SMOOTH SCROLL POLYFILL
  // ==========================================
  
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;

        e.preventDefault();
        const target = document.querySelector(href);
        
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  }

  // ==========================================
  // INITIALIZE ALL FEATURES
  // ==========================================
  
  function init() {
    // Check if DOM is ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init);
      return;
    }

    console.log('🏨 Dynasty Hotel UI Enhancements v2.0 Initialized');

    // Initialize all features
    initCustomCursor();
    initHeaderScrollEffects();
    initParallaxEffect();
    initHeroTitleAnimation();
    initBookingFormInteractions();
    initScrollIndicator();
    initStatsCounters();
    initMagneticButtons();
    init3DTiltCards();
    initSearchIconInteraction();
    initScrollAnimations();
    initRippleEffect();
    initKeyboardNavigation();
    initPerformanceOptimizations();
    initSmoothScroll();

    // Initialize Lucide icons if available
    if (typeof lucide !== 'undefined') {
      lucide.createIcons();
    }
  }

  // Start initialization
  init();

  // ==========================================
  // PUBLIC API (if needed)
  // ==========================================
  
  window.DynastyHotel = {
    version: '2.0',
    reinitialize: init,
    animateCounter: animateCounter
  };

})();

// ==========================================
// ADDITIONAL CSS FOR RIPPLE EFFECT
// ==========================================
const rippleStyles = document.createElement('style');
rippleStyles.textContent = `
  .ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    transform: scale(0);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
  }

  @keyframes ripple-animation {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }

  /* Custom Cursor Styles */
  .custom-cursor {
    position: fixed;
    width: 24px;
    height: 24px;
    border: 2px solid #C9A96E;
    border-radius: 50%;
    pointer-events: none;
    z-index: 10000;
    transition: width 120ms ease, height 120ms ease, background 120ms ease;
    mix-blend-mode: difference;
  }

  .custom-cursor.hover {
    width: 64px;
    height: 64px;
    background: rgba(201, 169, 110, 0.15);
    border-color: #C9A96E;
  }

  .custom-cursor.click {
    transform: scale(0.75);
  }

  /* Search Panel Styles */
  .dynasty-search-panel {
    position: fixed;
    top: 80px;
    right: 0;
    width: 400px;
    height: calc(100vh - 80px);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    box-shadow: -4px 0 24px rgba(0, 0, 0, 0.1);
    z-index: 999;
    transform: translateX(100%);
    transition: transform 0.3s ease-out;
    padding: 40px;
  }

  .dynasty-search-panel.active {
    transform: translateX(0);
  }

  .dynasty-search-input {
    width: 100%;
    padding: 16px 20px;
    font-size: 18px;
    border: 2px solid #D4AF37;
    border-radius: 12px;
    outline: none;
  }

  .dynasty-search-close {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background: none;
    border: none;
    font-size: 32px;
    cursor: pointer;
    color: #8B7355;
  }

  /* Keyboard Navigation Enhancement */
  .keyboard-nav *:focus {
    outline: 3px solid #D4AF37 !important;
    outline-offset: 3px !important;
  }
`;
document.head.appendChild(rippleStyles);
