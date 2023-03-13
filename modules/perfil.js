var app = new Vue({
  el: "#vue-content",
  data: {
    espacio_nombre: "",
  },
  mounted: function () {
    this.logicaTabs();
    console.log("hola");
  },
  methods: {
    logicaTabs() {
      var tabs = document.querySelectorAll(".tabs_wrap .div-ul .div-li");
      var males = document.querySelectorAll(".male");
      var females = document.querySelectorAll(".female");
      var personalizar = document.querySelectorAll(".personalizar");
      var privacidad = document.querySelectorAll(".privacidad");
      var all = document.querySelectorAll(".item_wrap");

      tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
          tabs.forEach((tab) => {
            tab.classList.remove("mostrar");
          });
          tab.classList.add("mostrar");
          var tabval = tab.getAttribute("data-tabs");

          all.forEach((item) => {
            item.style.display = "none";
          });

          if (tabval == "male") {
            males.style.display = "block";
          } else if (tabval == "female") {
            females.style.display = "block";
          } else {
            all.forEach((item) => {
              item.style.display = "block";
            });
          }
        });
      });
    },
    generarGraficas() {},
  },
});
