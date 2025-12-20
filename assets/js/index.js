document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');
  let currentSlide = 0;

  // Function to change the slide
  function showSlide(index) {
      slides.forEach((slide, i) => {
          slide.classList.remove('active');
          dots[i].classList.remove('active');
      });
      slides[index].classList.add('active');
      dots[index].classList.add('active');
  }

  // Show next slide
  function showNextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
  }

  // Show previous slide
  function showPreviousSlide() {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
  }

  // Event listeners for the buttons
  document.querySelector('.next').addEventListener('click', showNextSlide);
  document.querySelector('.prev').addEventListener('click', showPreviousSlide);

  // Event listeners for the dots
  dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
          currentSlide = index;
          showSlide(currentSlide);
      });
  });

  // Automatic slide change every 5 seconds
  setInterval(showNextSlide, 5000);

  // Caption fade-in effect
  const caption = document.querySelector('.caption');
  setTimeout(() => {
      caption.classList.add('active');
  }, 1000); // 1-second delay before the effect starts
});

// Scroll up effect
window.addEventListener('scroll', function () {
  var elements = document.querySelectorAll('.diss');
  var windowHeight = window.innerHeight;

  elements.forEach(element => {
      if (isElementInViewport(element)) {
          element.classList.add('scroll-up'); // Add class to trigger animation
      }
  });
});

// Function to check if element is in viewport
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// JavaScript for last slider functionality
const initSlider = () => {
  const imgList = document.querySelector(".last-singer .img-list");
  const slideButtons = document.querySelectorAll(".last-singer .slide-button");
  const slidescrollar = document.querySelector(".last-main .last-bar");
  const scrollarThmb = slidescrollar?.querySelector(".last-thumb");

  // Debugging: Log to see if elements are selected properly
  console.log(imgList, slideButtons, slidescrollar, scrollarThmb);
  if (!imgList || !scrollarThmb || slideButtons.length === 0) {
      console.error("Required slider elements not found!");
      return;
  }

  const maxScrollleft = imgList.scrollWidth - imgList.clientWidth;

  // Update the position of the thumb based on scroll position
  const updateThumbPosition = () => {
      const scrollPosition = imgList.scrollLeft;
      const thumbPosition = (scrollPosition / maxScrollleft) * (slidescrollar.clientWidth - scrollarThmb.offsetWidth);
      scrollarThmb.style.left = `${Math.min(Math.max(0, thumbPosition), slidescrollar.clientWidth - scrollarThmb.offsetWidth)}px`;
  };

  // Handle sliding button visibility
  const handleSlideButton = () => {
      slideButtons[0].style.display = imgList.scrollLeft <= 0 ? "none" : "block";
      slideButtons[1].style.display = imgList.scrollLeft >= maxScrollleft ? "none" : "block";
  };

  // Move slider based on button click
  slideButtons.forEach(button => {
      button.addEventListener("click", () => {
          const direction = button.id === "prev-slide" ? -1 : 1;
          const scrollAmount = imgList.clientWidth * direction;
          imgList.scrollBy({ left: scrollAmount, behavior: "smooth" });
      });
  });

  // Thumb drag functionality
  scrollarThmb.addEventListener("mousedown", (e) => {
      e.preventDefault(); // Prevents default dragging behavior
      const startX = e.clientX;
      const thumbPosition = scrollarThmb.offsetLeft;
      const maxThumbPosition = slidescrollar.getBoundingClientRect().width - scrollarThmb.offsetWidth;

      const handleMouseMove = (e) => {
          const deltaX = e.clientX - startX;
          const newThumbPosition = Math.max(0, Math.min(maxThumbPosition, thumbPosition + deltaX));
          const scrollAmount = (newThumbPosition / maxThumbPosition) * maxScrollleft;

          // Update the position of the thumb and scroll
          scrollarThmb.style.left = `${newThumbPosition}px`;
          imgList.scrollLeft = scrollAmount;
      };

      const handleMouseUp = () => {
          document.removeEventListener("mousemove", handleMouseMove);
          document.removeEventListener("mouseup", handleMouseUp);
      };

      document.addEventListener("mousemove", handleMouseMove);
      document.addEventListener("mouseup", handleMouseUp);
  });

  // Update button visibility and thumb position on scroll
  imgList.addEventListener("scroll", () => {
      requestAnimationFrame(() => {
          handleSlideButton();
          updateThumbPosition();
      });
  });

  // Initial setup
  handleSlideButton();
  updateThumbPosition();
};

// Wait for window load to initialize the slider
window.addEventListener("load", initSlider);
document.addEventListener("DOMContentLoaded", function () {
const slides = document.querySelectorAll('.arch-slide-frame');
const nextButton = document.querySelector('.arch-next');
const prevButton = document.querySelector('.arch-prev');
let currentSlide = 0;

// Function to show the current slide
function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

// Show next slide
function showNextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

// Show previous slide
function showPreviousSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

// Event listeners for navigation buttons
nextButton.addEventListener('click', showNextSlide);
prevButton.addEventListener('click', showPreviousSlide);

// Automatic slide change every 5 seconds
setInterval(showNextSlide, 5500);

// Initial display
showSlide(currentSlide);
});



let lastScrollTop = 0;
const headings = document.querySelectorAll('.last-diss');

window.addEventListener('scroll', function() {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop < lastScrollTop) {
    // User is scrolling up
    headings.forEach(heading => {
      heading.classList.add('scroll-up');
    });
  } else {
    // User is scrolling down
    headings.forEach(heading => {
      heading.classList.remove('scroll-up');
    });
  }
  lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
});

// main js start 

// main js end 

document.getElementById('occupancy-summary').addEventListener('click', function () {
  document.getElementById('occupancyModal').style.display = 'block';
});

function updateCount(type, change) {
  const countElement = document.getElementById(`${type}-count`);
  let count = parseInt(countElement.textContent);

  count = Math.max(0, count + change); // Prevent negative values
  countElement.textContent = count;

  updateSummary();
}

function updateSummary() {
  const rooms = document.getElementById('rooms-count').textContent;
  const adults = document.getElementById('adults-count').textContent;
  const children = document.getElementById('children-count').textContent;

  document.getElementById('occupancy-summary').textContent = 
      `${rooms} Room${rooms > 1 ? 's' : ''}, ${adults} Adult${adults > 1 ? 's' : ''}, ${children} Child${children > 1 ? 'ren' : ''}`;
}

function closeModal() {
  document.getElementById('occupancyModal').style.display = 'none';
}

// Close the modal when clicking outside
window.addEventListener("click", function(event) {
  const modal = document.getElementById("occupancyModal");
  if (!event.target.closest("#occupancy-summary") && !event.target.closest("#occupancyModal")) {
      modal.style.display = "none";
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const today = new Date().toISOString().split("T")[0]; // Gets current date in yyyy-mm-dd format
  document.getElementById("checkin").setAttribute("min", today);
  document.getElementById("checkout").setAttribute("min", today);
});




const track = document.querySelector('.carousel-track');
const prevButton = document.querySelector('.nav-button.prev');
const nextButton = document.querySelector('.nav-button.next');
const items = document.querySelectorAll('.carousel-item');
let currentIndex1 = 1; // Start with the middle item as active

function updateActiveItem() {
items.forEach((item, index) => {
  item.classList.remove('active');
  if (index === currentIndex1) {
    item.classList.add('active');
  }
});
}

// Set the position of each item in the carousel
function positionItems() {
const itemWidth = items[0].getBoundingClientRect().width + 20; // includes gap
items.forEach((item, index) => {
  item.style.left = `${index * itemWidth}px`;
});
}

// Move to the next set of items
nextButton.addEventListener('click', () => {
if (currentIndex1 < items.length - 1) {
  currentIndex1++;
  track.style.transform = `translateX(-${currentIndex1 * (items[0].getBoundingClientRect().width + 20)}px)`;
  updateActiveItem();
}
});

// Move to the previous set of items
prevButton.addEventListener('click', () => {
if (currentIndex1 > 0) {
  currentIndex1--;
  track.style.transform = `translateX(-${currentIndex1 * (items[0].getBoundingClientRect().width + 20)}px)`;
  updateActiveItem();
}
});

// Initial Setup
positionItems();
updateActiveItem();


function toggleDropdown(event) {
  const profile = event.currentTarget;
  profile.classList.toggle('active');
}


window.addEventListener('scroll', function() {
  const header = document.querySelector('.header-container');
  header.classList.toggle('sticky', window.scrollY > 0);
});
function subscribeAlert() {
alert("Thank you for subscribing to our newsletter!");
}




document.addEventListener("DOMContentLoaded", () => {
const video = document.getElementById("sliderVideo");
const playPauseBtn = document.getElementById("playPauseBtn");
const muteBtn = document.getElementById("muteBtn");

// Play/Pause toggle
playPauseBtn.addEventListener("click", () => {
  if (video.paused) {
    video.play();
    playPauseBtn.innerHTML = "❚❚"; // Pause icon
  } else {
    video.pause();
    playPauseBtn.innerHTML = "&#9658;"; // Play icon
  }
});

// Mute/Unmute toggle
muteBtn.addEventListener("click", () => {
  video.muted = !video.muted;
  muteBtn.innerHTML = video.muted
    ? '<i class="fas fa-volume-mute"></i>'
    : '<i class="fas fa-volume-up"></i>';
});
});


