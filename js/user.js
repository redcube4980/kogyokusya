$(document).ready(function () {

  var clickEvent = 'ontouchend' in window ? 'touchend' : 'click';

  $('#motion').on(clickEvent, function() {
    var index = $('#motion').index(this);
    $('.actibities-tag p').removeClass('active');
    $('.actibities-box-area div').removeClass('active');
    $(this).addClass('active');
    $('.actibities_motion').addClass('active');
  });
  $('#culture').on(clickEvent, function() {
    var index = $('#culture').index(this);
    $('.actibities-tag p').removeClass('active');
    $('.actibities-box-area div').removeClass('active');
    $(this).addClass('active');
    $('.actibities_culture').addClass('active');
  });
  $('#same_taste').on(clickEvent, function() {
    var index = $('#same_taste').index(this);
    $('.actibities-tag p').removeClass('active');
    $('.actibities-box-area div').removeClass('active');
    $(this).addClass('active');
    $('.actibities_same_taste').addClass('active');
  });

  $('.actibities_motion-ttl').on(clickEvent, function(){
    $('.actibities_motion').toggleClass('active').slideToggle();
    $(this).toggleClass('active');
  });
  $('.actibities_culture-ttl').on(clickEvent, function(){
    $('.actibities_culture').toggleClass('active').slideToggle();
    $(this).toggleClass('active');
  });
  $('.actibities_same_taste-ttl').on(clickEvent, function(){
    $('.actibities_same_taste').toggleClass('active').slideToggle();
    $(this).toggleClass('active');
  });
  $('.actibities-box-ttl').on(clickEvent, function() {
    $(this).next('.actibities-box-txt').slideToggle();
    $(this).toggleClass('active');
  });

  var w = $(window).width();
  var x = 768;
  $('.news-tag').on('click', function() {
    var index = $('.news-tag').index(this);
    $('.news-tag').removeClass('active');
    $(this).addClass('active');
    $('.club-news--items').removeClass('active').eq(index).addClass('active');
  });


  $('#hamburger-btn-wrap').on(clickEvent, function() {
    var index = $('#hamburger-btn-wrap').index(this);
    if($(this).hasClass('open')){
      $(this).removeClass('open');
      $('.hamburger-bg').fadeToggle(500).removeClass('open');
      $('.hamburger').fadeToggle(500).removeClass('open');
      $('#logo').fadeToggle(500).removeClass('open');
      $('body').css('overflow', 'auto');
    }else{
      $(this).addClass('open');
      $('.hamburger-bg').fadeToggle(500).addClass('open');
      $('#logo').fadeToggle(500).addClass('open');
      $('.hamburger').fadeToggle(500).ready(function () {
        setTimeout(function () {
          $('.hamburger').addClass('open').fadeIn(1000);
        }, 1000);
      });
      if ($(window).width() < 769) {
        $('body').css('overflow', 'hidden');
      }
    };
  });

  $('.div-link1 span').on(clickEvent, function() {
    var index = $('.div-link1 span').index(this);
    $('.inline-link .div-link2').removeClass('active');
    $('.facility-img-warp .facility-img').removeClass('active');
    $('.inline-link .div-link2').eq(index).addClass('active');
    $('.facility-img-warp .facility-img').eq(index).addClass('active');
    $('.div-link1 span').removeClass('active');
    $(this).addClass('active')
  });

  $('iframe').on('load',function(){
    $('iframe').contents().find('.ytp-pause-overlay').css('display','none');
  });

  $('header nav ul li').each(function () {
    var urlLink = location.href;
    if (urlLink.substr(urlLink.length - 1) === '/') {
      urlLink = urlLink + 'index.html';
    }
    var tgLink = $(this).prop('href');
    if(document.URL.match(/introduction/)) {
      $('header nav ul li').removeClass('now'); 
      $('header nav ul li').eq(0).addClass('now');
    }else if(document.URL.match(/education/)) {
      $('header nav ul li').removeClass('now');
      $('header nav ul li').eq(1).addClass('now');
    }else if(document.URL.match(/school-life/)) {
      $('header nav ul li').removeClass('now');
      $('header nav ul li').eq(2).addClass('now');
    }else if(document.URL.match(/admission/) && !document.URL.match(/news/)) {
      $('header nav ul li').removeClass('now');
      $('header nav ul li').eq(3).addClass('now');
    }else if(document.URL.match(/students-parents/)) {
      $('header nav ul li').removeClass('now');
      $('header nav ul li').eq(4).addClass('now');
    }else if(document.URL.match(/faq/)) {
      $('header nav ul li').removeClass('now');
      $('header nav ul li').eq(5).addClass('now');}
  });


  $('.faq-item-ttl').on(clickEvent, function() {
    $(this).siblings('.faq-txt-area').slideToggle();
    $(this).parent('div').toggleClass('active');
  });

  $('.cat.sp').on(clickEvent, function() {
    $(this).next('.sp-down').slideToggle();
    $(this).toggleClass('active');
  });

  $('.form-area .dfloat').each(function () {
    var urlLink = location.href;
    if (urlLink.substr(urlLink.length - 1) === '/') {
      urlLink = urlLink + 'index.html';
    }
    var tgLink = $(this).prop('href');
    if(document.URL.match(/confirm/)) {
      $('.form-area .dfloat').addClass('confirm');
      $('td.one').addClass('confirm');
      $('td.three').addClass('confirm');
    }else{
      $('.form-area .dfloat').removeClass('confirm');
      $('td.one').removeClass('confirm');
    $('td.three').removeClass('confirm');}
  });


  $(function(){ 
    var h = $('.calendar-area').height(); 
    $('.left-menu-list').css("margin-bottom",h); 
  });

  $(function() {
    $('input[type="date"]').datepicker();
  });


  $('.modal-btn p').on(clickEvent, function() {
    $('.error-modal-area').hide('swing');
  });
  $('.modal-bg').on(clickEvent, function() {
    $('.error-modal-area').hide('swing');
  });


});


