$(document).ready(function(){
// Show the first tab and hide the rest
$('#tabs li:first-child').addClass('active');
$('.tab-box').hide();
$('#tab1').show();

// Click function
$('#tabs li').click(function(){
$('#tabs li').removeClass('active');
$(this).addClass('active');
$('.tab-box').hide();
var activeTab=$(this).attr('data-id');
$(activeTab).fadeIn();
return false;
});

});