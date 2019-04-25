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
				let param = params.getAll(ev.target.dataset.param + '[]');
				if (ev.target.checked) {
					params.append(ev.target.dataset.param + '[]', ev.target.dataset[ev.target.dataset.param]);
				} else {
					params.delete(ev.target.dataset.param + '[]');
					param = param.filter(p => p !== ev.target.dataset[ev.target.dataset.param]);

					for (let p of param) {
						params.append(ev.target.dataset.param + '[]', p)
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
