$(document).ready(function (){
	initDatatable({
		order: [[ 3, "desc" ]],
		ajax:{
			headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            url: $('.datatable').data('url'),
			method:'POST',
			data: function ( d ) {
				return $.extend( {}, d, {
			        "orderBy": $('select[name="order"]').val()
			     });
		    }
		},
		columns: [
			
			{data: 'name',orderable : false,name:'customer.name'},
			{data: 'total_amount',orderable : false,searchable: false},
			{data: 'status', orderable : false, searchable: false},
			{data: 'created_at',visible:false,searchable: false},
			{data: 'customer',visible:false,orderable : false,searchable: false,name:'customer.id'},
			{data: 'id',visible:false,orderable : false,searchable: false},
		]
	});
	
	initOrderByFilter();
	orderDetails();
});

var initOrderByFilter = function(){
	$('.dataTables_filter').addClass('float-left');
	$('.dataTables_filter').parent().removeClass('col-md-6').addClass('col-md-12');
	var arr = [
	  {val : "", text: 'Order Date'},
	  {val : 'latest', text: 'Recent Orders', selected:true},
	  {val : 'oldest', text: 'Oldest Orders'}
	];
	var in_stock_field = $('<select/>',{
		class:'custom-select',
		name:'order',
		
	});

	$(arr).each(function() {
		var optionH = $("<option>").attr('value',this.val).text(this.text);
		if(typeof this.selected != 'undefined' && this.selected)
			optionH.attr('selected','selected');
		in_stock_field.append(optionH);
	});

	var label = $('<label />',{
		class:'ml-4'
	}).html('Order By: ').append(in_stock_field);

	$('.dataTables_filter').append(label);

	$(document).on('change','select[name="order"]',function(){
		dbtable.draw()
	});
}

var orderDetails = function(){
	$('.datatable tbody').on('click', 'tr', function () {
        var data = dbtable.row( this ).data();
       	window.open('/order/'+data.id+'/items');
    } );
}