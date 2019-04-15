{
	const scrollTo = () => {
		const elements = document.querySelectorAll('[data-scroll]');

		if (!elements.length) return;

		for ( let i = 0; i < elements.length; i++ ) {
			elements[i].addEventListener('click', scroller);
		}
	};

	const scroller = (event) => {
		const el = event.target;
		const target = document.getElementById(el.dataset.scroll);

		target.scrollIntoView({
			behavior: "smooth"
		})
	};

	document.addEventListener('DOMContentLoaded', scrollTo);
}
