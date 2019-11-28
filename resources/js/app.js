require('./bootstrap');
require( 'datatables.net-bs4' );
require( 'datatables.net-responsive-bs4' );

window.dbtable = '';
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

