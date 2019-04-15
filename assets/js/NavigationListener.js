const navMenuListn = () => {
	const parents = document.querySelectorAll('[data-hover-target]');

	for ( let i = 0; i < parents.length; i++ ) {
		let child = document.querySelector(`[data-hover-anchor="${parents[i].dataset.hoverTarget}"]`);

		parents[i].addEventListener('mouseenter', () => {
			child.classList.remove('hidden');
		});

		parents[i].addEventListener('mouseleave', () => {
			child.classList.add('hidden');
		})
	}
};

document.addEventListener('DOMContentLoaded', () => {
	navMenuListn();
});
