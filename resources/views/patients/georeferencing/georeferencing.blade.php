@extends('layouts.app')

@section('title', 'Georeferenciación')

@section('content')

<h3 class="mb-3">Georeferenciación</h3>

<div style="width: 100%; height: 480px" id="mapContainer"></div>

@endsection

@section('custom_js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js" type="text/javascript" ></script>
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

<script type="text/javascript">
$( document ).ready(function() {

// Instantiate a map and platform object:
var platform = new H.service.Platform({
  'apikey': '5mKawERqnzL1KMnNIt4n42gAV8eLomjQPKf5S5AAcZg'
});

// Retrieve the target element for the map:
var targetElement = document.getElementById('mapContainer');

// Get default map types from the platform object:
var defaultLayers = platform.createDefaultLayers();

// Instantiate the map:
var map = new H.Map(
  document.getElementById('mapContainer'),
  defaultLayers.vector.normal.map,
  {
    zoom: 12.7,
    center: { lat: -20.25, lng: -70.1 }
  }
);

// Create the default UI:
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
var ui = H.ui.UI.createDefault(map, defaultLayers, 'es-ES');
var mapSettings = ui.getControl('mapsettings');
var zoom = ui.getControl('zoom');
var scalebar = ui.getControl('scalebar');

//mapSettings.setAlignment('top-left');
//zoom.setAlignment('top-left');
//scalebar.setAlignment('top-left');

@foreach($suspectCases as $key => $case)
  @if($case->pscr_sars_cov_2 == 'positive' || $case->pscr_sars_cov_2 == 'pending')
    @if($case->patient->demographic != null)

      // Define a variable holding SVG mark-up that defines an icon image:
      var svgMarkupBlue = '<svg width="10" height="10" ' +
        'xmlns="http://www.w3.org/2000/svg">' +
        '<rect stroke="white" fill="blue" x="1" y="1" width="22" ' +
        'height="22" /><text x="12" y="18" font-size="12pt" ' +
        'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
        'fill="white"></text></svg>';

      var svgMarkupRed = '<svg width="10" height="10" ' +
        'xmlns="http://www.w3.org/2000/svg">' +
        '<rect stroke="white" fill="red" x="1" y="1" width="22" ' +
        'height="22" /><text x="12" y="18" font-size="12pt" ' +
        'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
        'fill="white"></text></svg>';

      var iconBlue = new H.map.Icon(svgMarkupBlue);
      var iconRed = new H.map.Icon(svgMarkupRed);

      // Create the parameters for the geocoding request:
        var geocodingParams = {
            searchText: '{{$case->patient->demographic->address}}, {{$case->patient->demographic->commune}}, chile'
          };

      // Define a callback function to process the geocoding response:
      var onResult = function(result) {

        var locations = result.Response.View[0].Result,
            position,
            marker;

        // Add a marker for each location found
        for (i = 0;  i < locations.length; i++) {
          position = {
            lat: locations[i].Location.DisplayPosition.Latitude,
            lng: locations[i].Location.DisplayPosition.Longitude
          };

          @if($case->pscr_sars_cov_2 == 'positive')
            marker = new H.map.Marker(position, {icon: iconRed});
          @else
            marker = new H.map.Marker(position, {icon: iconBlue});
          @endif


          map.addObject(marker);
        }

      };

      // Get an instance of the geocoding service:
      var geocoder = platform.getGeocodingService();

      // Error
      geocoder.geocode(geocodingParams, onResult, function(e) {
        alert(e);
      });

      //panTheMap(map);
    @endif
  @endif
@endforeach


function panTheMap(map) {
  var viewPort,
      incX = 1,
      incY = 2,
      x = 100,
      y = 100;

  // Obtain the view port object of the map to manipulate its screen coordinates
  var viewPort = map.getViewPort(),
      // function calculates new screen coordinates and calls
      // viewport's interaction method with them
      pan = function() {
        x = x + incX;
        if (Math.abs(x) > 100) {
          incX = -incX;
        }

        y = y + incY;
        if (Math.abs(y) > 100) {
          incY = -incY;
        }

        viewPort.interaction(x, y);
      };

  // set interaction modifier that provides information which map properties
  // change with each "interact" call
  viewPort.startInteraction(H.map.render.RenderEngine.InteractionModifiers.COORD, 0, 0);
  // set up simple animation loop
  setInterval(pan, 15);
}




});
</script>

@endsection