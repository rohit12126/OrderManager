$(document).ready(function (){
	initDatatable({
		ajax:{
			headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            url: $('.datatable').data('url'),
			method:'POST',
			data: function ( d ) {
				return $.extend( {}, d, {
			        "stock_status": $('select[name="stock_status"]').val()
			     });
		    }
		},
		columns: [
			{data: 'name'},
			{data: 'price',searchable: false},
			{data: 'in_stock', orderable : false, searchable: false}
		]
	});
	
	initStockFilter();
});

var initStockFilter = function(){
	$('.dataTables_filter').addClass('float-left');
	$('.dataTables_filter').parent().removeClass('col-md-6').addClass('col-md-12');
	var arr = [
	  {val : "", text: 'Both'},
	  {val : 'inStock', text: 'In Stock'},
	  {val : 'outOfStock', text: 'Out Of Stock'}
	];
	var in_stock_field = $('<select/>',{
		class:'custom-select',
		name:'stock_status',
		
	});

	$(arr).each(function() {
		in_stock_field.append($("<option>").attr('value',this.val).text(this.text));
	});

	var label = $('<label />',{
		class:'ml-4'
	}).html('In Stock: ').append(in_stock_field);

	$('.dataTables_filter').append(label);

	$(document).on('change','select[name="stock_status"]',function(){
		dbtable.draw()
	});
}