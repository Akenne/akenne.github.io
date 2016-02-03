$(document).ready(function() {
  $("footer .social-icons a").tooltip();

  $(window).scroll(function () {
    $(".splash").css("background-position", "right " + ($(this).scrollTop() / 2) + "px");
  });
});
