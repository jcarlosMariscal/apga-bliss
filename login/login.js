var app = new Vue({
  el: "#vue-login",
  data: {
    email: "",
    password: "",
    statusErr: false,
    error: "",
  },
  mounted: function () {
    // window.onload = function () {
    //   google.accounts.id.initialize({
    //     client_id:
    //       "911606316702-ms0qdt6qigj3q35q91dijgv7fmrfjubm.apps.googleusercontent.com",
    //     callback: this.handleCredentialResponse,
    //   });
    //   google.accounts.id.renderButton(
    //     document.getElementById("buttonDiv"),
    //     { theme: "outline", size: "large", type: "icon", shape: "circle" } // customization attributes
    //   );
    //   console.log("que tal");
    // };
    let usuario = document.getElementById("usuario");
    // console.log(usuario.innerText);
  },
  methods: {
    login(event) {
      let form = document.getElementById("formulario");
      if (!form.checkValidity()) {
        // event.preventDefault(); event.stopPropagation();
        form.classList.add("was-validated");
        return;
      }
      let newForm = new FormData(form);
      newForm.append("action", "login");
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
            localStorage.setItem("login", "success");
            // localStorage.setItem("user_token", data.token);
            window.location.href = "../index.php";
          }
          if (data.status == "err") {
            this.statusErr = true;
            this.error = data.message;
            return;
          }
        });
    },
    handleCredentialResponse(response) {
      console.log("llamar");
      console.log("Encoded JWT ID token: " + response.credential);
      const responsePayload = jwt_decode(response.credential);
      console.log(responsePayload);

      console.log("ID: " + responsePayload.sub);
      console.log("Full Name: " + responsePayload.name);
      console.log("Given Name: " + responsePayload.given_name);
      console.log("Family Name: " + responsePayload.family_name);
      console.log("Image URL: " + responsePayload.picture);
      console.log("Email: " + responsePayload.email);
    },
  },
});
