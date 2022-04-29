
                
    Tentukan X,Y lokasi rumah dengan alamat:
    {{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}<br><br>
    <div class="row">
        
        <div class="col-md-10">X=<input class="form-control"
        style="display:inline;width: 150px;0px" id="new_x" value="{{$r->x}}">
        &nbsp;&nbsp;&nbsp;&nbsp;Y=<input class="form-control"
        style="display:inline;width:150px" id="new_y" value="{{$r->y}}">
        <button style="display:inline;width:100px" class="btn btn-info"
        data-bs-dismiss="modal"
        onclick="update_xy('{{csrf_token()}}',{{$r->id}})"
        >Simpan</button></div>
        
     </div>
    </div>
    <div id="map" style="height: 500px"></div>
    <script type="text/javascript">
        L.Map = L.Map.extend({
 	        openPopup: function (popup, latlng, options) { 
          if (!(popup instanceof L.Popup)) {
          var content = popup;
        
          popup = new L.Popup(options).setContent(content);
        }
        
        if (latlng) {
          popup.setLatLng(latlng);
        }
        
        if (this.hasLayer(popup)) {
          return this;
        }
        
        //this.closePopup();
        this._popup = popup;
        return this.addLayer(popup);        
    }
});

      var map = new L.Map('map', { zoomsliderControl: true, zoomControl: false }).setView([-7.281946 ,112.738093], 12);
      var osm=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});
      osm.addTo(map);     

      var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
      });
  
      var ubaya= L.marker([ {{$r->y}} ,{{$r->x}}]).bindPopup("{{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}");
      ubaya.addTo(map);

 var myIcon = L.icon({
    iconUrl: 'icons/libraries.png',
    iconSize: [30, 40],
    iconAnchor: [15, 40],
 }); 


 	  var overlayMaps={     
       "Posisi Rumah":ubaya,
  	   }	

      var baseMaps = {
      "OpenStreetMap": osm,
      "Google Street":googleStreets,
      "Google Satellite": googleSat,
      "google Hybrid":googleHybrid,
    };
    
    L.control.layers(baseMaps,overlayMaps).addTo(map);

    var ctEasybtn=L.easyButton(' <span>&target;</span>',
     function() {
       map.locate({setView : true})
     });
     ctEasybtn.addTo(map);

     map.on('locationfound', function(e){
       L.circle(e.latlng,{radius:e.accuracy/2}).addTo(map)
       L.circleMarker(e.latlng).addTo(map)
      });


      map.on('click', function(e) {
          //alert(e.latlng.lng);
        console.log(e.latlng.lat,e.latlng.lng);
        $('#new_x').val(e.latlng.lng);
        $('#new_y').val(e.latlng.lat);
        ubaya.setLatLng(e.latlng)
      });
  //var c = 
    </script>
  