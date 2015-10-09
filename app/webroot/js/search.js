$(document).ready(function(){
	$('#s').autocomplete({
		minLength: 3,
		select: function(event, ui){
			$('#s').val(ui.item.label);
		},
		source: function(request, response){
			$.ajax({
				url: basePath + 'customers/searchjson',
				data: {
					term: request.term
				},
				dataType: 'json',
				success: function(data){
					response($.map(data, function(el, index){
						return{
							value: el.Customer.first_name,
							name:  el.Customer.first_name
						};
					}));
				}
			});
		}
	}).data('ui-autocomplete')._renderItem = function(ul, item){
		return $('<li></li>')
		.data('item.autocomplete', item)
		.append('<a>' + item.first_name + '</a>')
		.appendTo(ul);
	}
});  