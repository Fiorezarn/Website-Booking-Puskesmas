$(document).ready(function() {
    // Fungsi untuk mengatur perubahan warna navbar saat digulir
    $(window).scroll(function() {
      if ($(window).scrollTop() > 0) {
        $(".navbar-fixed").addClass("navbar-scrolled");
      } else {
        $(".navbar-fixed").removeClass("navbar-scrolled");
      }
    });
  });
  