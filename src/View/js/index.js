let btnLogin = document.getElementById("login");
var navMobile = document.querySelector(".nav-mobile-menu");
let menuLogado = document.querySelector(".submenu-user")
let openMenuLogado = false;

function closeMenu() {
   navMobile.style.width = "0px"
}

function showMenu() {
   navMobile.style.width = "100%"
}

function showMenuLogado() {

   if (!openMenuLogado) {
      menuLogado.style.transform = "scaleY(1)"
      openMenuLogado = true;
   }
   else if (openMenuLogado) {
      menuLogado.style.transform = "scaleY(0)"
      openMenuLogado = false
   }
}

function deslogar() {

   let dados = {
      logout: "yes"
   }

   $.ajax({
      url: "/Projeto-Locadrive/src/Controller/loginCliente.php",
      type: 'POST',
      data: dados,
      datatype: 'json'

   }).done(() => {
      location.reload();
   }).fail((jqXHR, textStatus, errorThrown) => {
      console.log(errorThrown);
   })
}

/*SCROLL SUAVE */

window.scroll({
   top: 0,
   behavior: 'smooth',
})

/* ACORDEAO */

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
   acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
         panel.style.display = "none";
      } else {
         panel.style.display = "block";
      }
   });
}


/* SLIDES */

var radio = document.querySelector(`.manual-btn`)
var cont = 1

document.getElementById(`radio1`).checked = true

setInterval(() => {
   proximaimg()
}, 5000)

function proximaimg() {
   cont++

   if (cont > 3) {
      cont = 1
   }

   document.getElementById(`radio` + cont).checked = true
}
