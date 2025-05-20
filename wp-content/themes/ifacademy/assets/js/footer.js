$(document).ready(function(){
if ($('#intro-gallery').length) {
$('#intro-gallery').owlCarousel({
stagePadding:0,
loop:true,
margin:0,
items:1,
autoplay:true,
autoplayTimeout:8000,
animateOut:"fadeOut",
nav:false,
dots:false
});
$(".intro-prev").click(function(){
$("#intro-gallery").trigger('prev.owl.carousel');
})
$(".intro-next").click(function(){
$("#intro-gallery").trigger('next.owl.carousel');
})
}
if ($('#intro-gallery-mobile').length) {
$('#intro-gallery-mobile').owlCarousel({
stagePadding:0,
loop:true,
margin:0,
items:1,
autoplay:true,
autoplayTimeout:8000,
animateOut:"fadeOut",
nav:false,
dots:false
});
$(".intro-prev").click(function(){
$("#intro-gallery-mobile").trigger('prev.owl.carousel');
})
$(".intro-next").click(function(){
$("#intro-gallery-mobile").trigger('next.owl.carousel');
})
}
if ($('.page-gallery').length) {
$('.page-gallery').owlCarousel({
loop:true,
items:1,
autoplay:true,
autoplayTimeout:5000,
animateOut:"fadeOut",
nav:false,
dots:false
});
}
if ($('#accordion-faq').length) {
var myAccordion=new Accordion('.accordion-container');
}
if ($('.gallery-photos').length) {
$('.gallery-photos a').simpleLightbox();
}
if ($('.gallery-main').length) {
$('.gallery-main a').simpleLightbox();
}
$(window).scroll(function() {
if($(this).scrollTop() != 0) {
$('#back-to-top').addClass('back-to-top-on').removeClass('back-to-top-off');
} else {
$('#back-to-top').addClass('back-to-top-off').removeClass('back-to-top-on');
}
});
$('#back-to-top').click(function() {
$('body,html').animate({scrollTop:0},800);
});
});

var codeglobal=window.codeglobal || {};
codeglobal.listenerMenu=function(){
$('#mobile-nav').on('click', function(e){
$(this).toggleClass('open');
$('#mobile-menu-list').stop().fadeToggle(350, 'linear');
e.preventDefault();
});
}
codeglobal.listenerMenu();