var app = new Vue({
  el: "#accordionSidebar",
  data: {},
  mounted: function () {
    (function ($) {
      "use strict"; // Start of use strict
      // Toggle the side navigation
      $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $(".sidebar .collapse").collapse("hide");
        }
      });
      // Close any open menu accordions when window is resized below 768px
      $(window).resize(function () {
        if ($(window).width() < 768) {
          $(".sidebar .collapse").collapse("hide");
        }
        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
          $("body").addClass("sidebar-toggled");
          $(".sidebar").addClass("toggled");
          $(".sidebar .collapse").collapse("hide");
        }
      });
      // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
      $("body.fixed-nav .sidebar").on(
        "mousewheel DOMMouseScroll wheel",
        function (e) {
          if ($(window).width() > 768) {
            var e0 = e.originalEvent,
              delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
          }
        }
      );
      // Scroll to top button appear
      $(document).on("scroll", function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $(".scroll-to-top").fadeIn();
        } else {
          $(".scroll-to-top").fadeOut();
        }
      });
      // Smooth scrolling using jQuery easing
      $(document).on("click", "a.scroll-to-top", function (e) {
        var $anchor = $(this);
        $("html, body")
          .stop()
          .animate(
            {
              scrollTop: $($anchor.attr("href")).offset().top,
            },
            1000,
            "easeInOutExpo"
          );
        e.preventDefault();
      });
    })(jQuery); // End of use strict
  },
  methods: {
    // ---------------- FUNCIÓN PARA CERRAR SESIÓN --------------
    logout() {
      localStorage.removeItem("user_token");
      window.location.href = "./login/logout.php";
    },
  },
});
var header = new Vue({
  el: "#vue-header",
  data: {
    user_id: "",
    user_nombre: "",
    user_apellidos: "",
    user_email: "",
    user_picture: "",
    select_espacio: "",
    vista_actual: "",
  },
  mounted: function () {
    const self = this;
    (function ($) {
      "use strict"; // Start of use strict
      // Toggle the side navigation
      $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $(".sidebar .collapse").collapse("hide");
        }
      });
      // Close any open menu accordions when window is resized below 768px
      $(window).resize(function () {
        if ($(window).width() < 768) {
          $(".sidebar .collapse").collapse("hide");
        }
        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
          $("body").addClass("sidebar-toggled");
          $(".sidebar").addClass("toggled");
          $(".sidebar .collapse").collapse("hide");
        }
      });
      // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
      $("body.fixed-nav .sidebar").on(
        "mousewheel DOMMouseScroll wheel",
        function (e) {
          if ($(window).width() > 768) {
            var e0 = e.originalEvent,
              delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
          }
        }
      );
      // Scroll to top button appear
      $(document).on("scroll", function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $(".scroll-to-top").fadeIn();
        } else {
          $(".scroll-to-top").fadeOut();
        }
      });
      // Smooth scrolling using jQuery easing
      $(document).on("click", "a.scroll-to-top", function (e) {
        var $anchor = $(this);
        $("html, body")
          .stop()
          .animate(
            {
              scrollTop: $($anchor.attr("href")).offset().top,
            },
            1000,
            "easeInOutExpo"
          );
        e.preventDefault();
      });
    })(jQuery); // End of use strict

    let user_token = $("#user_token").text();
    localStorage.setItem("user_token", user_token);
    this.obtenerDatos();
    $("#user_token").remove();

    // DETECTAR ESPACIO EN LA URL
    const URL = window.location.search;
    const urlActual = new URLSearchParams(URL);
    this.select_espacio = urlActual.get("espacio");
    this.vista_actual = urlActual.get("view");
  },
  methods: {
    //  ------------------ OBTENER DATOS DEL USUARIO QUE INICIO SESIÓN ---------------
    obtenerDatos() {
      let newForm = new FormData();
      newForm.append("action", "obtenerDatos");
      const USER_TOKEN = localStorage.getItem("user_token");
      console.log("Desde Main User Token = " + USER_TOKEN);
      newForm.append("user_token", USER_TOKEN);
      fetch("./bd/data/read.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error") {
            console.log(data.message);
            return;
          }
          if (data.status == "success") {
            console.log(data.message);
            this.user_picture = data.result.picture;
            this.user_id = data.result.id_usuario;
            this.user_nombre = data.result.nombre;
            this.user_apellidos = data.result.apellidos;
            this.user_email = data.result.email;
          }
          if (data.status == "err") {
            console.log(data.message);
            return;
          }
        });
    },
    cambiarEspacio() {
      console.log(this.select_espacio);
      window.location.href = `http://localhost/clever-cloud/Apga-bliss/index.php?espacio=${this.select_espacio}&view=${this.vista_actual}`;
    },
    // ---------------- FUNCIÓN PARA CERRAR SESIÓN --------------
    logout() {
      localStorage.removeItem("user_token");
      window.location.href = "./login/logout.php";
    },
  },
});
