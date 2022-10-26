@extends('template')

@section('content')

<div id="container">
    <div>
        {{-- <div class="form-group">
            <input type="text" name="" id="textsearch" placeholder="search place here..." class="form-control">
        </div> --}}

        <div id="sidebar">
            <div class="sidebar-wrapper">
              <div class="panel panel-default" id="features">
                <div class="panel-heading">
                  <h3 class="panel-title">Points of Interest
                  <button type="button" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                      <input type="text" class="form-control search" placeholder="Filter" />
                    </div>
                    <div class="col-xs-4 col-md-4">
                      <button type="button" class="btn btn-primary pull-right sort" data-sort="feature-name" id="sort-btn"><i class="fa fa-sort"></i>&nbsp;&nbsp;Sort</button>
                    </div>
                  </div>
                </div>
                <div class="sidebar-table">
                  <table class="table table-hover" id="feature-list">
                    <thead class="hidden">
                      <tr>
                        <th>Icon</th>
                      <tr>
                      <tr>
                        <th>Name</th>
                      <tr>
                      <tr>
                        <th>Chevron</th>
                      <tr>
                    </thead>
                    <tbody class="list"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        <div id="mapid">
            <div class="card">
                <div class="card-body"></div>
                <x:notify-messages />
            </div>
        </div>
    </div>
</div>

{{-- //about --}}
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exbn" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exbn">Welcome to the BootLeaf template!</h4>

          <div class="modal-body">
            <ul class="nav nav-tabs nav-justified" id="aboutTabs">
                  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-question-circle"></i>&nbsp;About the project</a></li>
                  <li><a href="#disclaimer" data-toggle="tab"><i class="fa fa-exclamation-circle"></i>&nbsp;Disclaimer</a></li>
            </ul>
            <div class="tab-content" id="aboutTabsContent">
                  <div class="tab-pane fade active in" id="about">
                    <p>A simple, responsive template for building web mapping applications with <a href="http://getbootstrap.com/">Bootstrap 3</a>, <a href="http://leafletjs.com/" target="_blank">Leaflet</a>, and <a href="http://twitter.github.io/typeahead.js/" target="_blank">typeahead.js</a>. MIT licensed, and available on <a href="https://github.com/novriamsyah" target="_blank">GitHub</a>.</p>
                        <div class="panel panel-primary">
                          <div class="panel-heading">Features</div>
                          <ul class="list-group">
                            <li class="list-group-item">Fullscreen mobile-friendly map template with responsive navbar and modal placeholders</li>
                            <li class="list-group-item">jQuery loading of external GeoJSON files</li>
                            <li class="list-group-item">Logical multiple layer marker clustering via the <a href="https://github.com/Leaflet/Leaflet.markercluster" target="_blank">leaflet marker cluster plugin</a></li>
                            <li class="list-group-item">Elegant client-side multi-layer feature search with autocomplete using <a href="http://twitter.github.io/typeahead.js/" target="_blank">typeahead.js</a></li>
                            <li class="list-group-item">Responsive sidebar feature list synced with map bounds, which includes sorting and filtering via <a href="http://listjs.com/" target="_blank">list.js</a></li>
                            <li class="list-group-item">Marker icons included in grouped layer control via the <a href="https://github.com/ismyrnow/Leaflet.groupedlayercontrol" target="_blank">grouped layer control plugin</a></li>
                          </ul>
                        </div>
                  </div>
              <div id="disclaimer" class="tab-pane fade text-danger">
                <p>The data provided on this site is for informational and planning purposes only.</p>
                <p>Absolutely no accuracy or completeness guarantee is implied or intended. All information on this map is subject to such variations and corrections as might result from a complete title search and/or accurate field survey.</p>
              </div>
            </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('styles')
<!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
    <link rel="stylesheet" href="{{ asset('bahan/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.css') }}">
    <link rel="stylesheet" href="{{ asset('bahan/assets/css/app.css') }}">

     
    <style>
      #mapid { 
         min-height: 610px;

     }
      .legend{
          background: #ffffff;
          padding: 10px;
          margin: 10px;
          border: 1px #000 solid;
       }
       .legend img{
           display: inline-block;
           padding: 2px
       }
    </style>
@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.5/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
    <script src="{{ asset('bahan/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js') }}"></script>
    <script src="{{ asset('bahan/assets/js/apps.js') }}"></script> 

      
<script>
var map, pantaiSearch = [];

    // axios.get('{{ route('api.bangka.index') }}')
    // .then(function (response) {
    //     // console.log(response.data);
    //     L.geoJSON(response.data,{
    //         pointToLayer: function(geoJsonPoint,latlng) {
    //             return L.marker(latlng);
    //         }
    //     })
    //     .bindPopup(function(layer) {
    //         //return layer.feature.properties.map_popup_content;
    //         return ('<div class="my-2"><strong>Place Name</strong> :<br>'+layer.feature.properties.place_name+'</div> <div class="my-2"><strong>Description</strong>:<br>'+layer.feature.properties.description+'</div><div class="my-2"><strong>Address</strong>:<br>'+layer.feature.properties.address+'</div><div><img style="width:100px;" src="storage/gambar/'+layer.feature.properties.image+'"></div>');
    //     }).addTo(map);
    //     // console.log(response.data);
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });

  //   var updateChart_dy = function() {
  //   $.ajax({
  //     type: "GET",
  //     dataType: "json",
  //     url: '{{ route('api.bangka.index') }}',
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     },
  //     success: function(data) {
  //       L.geoJSON(data,{
  //           pointToLayer: function(geoJsonPoint,latlng) {
  //               return L.marker(latlng);
  //           }
  //       })
  //       .bindPopup(function(layer) {
  //           //return layer.feature.properties.map_popup_content;
  //           return ('<div class="my-2"><strong>Place Name</strong> :<br>'+layer.feature.properties.place_name+'</div> <div class="my-2"><strong>Description</strong>:<br>'+layer.feature.properties.description+'</div><div class="my-2"><strong>Address</strong>:<br>'+layer.feature.properties.address+'</div><div><img style="width:100px;" src="storage/gambar/'+layer.feature.properties.image+'"></div>');
  //       }).addTo(map);
  //     },
  //     error: function(data){
  //       console.log(data);
  //     }
  //   });
  // }
  // updateChart_dy();
  // setInterval(() => {
  //   updateChart_dy();
  // }, 1000);

  function sidebarClick(id) {
  var layer = markerClusters.getLayer(id);
  map.setView([layer.getLatLng().lat, layer.getLatLng().lng], 17);
  layer.fire("click");
  /* Hide sidebar and go to the map on small screens */
  if (document.body.clientWidth <= 767) {
    $("#sidebar").hide();
    map.invalidateSize();
  }
}

  $(document).ready(function() {
            $.getJSON('{{ route('api.bangka.index') }}', function(data) {
                  // console.log(data);
                  L.geoJSON(data,{
                      pointToLayer: function(geoJsonPoint,latlng) {
                          return L.marker(latlng);
                      }
                  })
                  .bindPopup(function(layer) {
                      //return layer.feature.properties.map_popup_content;
                      return ('<div class="my-2"><strong>Place Name</strong> :<br>'+layer.feature.properties.place_name+'</div> <div class="my-2"><strong>Description</strong>:<br>'+layer.feature.properties.description+'</div><div class="my-2"><strong>Address</strong>:<br>'+layer.feature.properties.address+'</div><div><img style="width:100px;" src="storage/gambar/'+layer.feature.properties.image+'"></div>');
                  }).addTo(map);
                      
            });
    });

    /* Single marker cluster layer to hold all clusters */
    var markerClusters = new L.MarkerClusterGroup({
      spiderfyOnMaxZoom: true,
      showCoverageOnHover: false,
      zoomToBoundsOnClick: true,
      disableClusteringAtZoom: 16
    });


    


      /* Layer control listeners that allow for a single markerClusters layer */
      map.on("overlayadd", function(e) {
        if (e.layer === pantaiLayer) {
          markerClusters.addLayer(pantais);
          syncSidebar();
        }
      });

      map.on("overlayremove", function(e) {
        if (e.layer === pantaiLayer) {
          markerClusters.removeLayer(pantais);
          syncSidebar();
        }
      });

      /* Filter sidebar feature list to only show features in current map bounds */
      map.on("moveend", function (e) {
        syncSidebar();
      });
   
      /* Larger screens get expanded layer control and visible sidebar */
      if (document.body.clientWidth <= 767) {
        var isCollapsed = true;
      } else {
        var isCollapsed = false;
      }


      var groupedOverlays = {
        "Points of Interest": {
          "<img src='bahan/assets/img/theater.png' width='24' height='28'>&nbsp;Theaters": pantaiLayer
        }
      };

      var layerControl = L.control.groupedLayers(groupedOverlays, {
        collapsed: isCollapsed
      }).addTo(map);

   
    
    
</script>
@endpush