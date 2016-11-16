jQuery(document).ready(function( $ ) {
  
  var latitude=$('#eventlat').val();
  var longitude=$('#eventlon').val();
  if(latitude=="" && longitude==""){
      latitude= -6.189952382223717;
      longitude= 106.7987206087646;
  }
  $('#maps').locationpicker({
      location: {latitude: latitude, longitude: longitude},
      radius:0,
      inputBinding: {
            locationNameInput: $('#eventlocation'),
            latitudeInput: $('#eventlat'),
            longitudeInput: $('#eventlon')
        },
        enableAutocomplete: true
  });
  
});