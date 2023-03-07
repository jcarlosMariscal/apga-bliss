var app = new Vue({
  el: "#vue-content",
  data: {
    table: "",
    titulo_modal: "",
    id_registro_editar: null,
    editar: false,
    seleccionar_info: "Ingresos",
    iconoIngreso: "",
    colorIngreso: "",
    iconoGasto: "",
    colorGasto: "",
    // INGRESOS
    nombre: "",
    descripcion: "",
    colorIngreso: "",
    iconoIngreso: "",
    picker: null,
    icon_seleccionado: "",
    // GASTOS
    nombre_gas: "",
    descripcion_gas: "",
    colorGasto: "",
    iconoGasto: "",
    select_espacio: "",
    vista_actual: "",
  },
  mounted: function () {
    const self = this;
    this.cambiarInfo();
    this.obtenerCategoriasIngresos();
    this.obtenerCategoriasGastos();
    this.modalEditarCategoriaIng(self);
    this.modalEditarCategoriaGas(self);
    // DETECTAR ESPACIO EN LA URL
    const URL = window.location.search;
    const urlActual = new URLSearchParams(URL);
    this.select_espacio = urlActual.get("espacio");
    this.vista_actual = urlActual.get("view");
  },
  methods: {
    seleccionarColorIngreso(self) {
      //  ---------- SELECCIONAR COLOR CATEGORIA INGRESOS ---------------
      let parent = document.querySelector("#parent");
      let iconoColor = document.getElementById("btn_seleccionar");
      self.picker = new Picker({
        parent: parent,
        editorFormat: "rgb",
        onChange: function (color) {
          console.log(color);
          parent.style.background = color.rgbaString;
          iconoColor.style.background = color.rgbaString;
          self.colorIngreso = color.rgbaString;
        },
      });
      self.picker.setColor(self.colorIngreso, true);
      parent.style.background = self.colorIngreso;
      iconoColor.style.background = self.colorIngreso;
    },
    seleccionarColorGasto(self) {
      //  ---------- SELECCIONAR COLOR CATEGORIA GASTOS ---------------
      var parent2 = document.querySelector("#parent2");
      let iconoColor = document.getElementById("btn_seleccionar2");
      self.picker = new Picker({
        parent: parent2,
        editorFormat: "rgb",
        onChange: function (color) {
          console.log(color);
          parent2.style.background = color.rgbaString;
          iconoColor.style.background = color.rgbaString;
          self.colorGasto = color.rgbaString;
        },
      });
      self.picker.setColor(self.colorGasto, true);
      parent2.style.background = self.colorGasto;
      iconoColor.style.background = self.colorGasto;
    },
    seleccionarIconoIngreso(self) {
      var uip = new UniversalIconPicker("#btn_seleccionar", {
        iconLibraries: ["font-awesome.min.json"],
        iconLibrariesCss: [
          "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css",
        ],
        onSelect: function (jsonIconData) {
          console.log(jsonIconData);
          self.iconoIngreso = jsonIconData.iconHtml;
          self.icon_seleccionado = self.iconoIngreso;
          document.getElementById("output").classList.remove("hidden");
        },
      });
    },
    seleccionarIconoGasto(self) {
      // SELECCIONAR ICONOS FONTAWESOME
      var uip = new UniversalIconPicker("#btn_seleccionar2", {
        iconLibraries: ["font-awesome.min.json"],
        iconLibrariesCss: [
          "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css",
        ],
        onSelect: function (jsonIconData) {
          console.log(jsonIconData);
          self.iconoGasto = jsonIconData.iconHtml;
          self.icon_seleccionado = self.iconoGasto;
          document.getElementById("output2").classList.remove("hidden");
        },
      });
    },
    cambiarInfo() {
      // if (this.seleccionar_info == "Ingresos") {
      //   this.obtenerCategoriasIngresos();
      //   this.obtenerTiposIngresos();
      // }
      // if (this.seleccionar_info == "Gastos") {
      //   this.obtenerCategoriasGastos();
      // }
    },
    //  ------------------ OBTENER DATOS DE CATEGORIA DE INGRESOS ---------------
    obtenerCategoriasIngresos() {
      let newForm = new FormData();
      newForm.append("action", "obtenerCategoriaIngresos");
      fetch("./bd/data/read.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error") return false;
          if (data.status == "err") return false;
          if (data.status == "success")
            this.table = $("#datatable-categorias-ingresos").DataTable({
              responsive: true,
              data: data.result,
              columns: [
                { data: "nombre" },
                { data: "descripcion" },
                { data: "icono" },
                { data: "color" },
                { data: "editar" },
                { data: "archivar" },
              ],
              buttons: [
                "print",
                "copyHtml5",
                "excelHtml5",
                "csvHtml5",
                "pdfHtml5",
              ],
              order: [],
              language: {
                processing: "Procesando...",
                search: "Buscar",
                lengthMenu: "Mostar _MENU_ registros",
                info: "Mostrando _TOTAL_ registros de página _PAGE_ de _PAGES_, de _MAX_ registros en total  ",
                infoEmpty: "No se encontraron registros",
                infoFiltered:
                  "(Se encontraron _TOTAL_ registros en este periodo)",
                infoPostFix: "",
                loadingRecords: "Cargando Registros",
                zeroRecords: "No se encontraron registros",
                emptyTable: "No hay datos disponibles",
                aria: {
                  sortAscending:
                    ": Activar para ordenar la columna en orden ascendente",
                  sortDescending:
                    ": Activar para ordenar la columna en orden descendente",
                },
              },
            });
        });
    },
    obtenerCategoriasGastos() {
      let newForm = new FormData();
      newForm.append("action", "obtenerCategoriaGastos");
      fetch("./bd/data/read.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error") return false;
          if (data.status == "err") return false;
          if (data.status == "success")
            this.table = $("#datatable-categorias-gastos").DataTable({
              responsive: true,
              data: data.result,
              columns: [
                { data: "nombre" },
                { data: "descripcion" },
                { data: "icono" },
                { data: "color" },
                { data: "editar" },
                { data: "archivar" },
              ],
              buttons: [
                "print",
                "copyHtml5",
                "excelHtml5",
                "csvHtml5",
                "pdfHtml5",
              ],
              order: [],
              language: {
                processing: "Procesando...",
                search: "Buscar",
                lengthMenu: "Mostar _MENU_ registros",
                info: "Mostrando _TOTAL_ registros de página _PAGE_ de _PAGES_, de _MAX_ registros en total  ",
                infoEmpty: "No se encontraron registros",
                infoFiltered:
                  "(Se encontraron _TOTAL_ registros en este periodo)",
                infoPostFix: "",
                loadingRecords: "Cargando Registros",
                zeroRecords: "No se encontraron registros",
                emptyTable: "No hay datos disponibles",
                aria: {
                  sortAscending:
                    ": Activar para ordenar la columna en orden ascendente",
                  sortDescending:
                    ": Activar para ordenar la columna en orden descendente",
                },
              },
            });
        });
    },
    // ---------------- MODAL PARA AGREGAR Categoria INGRESO -----------------
    modalCategoriaIng() {
      this.editar = false;
      this.titulo_modal = "Nueva Categoria para Ingresos";
      // this.cantidad = null;
      // this.categoria = "";
      // this.fecha = null;
      // this.tipo = "1";
      // this.descripcion = null;
      // this.espacio = "";
      this.icon_seleccionado = "";
      this.iconoIngreso = "";
      this.colorIngreso = "rgba(15,22,158,1)";
      let modalIngresos = new bootstrap.Modal(
        document.getElementById("modalCategoriaIng")
      );
      modalIngresos.show();
      this.seleccionarIconoIngreso(this);
      this.seleccionarColorIngreso(this);
    },
    // ---------------- MODAL PARA AGREGAR Categoria de Gastos -----------------
    modalCategoriaGas() {
      this.editar = false;
      this.titulo_modal = "Nueva Categoria para Gastos";
      // this.cantidad = null;
      // this.categoria = "";
      // this.fecha = null;
      // this.tipo = "1";
      // this.descripcion = null;
      // this.espacio = "";
      this.icon_seleccionado = "";
      this.iconoGasto = "";
      this.colorGasto = "rgba(15,52,18,1)";
      let modalIngresos = new bootstrap.Modal(
        document.getElementById("modalCategoriaGas")
      );
      modalIngresos.show();
      this.seleccionarIconoGasto(this);
      this.seleccionarColorGasto(this);
    },
    modalEditarCategoriaIng(self) {
      //  ---------- MODAL PARA EDITAR INGRESOS ---------------
      $(document).on("click", ".editarCategoriaIngreso", function () {
        self.editar = true;
        let id_ingreso = $(this).attr("editIdIngreso");
        self.id_registro_editar = id_ingreso;
        let newForm = new FormData();
        newForm.append("action", "getCatIngEdit");
        newForm.append("id", id_ingreso);
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
              let actual = data.result;
              self.titulo_modal = "Editar Categoria para Ingresos ";
              self.nombre = actual.nombre;
              self.descripcion = actual.descripcion;
              self.icon_seleccionado = actual.icono;
              self.iconoIngreso = actual.icono;
              self.colorIngreso = actual.color;
              self.seleccionarIconoIngreso(self);
              self.seleccionarColorIngreso(self);
              let modalCategoriaIng = new bootstrap.Modal(
                document.getElementById("modalCategoriaIng")
              );
              modalCategoriaIng.show();
            }
          });
      });
    },
    modalEditarCategoriaGas(self) {
      //  ---------- MODAL PARA EDITAR GASTOS ---------------
      $(document).on("click", ".editarCategoriaGasto", function () {
        self.editar = true;
        let id_ingreso = $(this).attr("editIdGasto");
        self.id_registro_editar = id_ingreso;
        let newForm = new FormData();
        newForm.append("action", "getCatGasEdit");
        newForm.append("id", id_ingreso);
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
              let actual = data.result;
              self.titulo_modal = "Editar Categoria para Gastos ";
              self.nombre_gas = actual.nombre;
              self.descripcion_gas = actual.descripcion;
              self.icon_seleccionado = actual.icono;
              self.iconoGasto = actual.icono;
              self.colorGasto = actual.color;
              self.seleccionarIconoGasto(self);
              self.seleccionarColorGasto(self);
              let modalCategoriaGas = new bootstrap.Modal(
                document.getElementById("modalCategoriaGas")
              );
              modalCategoriaGas.show();
            }
          });
      });
    },
    agregarCategoriaIng() {
      console.log("agregando");
      let form = document.getElementById("formCatIng");
      let newForm = new FormData(form);
      newForm.append("action", "agregarCatIng");
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
            let modalCategoriaIng = new bootstrap.Modal(
              document.getElementById("modalCategoriaIng")
            );
            modalCategoriaIng.hide();
            Swal.fire({
              title: "Categoria Ingreso registrado",
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
          }
        });
    },
    editarCategoriaIng() {
      console.log("editando");
      let form = document.getElementById("formCatIng");
      let newForm = new FormData(form);
      newForm.append("id", this.id_registro_editar);
      newForm.append("action", "editarCatIng");
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
            let modalCategoriaIng = new bootstrap.Modal(
              document.getElementById("modalCategoriaIng")
            );
            modalCategoriaIng.hide();
            Swal.fire({
              title: "Categoria Ingreso actualizado",
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
          }
        });
    },
    agregarCategoriaGas() {
      console.log("agregando");
      let form = document.getElementById("formCatGas");
      let newForm = new FormData(form);
      newForm.append("action", "agregarCatGas");
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
            let modalCategoriaGas = new bootstrap.Modal(
              document.getElementById("modalCategoriaGas")
            );
            modalCategoriaGas.hide();
            Swal.fire({
              title: "Categoria Gasto registrado",
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
          }
        });
    },
    editarCategoriaGas() {
      console.log("agregando");
      let form = document.getElementById("formCatGas");
      let newForm = new FormData(form);
      // console.log(newForm.get("nombre_gas"));
      // console.log(newForm.get("descripcion_gas"));
      newForm.append("id", this.id_registro_editar);
      newForm.append("action", "editarCatGas");
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
            let modalCategoriaGas = new bootstrap.Modal(
              document.getElementById("modalCategoriaGas")
            );
            modalCategoriaGas.hide();
            Swal.fire({
              title: "Categoria Gasto Actualizado",
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
          }
        });
    },
  },
});
