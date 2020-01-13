require('./bootstrap');
require( 'datatables.net-bs4' );
require( 'datatables.net-responsive-bs4' );

window.dbtable = '';
window.editButton = function(route){
	var container = $('<div/>');
	var button = $('<a />',{
		href:route,
		html:'<i class="fa fa-pencil"></i>',
		class:'btn btn-primary',
	}).appendTo(container);

	return container.html();
}

window.deleteButton = function(route){
	var container = $('<div/>');
	var button = $('<a />',{
		href:route,
		html:'<i class="fa fa-trash"></i>',
		class:'btn btn-danger',
	}).appendTo(container);

	return container.html();
}
window.initDatatable = function (options){

	var tableOptions = {
		processing: true,
        serverSide: true,
    	bLengthChange: false,
    	bInfo: false,
		ajax: {
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                url: $('.datatable').data('url'),
                method: 'post',
            },
	}

	dbtable = $('.datatable').DataTable($.extend({}, tableOptions, options));	
	$('.dataTables_filter').parent().removeClass('col-md-6').addClass('col-md-12')
	$('.dataTables_paginate').parent().removeClass('col-md-7').addClass('col-md-12');
}

