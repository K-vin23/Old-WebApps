var bAbrir = document.getElementById('Materia'),
    bcerrar = document.getElementById('Close'),
	filt = document.getElementById('filt'), 
	bibmat = document.getElementById('bib-mat');

	bAbrir.addEventListener('click', function() {
		bibmat.classList.add('show');
	});
	bAbrir.addEventListener('click', function() {
		bcerrar.classList.add('show');
	});
	bAbrir.addEventListener('click', function() {
		filt.classList.add('hidden');
	});
	bcerrar.addEventListener('click', function() {
		bibmat.classList.remove('show');
	});
	bcerrar.addEventListener('click', function() {
		bcerrar.classList.remove('show');
	});
	bcerrar.addEventListener('click', function() {
		filt.classList.remove('hidden');
	});
