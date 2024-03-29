 <?php
/**
 * Main cluster js file.
 * 
 * Server Side Map Clustering
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>
		
// Initialize the Ushahidi namespace
Ushahidi.baseURL = "<?php echo url::site(); ?>";
Ushahidi.markerRadius = <?php echo $marker_radius; ?>;
Ushahidi.markerOpacity = <?php echo $marker_opacity; ?>;
Ushahidi.markerStokeWidth = <?php echo $marker_stroke_width; ?>;
Ushahidi.markerStrokeOpacity = <?php echo $marker_stroke_opacity; ?>;

// Default to most active month
var startTime = <?php echo $active_startDate ?>;

// Default to most active month
var endTime = <?php echo $active_endDate ?>;

// To hold the Ushahidi.Map reference
var map = null;


/**
 * Toggle Layer Switchers
 */
function toggleLayer(link, layer) {
	if ($("#"+link).text() == "<?php echo Kohana::lang('ui_main.show'); ?>")
	{
		$("#"+link).text("<?php echo Kohana::lang('ui_main.hide'); ?>");
	}
	else
	{
		$("#"+link).text("<?php echo Kohana::lang('ui_main.show'); ?>");
	}
	$('#'+layer).toggle(500);
}

/**
 * Create a function that calculates the smart columns
 */
function smartColumns() {
	//Reset column size to a 100% once view port has been adjusted
	$("ul.content-column").css({ 'width' : "100%"});

	//Get the width of row
	var colWrap = $("ul.content-column").width();

	// Find how many columns of 200px can fit per row / then round it down to a whole number
	var colNum = <?php echo $blocks_per_row; ?>;

	// Get the width of the row and divide it by the number of columns it 
	// can fit / then round it down to a whole number. This value will be
	// the exact width of the re-adjusted column
	var colFixed = Math.floor(colWrap / colNum);

	// Set exact width of row in pixels instead of using % - Prevents
	// cross-browser bugs that appear in certain view port resolutions.
	$("ul.content-column").css({ 'width' : colWrap});

	// Set exact width of the re-adjusted column	
	$("ul.content-column li").css({ 'width' : colFixed});
}

/**
 * Callback function for rendering the timeline
 */
function refreshTimeline(options) {

	<?php if (Kohana::config('settings.enable_timeline')) {?>

	// Use report filters if no options passed
	options = options || map.getReportFilters();
	// Copy options object to avoid accidental modifications to reportFilters
	options = jQuery.extend({}, options);

	var url = "<?php echo url::site().'json/timeline/'; ?>";

	var interval = (options.e - options.s) / (3600 * 24);

	if (interval <= 3) {
		options.i = "hour";
	} else if (interval <= (31 * 6)) {
		options.i = "day";
	} else {
		options.i = "month";
	}

	// Get the graph data
	$.ajax({
		url: url,
		data: options,
		success: function(response) {
			// Clear out the any existing plots
			$("#graph").html('');

			if (response != null && response[0].data.length < 2)
				return;

			var graphData = [];
			var raw = response[0].data;
			for (var i=0; i<raw.length; i++) {
				var date = new Date(raw[i][0]);

				var dateStr = date.getFullYear() + "-";
				dateStr += ('0' + (date.getMonth()+1)).slice(-2) + '-';
				dateStr += ('0' + date.getDate()).slice(-2);

				graphData.push([dateStr, parseInt(raw[i][1])]);
			}
			var timeline = $.jqplot('graph', [graphData], {
				seriesDefaults: {
					color: response[0].color,
					lineWidth: 1.6,
					markerOptions: {
						show: false
					}
				},
				axesDefaults: {
					pad: 1.23,
				},
				axes: {
					xaxis: {
						renderer: $.jqplot.DateAxisRenderer,
						tickOptions: {
							formatString: '%#d&nbsp;%b\n%Y'
						}
					},
					yaxis: {
						min: 0,
						tickOptions: {
							formatString: '%.0f'
						}
					}
				},
				cursor: {show: false}
			});
		},
		dataType: "json"
	});
	<?php }?>
}

/**
 * Callback function for rendering the heatmap layer.
 * This function has been taken from David Kobia's
 * heatmap plugin and has been modified to javascript
 */
function refreshHeatmap(url, callback) {
	var heatmapData = [];
	
	// Get the JSON file from the URL
	$.getJSON(url, function(jsonData) {
		
		// Reads through the JSON and stores the latitude, longitude, and count
		jsonData.features.forEach(function(childData){
			
			// Add the data when it is empty
			if(heatmapData.length == 0) {
				heatmapData.push({
					lon: Math.round((childData.geometry.coordinates[0] * 1000))/1000,
					lat: Math.round((childData.geometry.coordinates[1] * 1000))/1000,
					count: 1
				});
			} else {
				// Increase the count if latitude and longitude is equal
				for(var j = 0; j < heatmapData.length; j++){
					if(Math.round((childData.geometry.coordinates[0] * 1000))/1000 == heatmapData[j].lon &&
					   Math.round((childData.geometry.coordinates[1] * 1000))/1000 == heatmapData[j].lat){
					   	heatmapData[j].count += 1;
					   	return;
					}
				}
				
				// Add the data if the coordinates does not match
				heatmapData.push({
					lon: Math.round((childData.geometry.coordinates[0] * 1000))/1000,
					lat: Math.round((childData.geometry.coordinates[1] * 1000))/1000,
					count: 1
				});
			}
		});
		// Returns back the heatmap data
		callback(heatmapData);
	});
}

jQuery(function() {
	var reportsURL = "<?php echo Kohana::config('settings.allow_clustering') == 1 ? "json/cluster" : "json"; ?>";

	var allowHeatmap = "<?php echo Kohana::config('settings.allow_heatmap') == 1 ? true : false; ?>";
	
	// Render thee JavaScript for the base layers so that
	// they are accessible by Ushahidi.js
	<?php echo map::layers_js(FALSE); ?>
	
	// Map configuration
	var config = {

		// Zoom level at which to display the map
		zoom: <?php echo Kohana::config('settings.default_zoom'); ?>,

		// Redraw the layers when the zoom level changes
		redrawOnZoom: <?php echo Kohana::config('settings.allow_clustering') == 1 ? "true" : "false"; ?>,

		// Center of the map
		center: {
			latitude: <?php echo Kohana::config('settings.default_lat'); ?>,
			longitude: <?php echo Kohana::config('settings.default_lon'); ?>
		},

		// Map controls
		mapControls: [
			new OpenLayers.Control.Navigation({ dragPanOptions: { enableKinetic: true } }),
			new OpenLayers.Control.Attribution(),
			new OpenLayers.Control.Zoom(),
			new OpenLayers.Control.MousePosition({
				div: document.getElementById('mapMousePosition'),
				formatOutput: Ushahidi.convertLongLat
			}),
			new OpenLayers.Control.Scale('mapScale'),
			new OpenLayers.Control.ScaleLine(),
			new OpenLayers.Control.LayerSwitcher()
		],

		// Base layers
		baseLayers: <?php echo map::layers_array(FALSE); ?>,

		// Display the map projection
		showProjection: true,
		
		reportFilters: {
			s: startTime,
			e: endTime
		}

	};

	// Initialize the map
	map = new Ushahidi.Map('map', config);
	map.addLayer(Ushahidi.GEOJSON, {
		name: "<?php echo Kohana::lang('ui_main.reports'); ?>",
		url: reportsURL,
		transform: false
	}, true, true);

	if(allowHeatmap == true)
	{
		// Add the heatmap layer onto the map
		map.addLayer(Ushahidi.HEATMAP, {
			name: Ushahidi.HEATMAP,
			url: "json",
			hmapoptions: {visible: true, radius: 10},
			otheroptions: {isBaseLayer: false, opacity: 0.3, projection: Ushahidi.proj_4326}
		}, true, true);
	}

	// Register the referesh timeline function as a callback
	map.register("filterschanged", refreshTimeline);
	setTimeout(function() { refreshTimeline({
		s: startTime,
		e: endTime
	}); }, 800);

	// Category Switch Action
	$("ul#category_switch li > a").click(function(e) {
		var categoryId = this.id.substring(4);
		var catSet = 'cat_' + this.id.substring(4);

		// Remove All active
		$("a[id^='cat_']").removeClass("active");
		
		// Hide All Children DIV
		$("[id^='child_']").hide();

		// Add Highlight
		$("#cat_" + categoryId).addClass("active"); 

		// Show children DIV
		$("#child_" + categoryId).show();
		$(this).parents("div").show();
		
		// Update report filters
		map.updateReportFilters({c: categoryId});
		
		e.stopPropagation();
		return false;
	});

	// Layer selection
	$("ul#kml_switch li > a").click(function(e) {
		// Get the layer id
		var layerId = this.id.substring(6);

		var isCurrentLayer = false;
		var context = this;

		// Remove all actively selected layers
		$("#kml_switch a").each(function(i) {
			if ($(this).hasClass("active")) {
				if (this.id == context.id) {
					isCurrentLayer = true;
				}
				map.trigger("deletelayer", $(".layer-name", this).html());
				$(this).removeClass("active");
			}
		});

		// Was a different layer selected?
		if (!isCurrentLayer) {
			// Set the currently selected layer as the active one
			$(this).addClass("active");
			map.addLayer(Ushahidi.KML, {
				name: $(".layer-name", this).html(),
				url: "json/layer/" + layerId
			});
		}

		return false;
	});
		
	// Timeslider and date change actions
	$("select#startDate, select#endDate").selectToUISlider({
		labels: 4,
		labelSrc: 'text',
		sliderOptions: {
			change: function(e, ui) {
				var from = $("#startDate").val();
				var to = $("#endDate").val();

				if (to > from && (from != startTime || to != endTime)) {
					// Update the report filters
					startTime = from;
					endTime = to;
					map.updateReportFilters({s: from, e: to});
				}

				e.stopPropagation();
			}
		}
	});
	
	// Media Filter Action
	$('.filters a').click(function() {
		var mediaType = parseFloat(this.id.replace('media_', '')) || 0;
		
		$('.filters a.active').removeClass('active');
		$(this).addClass('active');

		// Update the report filters
		map.updateReportFilters({m: mediaType});
		
		return false;
	});
	
	//Execute the function when page loads
	smartColumns();

});

$(window).resize(function () { 
	//Each time the viewport is adjusted/resized, execute the function
	smartColumns();
});
