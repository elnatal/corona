@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-cellphone-android"></i>
        </span> Heat map </h3>
    </div>

    <div id="map" style="min-height: 70vh"></div>
</div>

@section('script')

<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/heatmap.js') }}"></script>
<script src="{{ asset('js/leaflet-heatmap.js') }}"></script>

<script>
    window.onload = function() {

        var contacts = {!! json_encode($contacts->toArray()) !!};
        console.log(contacts);

        var contactData = [];

        // @foreach ($contacts as $contact)
        //     contactData.push({'lat': '{{ $contact->lat }}', 'lng': '{{ $contact->long }}', 'count': 1});
        // @endforeach

        contacts.forEach(contact => {
            contactData.push({'lat': contact['lat'], 'lng': contact['long'], 'count': 1});
        });
        console.log(contactData);

      var testData = {
        max: 1,
        data: contactData
      };

      var baseLayer = L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
          attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
          maxZoom: 18
        }
      );

      var cfg = {
        // radius should be small ONLY if scaleRadius is true (or small radius is intended)
        "radius": .007,
        "maxOpacity": .8, 
        // scales the radius based on map zoom
        "scaleRadius": true, 
        // if set to false the heatmap uses the global maximum for colorization
        // if activated: uses the data maximum within the current map boundaries 
        //   (there will always be a red spot with useLocalExtremas true)
        "useLocalExtrema": true,
        // which field name in your data represents the latitude - default "lat"
        latField: 'lat',
        // which field name in your data represents the longitude - default "lng"
        lngField: 'lng',
        // which field name in your data represents the data value - default "value"
        valueField: 'count'
      };


      var heatmapLayer = new HeatmapOverlay(cfg);

      var map = new L.Map('map', {
        center: new L.LatLng(9.005401, 38.763611),
        zoom: 12,
        layers: [baseLayer, heatmapLayer]
      });

      heatmapLayer.setData(testData);

      // make accessible for debugging
      layer = heatmapLayer;
    };
  </script>
@endsection
@endsection