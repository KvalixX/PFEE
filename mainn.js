

const nav = document.querySelector('nav');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) { 
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});



const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".video-slide");
const contents = document.querySelectorAll(".content");

const sliderNav = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove("active");
    });

    slides.forEach((slide) => {
        slide.classList.remove("active");
    });

    contents.forEach((content) => {
        content.classList.remove("active");
    });

    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
    contents[manual].classList.add("active");
};

btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        sliderNav(i);
    });
});





document.addEventListener("DOMContentLoaded", () => {
	const marks = document.querySelectorAll("mark");

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					entry.target.classList.add("highlighted");
				}
			});
		},
		{
			threshold: 0.5, 
		}
	);

	marks.forEach((mark) => observer.observe(mark));
});



    const mainImg = document.getElementById('MainImg');
    const smallImgs = document.querySelectorAll('.small-img');

    smallImgs.forEach(img => {
        img.addEventListener('click', () => {
            mainImg.src = img.src; 
        });
    });

