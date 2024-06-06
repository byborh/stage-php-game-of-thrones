console.log("efvhjyhgrfeadzeb");

function auth() {
  var btnAuth = document.getElementById("switch");
  var inscription = document.getElementById("inscription");
  var connexion = document.getElementById("connexion");
  if (inscription.style.display === "none") {
    inscription.style.display = "block";
    connexion.style.display = "none";
    btnAuth.innerText = "Se connecter";
  } else {
    inscription.style.display = "none";
    connexion.style.display = "block";
    btnAuth.innerText = "S'inscrire";
  }
}
