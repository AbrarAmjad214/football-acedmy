$('#map-wrapper').gmap3({
map:{
options:{
center:[52.757020, -1.352993],
zoom: 9,
mapTypeId: google.maps.MapTypeId.ROADMAP,
mapTypeControl: true,
mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
navigationControl: true,
scrollwheel: false,
streetViewControl: true
}
},
marker:{
values:[
{latLng:[52.757020, -1.352993], options:{icon:"https://internationalfootball.academy/wp-content/themes/ifacademy/assets/img/map-marker.png"}},
],
options:{draggable: false}
}
});