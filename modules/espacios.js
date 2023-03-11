var app = new Vue({
  el: "#vue-content",
  data: {
    espacios: "",
    espacio_nombre: "",
    titulo_modal: "Agregar Espacio",
    editar: false,
    table: "",
    allEspacios: "",
    titulo_modal: "",
    id_registro: null,
    alias: null,
    detalles: null,
    espacio: "",
  },
  mounted: function () {
    this.obtenerEspaciosAll();
    this.obtenerEspacios();
    // DETECTAR ESPACIO EN LA URL
    const URL = window.location.search;
    const urlActual = new URLSearchParams(URL);
    this.select_espacio = urlActual.get("espacio");
    this.vista_actual = urlActual.get("view");
  },
  methods: {
    obtenerEspaciosAll() {
      let newForm = new FormData();
      newForm.append("action", "obtenerEspacioIngresos");
      fetch("./bd/data/read.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log("data: ");
          console.log(data);
          console.log("ds");
          if (data.status == "error") return false;
          if (data.status == "err") return false;
          if (data.status == "success")
            this.allEspacios = Array.from(data.result);
          console.log(this.allEspacios);
        });
    },
    obtenerEspacios() {
      let newForm = new FormData();
      const USER_TOKEN = localStorage.getItem("user_token");
      newForm.append("action", "obtenerEspacios");
      newForm.append("user_token", USER_TOKEN);
      fetch("./bd/data/read.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          // console.log(data);
          if (data.status == "error") {
            console.log(data.message);
            return;
          }
          if (data.status == "success") {
            console.log(data.message);
            this.espacios = Array.from(data.result);
            // app.espacios = data.result;
          }
          if (data.status == "err") {
            console.log(data.message);
            return;
          }
        });
    },
    // ---------------- MODAL PARA AGREGAR UN INGRESO -----------------
    modalEspacios() {
      this.editar = false;
      this.titulo_modal = "Crear Espacio";
      // this.cantidad = null;
      // this.categoria = "";
      // this.fecha = null;
      // this.espacio = "";
      let modalEspacios = new bootstrap.Modal(
        document.getElementById("modalEspacios")
      );
      modalEspacios.show();
    },
    crearEspacio() {
      console.log("agregando");
      const USER_TOKEN = localStorage.getItem("user_token");
      let form = document.getElementById("formEspacio");
      let newForm = new FormData(form);
      newForm.append("action", "crearEspacio");
      newForm.append("token", USER_TOKEN);
      fetch("./bd/data/create.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error" || data.status == "err") {
            this.statusErr = true;
            this.error = data.message;
            return;
          }
          if (data.status == "success") {
            let modalEspacios = new bootstrap.Modal(
              document.getElementById("modalEspacios")
            );
            modalEspacios.hide();
            Swal.fire({
              title: "Espacio registrado",
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: "Aceptar",
              denyButtonText: `Don't save`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                // Swal.fire("Saved!", "", "success");
                window.location.href = `index.php?espacio=${this.select_espacio}&view=${this.vista_actual}`;
              }
            });
            // this.table.data.reload();
            // localStorage.setItem("register", "success");
            // window.location.href = "./index.php";
          }
        });
    },
    modalEditar(id_espacio) {
      console.log("ID_ESPACIO: " + id_espacio);
      this.id_registro = id_espacio;
      this.editar = true;
      let newForm = new FormData();
      newForm.append("action", "getEspacioEditar");
      newForm.append("id_espacio", id_espacio);
      fetch("./bd/data/read.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error") return false;
          if (data.status == "err") return false;
          if (data.status == "success") {
            let actual = data.result[0];
            console.log("-----");
            console.log(actual);
            console.log("-----");
            console.log("id_espacio: " + actual.id_espacio);
            this.titulo_modal = "Editar Espacio " + actual.alias;
            this.alias = actual.alias;
            this.detalles = actual.detalles;
            this.espacio = actual.id_espacio;
            let modalEspacios = new bootstrap.Modal(
              document.getElementById("modalEspacios")
            );
            modalEspacios.show();
          }
        });
    },
    editarEspacio() {
      console.log("editando");
      let form = document.getElementById("formEspacio");
      let newForm = new FormData(form);
      newForm.append("action", "editarEspacio");
      newForm.append("id_espacio", this.id_registro);
      fetch("./bd/data/update.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error" || data.status == "err") {
            this.statusErr = true;
            this.error = data.message;
            return;
          }
          if (data.status == "success") {
            let modalEspacios = new bootstrap.Modal(
              document.getElementById("modalEspacios")
            );
            modalEspacios.hide();
            Swal.fire({
              title: "Espacio Editado",
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: "Aceptar",
              denyButtonText: `Don't save`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                // Swal.fire("Saved!", "", "success");
                window.location.href = `index.php?espacio=${this.select_espacio}&view=${this.vista_actual}`;
              }
            });
            // this.table.data.reload();
            // localStorage.setItem("register", "success");
            // window.location.href = "./index.php";
          }
        });
    },
  },
});
