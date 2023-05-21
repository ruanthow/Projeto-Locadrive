let btnLogin = document.getElementById("login");
var navMobile = document.querySelector(".nav-mobile-menu");

function openModal(){
   console.log("abriu");
}

function closeMenu(){
   navMobile.style.width = "0px"
}

function showMenu(){
   navMobile.style.width = "100%"
}

/*SCROLL SUAVE */

window.scroll({
   top:0,
   behavior: 'smooth',
})

/* ACORDEAO */

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

