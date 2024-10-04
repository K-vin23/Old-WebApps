var btnAbrir = document.getElementById('btn-abrir'),
	chat = document.getElementById('Chat'),
	btnCerrar= document.getElementById('btn-cerrar');

	btnAbrir.addEventListener('click', function() {
		chat.classList.add('active');
		btnAbrir.classList.add('hidden');
		btnCerrar.classList.add('visible');
	});

	btnCerrar.addEventListener('click', function() {
		chat.classList.remove('active');
		btnAbrir.classList.remove('hidden');
		btnCerrar.classList.remove('visible');
	});