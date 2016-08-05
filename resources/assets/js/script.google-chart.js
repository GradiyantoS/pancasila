/* Google Chart Function */
google.load('visualization', '1', {packages: ['corechart']});

function google_chart($element, $type, $data, $options) {
	var $google_chart = '';
	var $data_table   = google.visualization.arrayToDataTable($data);

	if ($type == 'combochart') {
		$chart = new google.visualization.ComboChart($element[0]);
	} else if ($type == 'piechart') {
		$chart = new google.visualization.PieChart($element[0]);
	}
	$chart.draw($data_table, $options);
}

/* Implementation */
(function($) {

    /* Google Chart as a jQuery Plugin */
    $.fn.binus_google_chart = function($type, $data, $options) {
        return $(this).each(function($index, $object) {
			var $object  = $(this);
			google_chart($object, $type, $data, $options);
		});
    };

    $(document).ready(function() {

        // google chart init
		$('#google-combochart').binus_google_chart('combochart', [
			['Year', 'Major', 'Minor', 'Observasi', 'OFI'],
			['2011', 80, 60, 90, 40],
			['2012', 80, 60, 90, 40],
			['2013', 80, 60, 90, 40],
			['2014', 80, 60, 90, 40]
		], {
			title : '',
			legend: {
				alignment: 'start',
				position: 'bottom',
				textStyle: {
					color: '#919191',
					fontSize: 12,
					fontName: 'Open Sans'
				}
			},
			seriesType: 'bars',
			colors: ['#044b69', '#007fc4', '#4dc8f4', '#a2d8f0'],
			height: 240,
			chartArea: {
				top: 20,
				height: 115
			}
		});

        $('#google-piechart').binus_google_chart('piechart', [
			['Status', 'Audit'],
			['Done', 100],
			['Awaiting Confirmation', 60],
			['Cancel', 30]
		], {
			pieHole: 0.4,
			pieSliceText: 'none',
			legend: {
				alignment: 'center',
				position: 'bottom',
				textStyle: {
					color: '#919191',
					fontSize: 12,
					fontName: 'Open Sans'
				}
			},
			colors: ['#74b71b', '#f2ae33', '#d12f2e'],
			chartArea: {
				top: 20,
				height: 115
			}
		});

    });

})(jQuery);