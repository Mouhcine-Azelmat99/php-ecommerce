function getCatProducts($id) {
  const input = document.querySelector("#cat_id");
  const form = document.querySelector("#catPro");
  input.value = $id;
  form.submit();
}

function submitFormProduct($id) {
  const input = document.querySelector("#product_id");
  const form = document.querySelector("#form");
  input.value = $id;
  form.submit();
}

function deleteFormProduct($id) {
  const input = document.querySelector("#delete_product_id");
  const form = document.querySelector("#delete_form");
  input.value = $id;
  form.submit();
}
function submitFormCategory($id) {
  const input = document.querySelector("#category_id");
  const form = document.querySelector("#form");
  input.value = $id;
  form.submit();
}

function deleteFormCategory($id) {
  const input = document.querySelector("#delete_category_id");
  const form = document.querySelector("#delete_form");
  input.value = $id;
  form.submit();
}

$(document).ready(function(){
  $("cat_link").click(function(){
    $(this).addClass("active");
    $("cat_all").removeClass("active");
  });
  
});
$(function () {
  'use strict';
  // Adjust Slider Height
  var winH    = $(window).height(),
      upperH  = $('.upper-bar').innerHeight(),
      navH    = $('.navbar').innerHeight();
  $('.slider, .carousel-item').height(winH - ( upperH + navH ));



});

$(function () {
  $('[placeholder]').focus(function () {
    $(this).attr('data-text', $(this).attr('placeholder'));
    $(this).removeAttr('placeholder');
  }).blur(function () {
    $(this).attr('placeholder', $(this).attr('data-text'));
  });
});

// search 

$(document).ready(function(){

    $('#search, .fa-search').mouseenter(function(){
        $('.logo').hide();
    });

    $('#search, .fa-search').mouseleave(function(){
        $('.logo').show();
    });

    $('.fa-bars').click(function(){
        $('.navbar').toggle();
        $(this).toggleClass('fa-times');
    });

    $('.navbar, .navbar a').click(function(){
        $('.navbar').hide();
        $('.fa-bars').removeClass('fa-times');
    });

}