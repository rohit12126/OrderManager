
$(document).ready(function (){
	initDatatable({
		columns: [
			{data: 'name'},
			{data: 'email',orderable : false},
			{data: 'created_at', orderable : false, searchable: false}
		]
	});
});