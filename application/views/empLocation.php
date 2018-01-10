<?php include 'partials/header.php' ?>
<style>
   .table tr td{
       margin-left:100px;
   }
</style>

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Places Searchbox</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mapstyle.css">
<!--        <script src="--><?php //echo base_url();?><!--assets/js/searchByPlaces.js"></script>-->



    <div class="container-fluid">

        <h2>Employee Tracking</h2>
        <div>
            <table>
                <tr>
                    <td>
                        Enter The Employee ID:-
                    </td>


                    <td>

                        <select id ="type">

                            <option value="deshan Perera">deshan Perera</option>
                            <option value="sherlock">sherlock</option>
                           
                        </select>
                    </td>
                    <td>
                        <button id="search-by-selection" onclick="getMarker()">Search</button>
                    </td>
                </tr>
                <table>
        </div>



        <div id="map">
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDccLlV_rbSEOElJchCKxcP8ayVoatGNFc&libraries=places&callback"
                    async defer>

            </script>

        </div>





    </div>


    <script type="text/javascript">
        //Function For Request Locations from Database
      //  getMarker();

        function getMarker() {
            var type = document.getElementById("type").value;
            //alert(type);
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/Location_controller/getEmployeeLocations') ?>?keyword="+type,
                dataType: "json",

                success: function(data) {
                    //When Request Succeeded return Locations from Database;
                    console.log(data);
                    addMarkers(data);


                },
                error: function(){
                    console.log('error');
                }
            });
        }


        function addMarkers(data){

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(6.902431,79.861326),
                // scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


//            var infowindow = new google.maps.InfoWindow();
//            var marker, i;
//
//            for (i = 0; i < data.length; i++) {
//                var coords = [data[i].lat, data[i].lng];
//                console.log(coords);
//                // console.log(data[i].name)
//                var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
//                marker = new google.maps.Marker({
//                    position: pt,
//                    map: map,
//                    address: data[i].address,
//                    title: data[i].name
//                });
//
//
//                var contentString = '<div id="content">'+
//                    '<div id="siteNotice">'+
//                    '</div>'+
//                    '<h1 id="firstHeading" class="firstHeading">'+data[i].name+'</h1>'+
//                    '<div id="bodyContent">'+
//                    '<p><b>'+data[i].address+'</b></p></br>'+
//                    '<p>'+data[i].description+'</p>'+
//                    '</div>'+
//                    '</div>';
//
//                //marker.setMap(map);
//                google.maps.event.addListener(marker, 'click', (function(marker, i) {
//                    return function() {
//                        infowindow.setContent(
//                            '<div id="content">'+
//                            '<div id="siteNotice">'+
//                            '</div>'+
//                            '<h1 id="firstHeading" class="firstHeading">'+data[i].name+'</h1>'+
//                            '<div id="bodyContent">'+
//                            '<p><b>'+data[i].address+'</b></p></br>'+
//                                //  '<p>'+data[i].description+'</p>'+
//                                //'<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>'+
//                            '</div>'+
//                            '</div>'
//                        );
//                        infowindow.open(map, marker);
//                        openModal(data[i].name);
//
//                    }
//                })
//                (marker, i));
//
//
//            }

            var lst = [];

            for (i = 0; i < data.length; i++) {
                var coord = [data[i].lat, data[i].lng];
                console.log(coord);
                // console.log(data[i].name)
                 var p = new google.maps.LatLng(parseFloat(coord[0]), parseFloat(coord[1]));
                lst[i] = p;

            }

            var flightPath = new google.maps.Polyline({
                path: lst,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            flightPath.setMap(map);


        }

        function openModal(id){
            var EmpID = id;
            // alert(EmpID);




        }






    </script>













<?php include 'partials/footer.php' ?>