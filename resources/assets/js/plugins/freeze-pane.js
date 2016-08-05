(function($) {

    var $table = false;

	$.fn.binus_freeze_pane = function($options) {

		var $settings = $.extend({
			fixed_left 		: 0,
			fixed_right 	: 0,
			height 			: 300,
			on_window_load 	: false,
			paging 			: true,
			ordering 		: true,
			bFilter 		: true,
			info 			: true,
			scrollY 		: true,
			scrollX 		: true,
			ajax			: false
		}, $options);

		return $(this).each(function($index, $object) {
			if ($(this).data('has-init') == 'yes' && $settings.ajax == false)
				return;
			__create_element(this);
		});

		function __create_element($element) {
			var $object = $($element);

			if ($object.parents('.popup').length > 0) {
				__init_element($object);
				return;
			}

			if ($settings.on_window_load) {
				$(window).load(function() {
					__init_element($object);
				});
			} else {
				__init_element($object);
			}
		}

		function __init_element($object) {
			var $fixed_columns_left = $settings.fixed_left;
			var $fixed_columns_right = $settings.fixed_right;
			var $freeze_height = $settings.height;

			if ($table) {
			     $table.destroy();
			}

            $table = $object.find('table').DataTable({
				paging 		: $settings.paging,
				ordering 	: $settings.ordering,
				bFilter 	: $settings.bFilter,
				info 		: $settings.info,
				scrollY 	: $settings.scrollY ? $settings.height + 'px' : false,
				scrollX 	: $settings.scrollX
			});

			var $result = new $.fn.dataTable.FixedColumns($table, {
				leftColumns: $fixed_columns_left,
				rightColumns: $fixed_columns_right
			});

			$object.data('has-init', 'yes');
		}

	}

})(jQuery);