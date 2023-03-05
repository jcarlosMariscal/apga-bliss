var app = new Vue({
  el: "#vue-register",
  data: {
    nombre: "",
    apellidos: "",
    email: "",
    password: "",
    statusErr: false,
    error: "",
  },
  mounted: function () {},
  methods: {
    register(event) {
      let form = document.getElementById("formulario");
      if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
      }
      let newForm = new FormData(form);
      newForm.append("action", "register");
      fetch("../bd/data/login.php", {
        method: "POST",
        body: newForm,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "error") {
            this.statusErr = true;
            this.error = data.message;
            return;
          }
          if (data.status == "success") {
            localStorage.setItem("register", "success");
            window.location.href = "./login.php";
          }
          if (data.status == "err") {
            this.statusErr = true;
            this.error = data.message;
            return;
          }
        });
    },
  },
});
