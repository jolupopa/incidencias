$('#modalEditCategory').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 
	var name = button.data('myname')
	var category_id = button.data('myid') 
	var modal = $(this)
	modal.find('.modal-body #name').val(name)
	modal.find('.modal-body #category_id').val(category_id)
});

$('#modalDeleteCategory').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 
	var name = button.data('myname')
	var category_id = button.data('myid') 
	var modal = $(this)
	modal.find('.modal-body #name').val(name)
	modal.find('.modal-body #category_id').val(category_id)
});

$('#modalEditLevel').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 
	var name = button.data('myname')
	var level_id = button.data('myid')  
	var modal = $(this)
	modal.find('.modal-body #name').val(name)
	modal.find('.modal-body #level_id').val(level_id)
}),

$('#modalDeleteLevel').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 
	var name = button.data('myname')
	var level_id = button.data('myid') 
	var modal = $(this)
	modal.find('.modal-body #name').val(name)
	modal.find('.modal-body #level_id').val(level_id)
});