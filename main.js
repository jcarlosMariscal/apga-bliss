var app = new Vue({
  el: "#accordionSidebar",
  data: {},
  mounted: function () {
    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
      $("body").toggleClass("sidebar-toggled");
      $(".sidebar").toggleClass("toggled");
      if ($(".sidebar").hasClass("toggled")) {
        $(".sidebar .collapse").collapse("hide");
      }
    });
  },
  methods: {
    // ---------------- FUNCIÓN PARA CERRAR SESIÓN --------------
    logout() {
      localStorage.removeItem("user_token");
      window.location.href = "./login/logout.php";
    },
  },
});
