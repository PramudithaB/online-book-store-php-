document.addEventListener('DOMContentLoaded', function() {
    const quickViewBtns = document.querySelectorAll('.quick-view-btn');
    const popups = document.querySelectorAll('.product-preview-popup');
    const body = document.querySelector('body');
  
    for (let i = 0; i < quickViewBtns.length; i++) {
      quickViewBtns[i].addEventListener('click', function(e) {
        e.stopPropagation();
        popups[i].style.display = 'block';
        body.classList.add('blur');
        body.insertAdjacentHTML('beforeend', '<div class="blur-effect"></div>');
        
        const closePopup = function(event) {
          const isOutsidePopup = !popups[i].contains(event.target);
          const isButton = event.target.classList.contains('quick-view-btn');
  
          if (isOutsidePopup && !isButton) {
            popups[i].style.display = 'none';
            body.classList.remove('blur');
            const blurEffect = document.querySelector('.blur-effect');
            blurEffect.parentNode.removeChild(blurEffect);
            document.removeEventListener('click', closePopup);
          }
        };
  
        setTimeout(function() {
          document.addEventListener('click', closePopup);
        }, 0);
      });
    }
  });
  
  let slideIndex = 1;
let slideTimer;

showSlides(slideIndex);
startSlideShow();

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
    resetSlideTimer();
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
    resetSlideTimer();
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

function startSlideShow() {
    slideTimer = setInterval(function() {
        plusSlides(1);
    }, 4500); // Change image every 4 seconds
}

function resetSlideTimer() {
    clearInterval(slideTimer);
    startSlideShow();
}

//scrolling
function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    window.scrollTo({
        top: section.offsetTop - 80, // Adjust the offset based on the navbar height
        behavior: 'smooth'
    });
}

//footer animations

window.addEventListener('scroll', function() {
  var footer = document.getElementById('footer');
  var windowHeight = window.innerHeight;
  var footerHeight = footer.offsetHeight;
  var scrollPosition = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;

  if (scrollPosition + windowHeight >= document.body.offsetHeight - footerHeight) {
      footer.classList.add('footer-show'); // Add class to show the footer
  } else {
      footer.classList.remove('footer-show'); // Remove class to hide the footer
  }
});