var swiper = new Swiper(".bannerswiper", {
  pagination: {
    el: ".swiper-pagination",
  },
  autoplay: true,
});

var swiper = new Swiper(".productswiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: true,
});

var swiper = new Swiper(".mySwiper-content", {
  slidesPerView: 1,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    }
  }
});

var page_url = window.location.href;
if (page_url.includes("index.php")) {
  document.querySelectorAll(".nav-link")[0].classList.add("active");
} else if (page_url.includes("about.php")) {
  document.querySelectorAll(".nav-link")[1].classList.add("active");
} else if (page_url.includes("content-store.php")) {
  document.querySelectorAll(".nav-link")[2].classList.add("active");
} else if (page_url.includes("membership.php")) {
  document.querySelectorAll(".nav-link")[3].classList.add("active");
} else if (page_url.includes("coupons.php")) {
  document.querySelectorAll(".nav-link")[4].classList.add("active");
} else if (page_url.includes("shop.php")) {
  document.querySelectorAll(".nav-link")[5].classList.add("active");
}

if (
  page_url.includes("signup") ||
  page_url.includes("signin") ||
  page_url.includes("checkout")
) {
  document.querySelector("footer").style.display = "none";
  document.querySelector(".pink-circle").style.display = "none";
  document.querySelector(".blue-circle").style.display = "none";
  document.querySelector("body").style.overflowX = "unset";
}

/*if (page_url.includes("thankyou")) {
  document.querySelector("footer").style.display = "none";
  document.querySelector("header").style.display = "none";
  document.querySelector("body").style.overflowX = "unset";
  document.querySelector(".row.hero-content").style.paddingTop = "50vh";
}*/
