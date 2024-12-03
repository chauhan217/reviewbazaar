<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png')}}">
    <title>@yield('title', 'Consumers can leave reviews and ratings, helping others make informed decisions.')</title>
    <link rel="stylesheet" href="{{ asset('css/app.min.css')}}">
    <link rel="stylesheet" href="{{ asset('font/flaticon_alcebo.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css')}}">
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
  <style>
    .container{
      @media (min-width: 1400px) {max-width: 1140px !important; }
    }
    .sideline h4 {
        position: relative;
     }
     .home-list .img-view img {
        width: 186px !important;
        height: 120px !important;
        -o-object-fit: contain;
        object-fit: contain;
    }
    .recent-post img {
    width: 70px;
    height: 70px;
    object-fit: cover;
}
    .home-list .list-style1s img {
        width: 186px !important;
        height: 120px !important;
        -o-object-fit: contain;
        object-fit: contain;
    }
   
    .sideline h4:before {
        position: absolute;
        content: '';
        width: 40px;
        height: 3px;
        left: 0;
        bottom: -9px;
        background: #1967d2;
    }
    .detailsList .user-iconss {
      width: 50px;
      height: 50px;
      text-align: center;
      align-items: center;
      display: flex;
      justify-content: center;
      color: #fff;
    }
    .list-wraps .logo-imgs {
    width: 100%;
    height: 210px;
    }
    .list-wrapper .list-style1 img {
    width: 240px;
    height: 140px;
    -o-object-fit: contain;
    object-fit: contain;
     }
     .detail-lists .list-style1 img {
    width: 100% !important;
    height: 170px !important;
    -o-object-fit: contain;
    object-fit: contain;
    }
    .hero-banner-inner .navbars ul {
    max-width: 450px;
    }
    .hero-banner .form-control:first-child {
    border-right: 2px solid #b8b4b4 !important;
    border-radius: inherit !important;
    margin-right: 20px;
    }
    @media (max-width: 767.98px) {
      .hero-banner .banner-img img {
          height: 360px;
          width: 100%;
          -o-object-fit: cover;
          object-fit: cover;
      }
     }
  </style>
</head>
<body>
@include('frontend.inc.header')
@include('frontend.inc.userlogin')
@yield('content')

@include('frontend.inc.footer')
</body>
<script src="{{ asset('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
$('#owl-carousel').owlCarousel({
    autoplay: true,
    rewind: false, 
    margin: 18,
    loop: true,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 3000,
    smartSpeed: 800,
    nav: true,
    responsive: {
    0: {
      items: 2
    },

    600: {
      items: 4
    },

    1024: {
      items: 6
    },

    1366: {
      items: 7
    }
  }
});
</script>
<script>
  $(".navigation li").hover(function() {
  var isHovered = $(this).is(":hover");
  if (isHovered) {
    $(this).children("ul").stop().slideDown(300);
  } else {
    $(this).children("ul").stop().slideUp(300);
  }
});
$(document).ready(function() {
    $('.js-example-basic-single').select2({
      tags: true

    });
});
</script>
<script>
  CKEDITOR.replace( 'editor', {
    // Disable security notifications.
    versionCheck: false
} );

  </script>
  <script>
    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    let placeSearch;
    let autocomplete;
    const componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "short_name",
    country: "long_name",
    postal_code: "short_name",
    };
  
    function initAutocomplete() {
    // Create the autocomplete object, restricting the search predictions to
    // geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
      document.getElementById("Location"),
      { types: ["geocode"], componentRestrictions: { country: "in" } }
    );
    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    autocomplete.setFields(["address_component", "geometry"]);
    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener("place_changed", fillInAddress);
    }
  
    function fillInAddress() {
    // Get the place details from the autocomplete object.
    const place = autocomplete.getPlace();
    console.log(place.address_components);
    var lat = place.geometry.location.lat(),
      lng = place.geometry.location.lng();
      // Then do whatever you want with them
      document.getElementById('lati').value = lat;
      document.getElementById('longi').value = lng;
  
    // for (const component in componentForm) {
    //   if(component=='locality'){
    //     document.getElementById('localityN').value = "";
    //   }else{
    //       document.getElementById(component).value = "";
    //   }
    //   //document.getElementById(component).disabled = false;
    // }
  
    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    var address='';
    for (const component of place.address_components) {
      console.log(component);
      if(component.types[0]=='country'){
        document.getElementById('country').value = component.long_name;
      }
      if(component.types[0]=='postal_code'){
        document.getElementById('postal_code').value = component.long_name;
      }

      if(component.types[0]!='locality' && component.types[0] !="administrative_area_level_2"){
        address +=component.long_name+' ';
      }
     
    }
    $('#Location').val(address);
    }
  
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) => {
      const geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
      const circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy,
      });
      autocomplete.setBounds(circle.getBounds());
      });
    }
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoxST-lgODMlgKmdfWlGVljmABIQuXllo&callback=initAutocomplete&libraries=places&v=weekly" async></script>
</html>