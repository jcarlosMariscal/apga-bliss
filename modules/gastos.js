var app = new Vue({
  el: "#vue-content",
  data: {
    table: "",
    allCategorias: "",
    allEspacios: "",
    titulo_modal: "",
    id_registro: null,
    cantidad: null,
    categoria: "",
    fecha: null,
    tipo: null,
    descripcion: null,
    espacio: null,
    editar: false,
    select_espacio: "",
    vista_actual: "",
  },
  mounted: function () {
    const self = this;
    this.obtenerGastos();
    this.obtenerCategorias();
    this.obtenerEspacios();
    this.generarGraficas();
    this.chartAreaDemo();
    this.chartPieDemo();
    //  ---------- MODAL PARA EDITAR GASTOS ---------------
    $(document).on("click", ".editar", function () {
      self.editar = true;
      let id_ingreso = $(this).attr("eId");
      self.id_registro = id_ingreso;
      let newForm = new FormData();
      newForm.append("action", "getGastoEditar");
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
            self.titulo_modal = "Editar Gastos ";
            self.cantidad = actual.cantidad;
            self.categoria = actual.id_cGasto;
            self.fecha = actual.fecha;
            self.espacio = actual.id_espacio;
            let modalGastos = new bootstrap.Modal(
              document.getElementById("modalGastos")
            );
            modalGastos.show();
          }
        });
    });
    // DETECTAR ESPACIO EN LA URL
    const URL = window.location.search;
    const urlActual = new URLSearchParams(URL);
    this.select_espacio = urlActual.get("espacio");
    this.vista_actual = urlActual.get("view");
  },
  methods: {
    //  ------------------ OBTENER DATOS DE CATEGORIA DE GASTOS ---------------
    obtenerCategorias() {
      let newForm = new FormData();
      newForm.append("action", "categoriaGastosForm");
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
            this.allCategorias = Array.from(data.result);
        });
    },
    obtenerEspacios() {
      let newForm = new FormData();
      newForm.append("action", "obtenerEspacioIngresos");
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
            this.allEspacios = Array.from(data.result);
        });
    },
    // ---------------- MODAL PARA AGREGAR UN INGRESO -----------------
    modalGastos() {
      this.editar = false;
      this.titulo_modal = "Nuevo Gasto";
      this.cantidad = null;
      this.categoria = "";
      this.fecha = null;
      this.espacio = "";
      let modalGastos = new bootstrap.Modal(
        document.getElementById("modalGastos")
      );
      modalGastos.show();
    },
    // ------------------ OBTENER DATOS DE GASTOS Y PINTARLOS EN LA TABLA ---------------
    obtenerGastos: async function () {
      // Obtener el valor de la variable por GET
      console.log("joom");
      var urlParams = new URLSearchParams(window.location.search);
      const ESPACIO = urlParams.get("espacio");
      console.log(ESPACIO);
      let newForm = new FormData();
      newForm.append("action", "obtenerGastos");
      newForm.append("espacio", ESPACIO);
      await fetch("./bd/data/read.php", {
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
            this.table = $("#datatable-gastos").DataTable({
              responsive: true,
              data: data.result,
              columns: [
                { data: "fecha" },
                { data: "cantidad" },
                { data: "espacio" },
                { data: "categoria" },
                { data: "editar" },
                { data: "eliminar" },
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
                info: "Mostrando _TOTAL_ registros de p??gina _PAGE_ de _PAGES_, de _MAX_ registros en total  ",
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
          }
          if (data.status == "err") {
            console.log(data.message);
            return;
          }
        });
    },
    agregarGasto() {
      console.log("agregando");
      let form = document.getElementById("formGasto");
      // if (!form.checkValidity()) {
      // form.classList.add("was-validated");
      // return;
      // }
      let newForm = new FormData(form);
      newForm.append("action", "agregarGasto");
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
            let modalGastos = new bootstrap.Modal(
              document.getElementById("modalGastos")
            );
            modalGastos.hide();
            Swal.fire({
              title: "Gasto registrado",
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
    editarGasto() {
      console.log("editando");
      let form = document.getElementById("formGasto");
      let newForm = new FormData(form);
      newForm.append("action", "editarGasto");
      newForm.append("id_gasto", this.id_registro);
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
            let modalGastos = new bootstrap.Modal(
              document.getElementById("modalGastos")
            );
            modalGastos.hide();
            Swal.fire({
              title: "Gasto Editado",
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
    // ------------------- FUNCI??N PARA GENERAR GR??FICAS -------------------
    generarGraficas() {
      // const ctx = document.getElementById("myChart");
      const ctx2 = document.getElementById("myChart2");
      if (ctx2) {
        const labels = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ];
        const data = {
          labels: labels,
          datasets: [
            {
              label: "My First Dataset",
              data: [65, 59, 80, 81, 56, 55, 40],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(255, 159, 64, 0.2)",
                "rgba(255, 205, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(201, 203, 207, 0.2)",
              ],
              borderColor: [
                "rgb(255, 99, 132)",
                "rgb(255, 159, 64)",
                "rgb(255, 205, 86)",
                "rgb(75, 192, 192)",
                "rgb(54, 162, 235)",
                "rgb(153, 102, 255)",
                "rgb(201, 203, 207)",
              ],
              borderWidth: 1,
            },
          ],
        };
        new Chart(ctx2, {
          type: "bar",
          data: data,
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        });
        const labels2 = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ];
      }
    },
    chartAreaDemo() {
      // Set new default font family and font color to mimic Bootstrap's default styling
      (Chart.defaults.global.defaultFontFamily = "Nunito"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#858796";

      function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + "").replace(",", "").replace(" ", "");
        var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
          dec = typeof dec_point === "undefined" ? "." : dec_point,
          s = "",
          toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
          };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
        if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || "").length < prec) {
          s[1] = s[1] || "";
          s[1] += new Array(prec - s[1].length + 1).join("0");
        }
        return s.join(dec);
      }

      // Area Chart Example
      var ctx = document.getElementById("myAreaChart");
      var myLineChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "Earnings",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: [
                0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000,
                25000, 40000,
              ],
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0,
            },
          },
          scales: {
            xAxes: [
              {
                time: {
                  unit: "date",
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                },
                ticks: {
                  maxTicksLimit: 7,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
                  callback: function (value, index, values) {
                    return "$" + number_format(value);
                  },
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2],
                },
              },
            ],
          },
          legend: {
            display: false,
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: "index",
            caretPadding: 10,
            callbacks: {
              label: function (tooltipItem, chart) {
                var datasetLabel =
                  chart.datasets[tooltipItem.datasetIndex].label || "";
                return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
              },
            },
          },
        },
      });
    },
    chartPieDemo() {
      // Set new default font family and font color to mimic Bootstrap's default styling
      (Chart.defaults.global.defaultFontFamily = "Nunito"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#858796";

      // Pie Chart Example
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["Direct", "Referral", "Social"],
          datasets: [
            {
              data: [55, 30, 15],
              backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
              hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false,
          },
          cutoutPercentage: 80,
        },
      });
    },
  },
});
