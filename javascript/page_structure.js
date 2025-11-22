function loadHeader() {
    fetch("header.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header").innerHTML = data;
        });
}

function loadFooter() {
    fetch("footer.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("footer").innerHTML = data;
        });
}

document.addEventListener("DOMContentLoaded", function() {
    loadHeader();
    loadFooter(); 
});