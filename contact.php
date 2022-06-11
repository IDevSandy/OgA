<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<?php include('header.php');?>
<body>
<div class="se-pre-con"></div>
<section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Contact</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="home-style-one.html" title="">Home</a></li>
                            <li><a href="#" title="">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-title-2">
                    <h2>Contact Us</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        <br> has been the industry's standard dummy text ever </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="contact-address-2">
                    <!-- Address -->
                    <div class="contact-icon-inner"><i class="pe-7s-map-2 top-icon"></i></div>
                    <h3>Address</h3>
                    <ul>
                        <li>Boring Road </li>
                        <li>Patna 800001</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-address-2">
                    <!-- Phone -->
                    <div class="contact-icon-inner"><i class="pe-7s-headphones top-icon"></i></div>
                    <h3>Phone</h3>
                    <ul>
                        <li><i class="fa fa-mobile"></i> +918976548765</li>
                        <li><i class="fa fa-mobile"></i> +919875639745</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-address-2">
                    <!-- Email -->
                    <div class="contact-icon-inner"><i class="pe-7s-global top-icon"></i> </div>
                    <h3>Email</h3>
                    <ul>
                        <li><i class="fa fa-envelope-o"></i> sandy@gmail.com</li>
                        <li><i class="fa fa-globe"></i> www.oga.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="map"></div>
            </div>
            <div class="col-sm-12">
                <div class="contact-form-area-2">
                    <div class="contact-title-2">
                        <h2>Send Us A Message</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            <br> has been the industry's standard dummy text ever </p>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="input">
                                        <input class="input_field" type="text" id="input-1">
                                        <label class="input_label" for="input-1">
                                            <span class="input_label_content" id="f_name" data-content="First Name">First Name</span>
                                </label>
                                </span>
                                <span class="input">
                                        <input class="input_field" type="text" id="input-2">
                                        <label class="input_label" for="input-2">
                                            <span class="input_label_content" id="l_name" data-content="Last Name">Last Name</span>
                                </label>
                                </span>
                                <span class="input">
                                        <input class="input_field" type="text" id="input-3">
                                        <label class="input_label" for="input-3">
                                            <span class="input_label_content" id="emai" data-content="Your Email">Your Email</span>
                                </label>
                                </span>
                                <span class="input">
                                        <input class="input_field" type="text" id="input-4">
                                        <label class="input_label" for="input-4">
                                            <span class="input_label_content" id="subject" data-content="Subject">Subject</span>
                                </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                        <textarea class="input_field" id="message"></textarea>
                                        <label class="input_label" for="message">
                                            <span class="input_label_content" data-content="Your Email">Your Message</span>
                                </label>
                                </span>
                                <button type="button" class="btn btn-style btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <!-- Google map  -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-EEPxbay_aFpp3jcFXpjyPQcVQUJ2pp0"></script>


<!-- Google map start --> 
<script>
    google.maps.event.addDomListener(window, 'load', init);
    function init() {
        var mapOptions = {
            zoom: 11,
            center: new google.maps.LatLng(40.6700, -73.9400), // New York
            styles: [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]}, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17}]}, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]}, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18}]}, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]}, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21}]}, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]}, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]}, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20}]}, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]}]
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map,
            title: 'Snazzy!'
        });
    }
</script>

<!-- Google map End -->
</body>
<?php include('footer.php');?>
</html>