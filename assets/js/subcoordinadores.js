window.addEventListener('load', function () {
	if (!window.jQuery || !jQuery.fn.DataTable) {
		return;
	}

	var table = jQuery('#subCoordinadoresTable').DataTable({
		pageLength: 20,
		lengthMenu: [[20, 25, 50, -1], [20, 25, 50, 'Todos']],
		order: [[0, 'asc']],
		autoWidth: false,
		columnDefs: [
			{ targets: 6, orderable: false, searchable: false }
		],
		language: {
			lengthMenu: 'Mostrar _MENU_ registros',
			search: '',
			searchPlaceholder: 'Buscar...',
			info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
			infoEmpty: 'Mostrando 0 registros',
			zeroRecords: 'No se encontraron sub coordinadores',
			emptyTable: 'No hay sub coordinadores registrados',
			paginate: {
				previous: 'Anterior',
				next: 'Siguiente'
			}
		}
	});

	function closeActionMenus(event) {
		document.querySelectorAll('.sub-action-menu[open]').forEach(function (menu) {
			if (!menu.contains(event.target)) {
				menu.removeAttribute('open');
			}
		});
	}

	document.addEventListener('click', closeActionMenus);
	table.on('draw', function () {
		document.querySelectorAll('.sub-action-menu').forEach(function (menu) {
			menu.removeAttribute('open');
		});
	});
});
