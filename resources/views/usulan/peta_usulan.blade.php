<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Peta Pesebaran Usulan dan Progress Perbaikan Rutilahu</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Summary</a></li>
                        <li class="breadcrumb-item active"> Peta Rutilahu</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                  
                <div class="card-body">

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
      

      var ibaru = L.icon({
        iconUrl: "{{asset('images/ibaru.png')}}",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
      }); 
      var icek = L.icon({
        iconUrl: "{{asset('images/icek.png')}}",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
      }); 
      var ikerja = L.icon({
        iconUrl: "{{asset('images/ikerja.png')}}",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
      }); 
      var iselesai = L.icon({
        iconUrl: "{{asset('images/iselesai.png')}}",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
      }); 

      @foreach($rs_baru as $r)
        var baru_{{$r->id}}= L.marker([ {{$r->y}} ,{{$r->x}}],{icon:ibaru}).bindPopup("{{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}");
      @endforeach
      var barus = L.layerGroup([
        @foreach($rs_baru as $r)
        baru_{{$r->id}},
        @endforeach
      ]);
      barus.addTo(map);

    @foreach($rs_cek as $r)
        var cek_{{$r->id}}= L.marker([ {{$r->y}} ,{{$r->x}}],{icon:icek}).bindPopup("{{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}");
      @endforeach
      var ceks = L.layerGroup([
        @foreach($rs_cek as $r)
        cek_{{$r->id}},
        @endforeach
      ]);
      ceks.addTo(map);
      
      @foreach($rs_kerja as $r)
        var kerjas_{{$r->id}}= L.marker([ {{$r->y}} ,{{$r->x}}],{icon:ikerja}).bindPopup("{{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}");
      @endforeach
      var kejas = L.layerGroup([
        @foreach($rs_kerja as $r)
        kerja_{{$r->id}},
        @endforeach
      ]);
      kerjas.addTo(map);

      @foreach($rs_selesai as $r)
        var selesai_{{$r->id}}= L.marker([ {{$r->y}} ,{{$r->x}}],{icon:iselesai}).bindPopup("{{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}");
      @endforeach
      var selesais = L.layerGroup([
        @foreach($rs_selesai as $r)
        selesai_{{$r->id}},
        @endforeach
      ]);
      selesais.addTo(map);
    
 	  var overlayMaps={     
       "Usulan Baru":barus,
       "Usulan Diproses":ceks,
       "Dalam Pengerjaan":kerjas,
       "Selesai":selesais
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


      
    </script>
  


                </div>
            </div>
        </div>
        
        
    </div>
    <!-- end row -->
</div>
