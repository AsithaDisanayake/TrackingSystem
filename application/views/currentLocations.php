<?php include 'partials/header.php' ?>
<?php
if(!$this->session->userdata('loggedin')) {
    redirect('Home');

}

?>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mapstyle.css">
    <script src="<?php echo base_url();?>assets/js/searchByPlaces.js"></script>




    <div class="container-fluid">
        <h2>Current Employee Locations</h2>

    <!--            Div for create map-->
                <div id="map">
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDccLlV_rbSEOElJchCKxcP8ayVoatGNFc&libraries=places&callback=initAutocomplete"
                            async defer>

                    </script>
                </div>

    </div>


    <script type="text/javascript">
        //Function For Request Locations from Database
        getMarker();
        function getMarker() {
            var type = 'type';
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/Location_controller/getCurrentLocations') ?>?keyword="+type,
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

//function for add marks
        function addMarkers(data){

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(6.902431,79.861326),
                // scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


            var infowindow = new google.maps.InfoWindow();
            var marker, i;

            for (i = 0; i < data.length; i++) {
                var coords = [data[i].lat, data[i].lng];
                console.log(coords);
                // console.log(data[i].name)
                var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
                marker = new google.maps.Marker({
                    position: pt,
                    map: map,
                   // address: data[i].address,
                  //  title: data[i].name
                });

                //marker.setMap(map);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(
                            '<div id="content">'+
                            '<div id="siteNotice">'+
                            '</div>'+
                            '<h1 id="firstHeading" class="firstHeading">'+data[i].empid+'</h1>'+
                            '<div id="bodyContent">'+
                            '<p><b>'+data[i].timestamp+'</b></p></br>'+
                          //  '<p>'+data[i].description+'</p>'+
                            //'<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>'+
                            '</div>'+
                            '</div>'
                        );
                        infowindow.open(map, marker);

                    }
                })
                (marker, i));


            }

        }





    </script>










<?php include 'partials/footer.php' ?>