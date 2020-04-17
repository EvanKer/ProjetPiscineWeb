function changeLink() {
    var link = document.getElementById("mylink");


    link.innerHTML = "Mon Compte";
    link.setAttribute('href', "home.php");

    return false;
}