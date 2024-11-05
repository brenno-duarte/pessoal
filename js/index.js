const fullpageEl = document.getElementById('fullpage')
const menuBtn = document.querySelector('.menu__btn')
const navigation = document.querySelector('.navigation')
const navCloseBtn = document.querySelector('.navigation__close__btn')
const blurOverlay = document.querySelector('.blur__overlay')
const IS_ACTIVE = 'is--active'

const toggleNavigation = () => {
	navigation.classList.toggle(IS_ACTIVE)
	blurOverlay.classList.toggle(IS_ACTIVE)
	fullpageEl.classList.toggle('no-scroll')
}

const CLICK = 'click'

menuBtn.addEventListener(CLICK, toggleNavigation)
navCloseBtn.addEventListener(CLICK, toggleNavigation)
blurOverlay.addEventListener(CLICK, toggleNavigation)

new fullpage('#fullpage', {
	autoScrolling: true,
	scrollBar: true,
})

window.addEventListener('load', function () {
	const preloader = document.querySelector('.preloader');
	if (preloader) {
		preloader.style.transition = 'opacity 0.2s';
		preloader.style.opacity = '0';

		setTimeout(function () {
			preloader.style.display = 'none';
			document.documentElement.style.overflow = 'auto';
			document.body.style.overflow = 'auto';
			document.documentElement.style.height = 'auto';
			document.body.style.height = 'auto';
		}, 200);
	}
});


const texts = [
	"Confiança, sucesso e poder",
	"Mude a cultura da sua empresa",
	"Tome desicões mais inteligentes"
];

let index = 0;

function changeText() {
	const container = document.getElementById("text-container");
	container.classList.remove("fade-in");
	container.classList.add("fade-out");

	setTimeout(() => {
		container.textContent = texts[index];
		container.classList.remove("fade-out");
		container.classList.add("fade-in");
		index = (index + 1) % texts.length;
	}, 500); // Tempo da animação de fade-out
}

setInterval(changeText, 3000); // Muda o texto a cada segundo

/* window.onload = function () {
	var el = document.getElementById('preloader');
	el.style.display = 'none';
}; */