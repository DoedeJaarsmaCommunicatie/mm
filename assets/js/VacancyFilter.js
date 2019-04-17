const VacancyFilter = () => {

	function init () {
		filter();
	}

	function filter() {
		let form = document.querySelector('.filter-vacancy');

		if (!form)
			return;

		const checkboxes = form.querySelectorAll('input[type="checkbox"]');

		if (!checkboxes.length > 0)
			return;

		const params = new URLSearchParams(window.location.search);

		for ( let i = 0; i < checkboxes.length; i++ ) {
			checkboxes[i].addEventListener('click', (ev) => {
				let param = params.getAll('regio[]');
				if (ev.target.checked) {
					params.append('regio[]', ev.target.dataset.regio);
				} else {
					params.delete('regio[]');
					param = param.filter(p => p !== ev.target.dataset.regio);

					for (let p of param) {
						params.append('regio[]', p)
					}
				}

				window.location.search = params.toString();
			})
		}
	}

	init();

	return {
		filter
	}
};

document.addEventListener('DOMContentLoaded', () => {
	VacancyFilter();
});
