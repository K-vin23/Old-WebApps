var bAbrir = document.getElementById('abrirus-btn'),
	panelUs = document.getElementById('PanelUs'),
	bCerrar = document.getElementById('cerrar'),
	body = document.getElementById('Main'),
	usuario = document.getElementById('Usuario');

	bAbrir.addEventListener('click', function() {
		panelUs.classList.add('Abierto');
	});
	bAbrir.addEventListener('click', function() {
		body.classList.add('expanded');
	});
	bAbrir.addEventListener('click', function() {
		usuario.classList.add('cerrar');
	});
	bCerrar.addEventListener('click', function() {
		panelUs.classList.remove('Abierto');
	});
	bCerrar.addEventListener('click', function() {
		body.classList.remove('expanded');
	});
	bCerrar.addEventListener('click', function() {
		usuario.classList.remove('cerrar');
	});
