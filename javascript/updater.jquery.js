(function ($) {
	$(document).ready(function () {
		
		var $regionsinput = $(this).find("input[name='State'],input.state_regionaldata");
		$("form #Country.field, form .field.country_regionaldata").each(function () {
			var $countryinput = $(this).find("select[name=Country],select.country_regionaldata");
			$countryinput.on('change', function () {
				var data = {
					'Country' : $(this).val()
				};
				$regionsinput.attr('disabled','disabled');
				//retrieve list of sub-regions
				$.ajax({
					type : "POST",
					url : "RegionalDataAPI/getregions",
					data : data,
					cache : true,
					success : function (response) {
						response = JSON.parse(response);
						if (!response.success || response.regions.length <= 0) {
							replaceRegionInput($('<input />'));
						} else {
							replaceRegionInput(arrayToDropdown(response.regions));
						}
					},
					error : function () {
						replaceRegionInput($('<input />'));
					}
				});
			}).trigger('change');
		});
		
		/**
		 * Create a dropdown from array
		 */
		function arrayToDropdown(data, valfield, labelfield) {
			valfield = valfield || "Name";
			labelfield = labelfield || "Name";
			var s = $('<select />');
			$('<option />').appendTo(s);
			for(var val in data) {
			    $('<option />', {value: data[val][valfield], text: data[val][labelfield]}).appendTo(s);
			}
			return s;
		}
		
		/**
		 * Replace region input field
		 */
		function replaceRegionInput(newinput) {
			old = $regionsinput;
			$regionsinput.replaceWith(newinput);
			$regionsinput = newinput;

			$regionsinput.attr('id', old.attr('id'));
			$regionsinput.attr('name', old.attr('name'));
			$regionsinput.attr('class', old.attr('class'));
			$regionsinput.removeAttr('disabled');
			$regionsinput.val(old.val());
		}
		
	});
})(jQuery);