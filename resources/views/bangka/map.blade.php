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
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css" integrity="sha512-vJfMKRRm4c4UupyPwGUZI8U651mSzbmmPgR3sdE3LcwBPsdGeARvUM5EcSTg34DK8YIRiIo+oJwNfZPMKEQyug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css">
      <link rel="stylesheet" href="{{ asset('leaflet/js/MarkerCluster.css') }}">
      <link rel="stylesheet" href="{{ asset('leaflet/js/MarkerCluster.Default.css') }}">
      <link rel="stylesheet" href="{{ asset('bahan/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.css') }}">
      <link rel="stylesheet" href="{{ asset('leaflet/miniMap/Control.MiniMap.min.css') }}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css" integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('leaflet/mouseCoordinate/Leaflet.Coordinates-0.1.5.css') }}"/>     
      <link rel="stylesheet" href="{{ asset('leaflet/mouseCoordinate/Leaflet.Coordinates-0.1.5.css') }}"/>
      
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

 <!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>

        <script src="{{ asset('leaflet/js/leaflet.textpath.js') }}"></script>
      <script src="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.js"></script>
      <script src="{{ asset('leaflet/js/leaflet.markercluster.js') }}"></script>
      <script src="{{ asset('leaflet/miniMap/Control.MiniMap.min.js') }}"></script> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script> 
        <script src="{{ asset('bahan/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js') }}"></script> 
        <script src="{{ asset('leaflet/miniMap/Control.MiniMap.min.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js" integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous"></script>
      <script src="{{ asset('leaflet/hash/leaflet-hash.js') }}"></script>
      <script type="text/javascript" src="{{ asset('leaflet/mouseCoordinate/Leaflet.Coordinates-0.1.5.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('leaflet/mouseCoordinate/Leaflet.Coordinates-0.1.5.min.js') }}"></script>
      {{-- <script src="{{ asset('js/app.js') }}"></script>  --}}
      <script src="{{ asset('bahan/assets/js/apps.js') }}"></script>
      
<script>
var map, lyr_pantai;

map = L.map('mapid', {zoomControl:false}).setView([{{ config('leafletbangka.map_center_latitude') }},
    {{ config('leafletbangka.map_center_longitude') }}],
    {{ config('leafletbangka.zoom_level') }});

    // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    // }).addTo(map);

    L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);



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

  $(document).ready(function() {
            $.getJSON('api/bangka', function(json) {
                  console.log(json);
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

    $(document).ready(function() {
      $.getJSON('bahan/data/map1.geojson', function(json) {
                
        L.geoJSON(json,{
                      pointToLayer: function(geoJsonPoint,latlng) {
                          return L.marker(latlng);
                      }
        })
          .bindPopup(function(layer) {
                      //return layer.feature.properties.map_popup_content;
                      return ('<div class="my-2"><strong>Place Name</strong> :<br>'+layer.feature.properties.NAME+'</div> <div class="my-2"><strong>Description</strong>:<br>'+layer.feature.properties.ADDRESS+'</div><div class="my-2"><strong>Address</strong>:<br>'+layer.feature.properties.CITY+'</div><div><img style="width:100px;" src="storage/gambar/'+layer.feature.properties.GAMBAR+'"></div>');
        }).addTo(map);

      });

    });

    //Hash
    var hash = new L.Hash(map);
    //mouse coordinate
    L.control.coordinates({
			position:"bottomleft",
			decimals:2,
			decimalSeperator:",",
			labelTemplateLat:"Latitude: {y}",
			labelTemplateLng:"Longitude: {x}"
	}).addTo(map);

        
    //legend
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'legend');
    labels = ['<strong>Keterangan :</strong><br>'],
    categories = ['Pantai','Penginapan','Instasi Pemerintah'];
    for (var i = 0; i < categories.length; i++) {
        if (i==0) {
            div.innerHTML += 
            labels.push( 
                '<img width="23" height="23" src="leaflet/image/beach.png"><i class="circle" style="background:#000000"></i> ' +
            (categories[i] ? categories[i] : '+'));
        } else if (i==1) {
            div.innerHTML += 
              labels.push( 
                  '<img width="23" height="23" src="leaflet/image/residence.png"><i class="circle" style="background:#000000"></i> ' +
              (categories[i] ? categories[i] : '+'));
        } else {
            div.innerHTML += 
                labels.push( 
                    '<img width="23" height="23" src="leaflet/image/pemerintah.png"><i class="circle" style="background:#000000"></i> ' +
                (categories[i] ? categories[i] : '+'));
          }
    }
        div.innerHTML = labels.join('<br>');
    return div;
    };
    legend.addTo(map);

    
    let petaToMiniMap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
    })
    var miniMap = new L.Control.MiniMap(petaToMiniMap, {
      toggleDisplay:true,
      minimized: true
    }).addTo(map);

   
    var editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);
    
    var MyCustomMarker = L.Icon.extend({
        options: {
            shadowUrl: null,
            iconAnchor: new L.Point(12, 12),
            iconSize: new L.Point(32, 32),
            iconUrl: 'leaflet/image/info.png'
        }
    });
    
    var options = {
        position: 'topright',
        draw: {
            polyline: false,
            
            // {
            //     shapeOptions: {
            //         color: '#f357a1',
            //         weight: 10
            //     }
            // },
            polygon: {
                allowIntersection: false, // Restricts shapes to simple polygons
                drawError: {
                    color: '#e1e100', // Color the shape will turn when intersects
                    message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                },
                shapeOptions: {
                    color: '#bada55'
                }
            },
            circle: false, // Turns off this drawing tool
            rectangle: false,
            // {
            //     shapeOptions: {
            //         clickable: false
            //     }
            // },
            marker: {
                icon: new MyCustomMarker()
            }
        },
        edit: {
            featureGroup: editableLayers, //REQUIRED!!
            remove: true
        }
    };
    
    var drawControl = new L.Control.Draw(options);
    map.addControl(drawControl);
    
    map.on(L.Draw.Event.CREATED, function (e) {
        var type = e.layerType,
            layer = e.layer;
    
        if (type === 'marker') {
            layer.bindPopup('A popup!');
        }
    
        editableLayers.addLayer(layer);
    });

    L.control.ruler({
      position: 'topright',
      lengthUnit:{
        display: 'km', 
        decimal: 2,
        factor: null,
        label: 'Jarak:'
      },
      angleUnit: {
        display: '&deg;',
        label: 'Kemiringan:'
      }
      
    }).addTo(map);

    L.control.zoom({
        position: 'topright'
    }).addTo(map);


    // * GPS enabled geolocation control set to follow the user's location */
  var locateControl = L.control.locate({
    position: "bottomright",
    drawCircle: true,
    follow: true,
    setView: true,
    keepCurrentZoomLevel: true,
    markerStyle: {
      weight: 1,
      opacity: 0.8,
      fillOpacity: 0.8
    },
    circleStyle: {
      weight: 1,
      clickable: false
    },
    icon: "fa fa-location-arrow",
    metric: false,
    strings: {
      title: "My location",
      popup: "You are within {distance} {unit} from this point",
      outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
    },
    locateOptions: {
      maxZoom: 18,
      watch: true,
      enableHighAccuracy: true,
      maximumAge: 10000,
      timeout: 10000
    }
  }).addTo(map);
    
    
</script>
@endpush