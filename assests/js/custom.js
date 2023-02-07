// popup downloads
jQuery(".popup_button").click(function() {
  jQuery(".popup_section").fadeIn(500);
});
jQuery(".close").click(function() {
  jQuery(".popup_section").fadeOut(500);
});

jQuery(window).on("load",function() {
  jQuery('.home_navbar li a').filter(function(){
      return this.href === location.href;
    }).addClass('active_page');
})