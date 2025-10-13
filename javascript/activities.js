// Array de actividades: cada elemento tiene [nombre, descripción, dificultad (1-7), ruta del enlace]
const activities = [
    ["Top de nombres para perros", "Encuentra información oculta en un simple e inocente blog canino | 2 Mins", 1, "activities/activity1/1-1.html"], 
    ["Detective de imágenes", "Demuestra tus habilidades de OSINT en este desafío introductorio! | 3 Mins.", 2, "activities/activity2/2-1.html"],
    ["Fiesta de figuras", "Ayuda a un circulo a superar un momento incómodo | 15 Mins.", 4, "activities/activity2/2-1.html"]
];

// Selecciona en el HTML el <ul> donde vamos a poner las actividades
const ul = document.getElementById("lista-actividades");

// Recorre cada actividad en el array
activities.forEach(([nombre, descripcion, dificultad, ruta]) => {

    // ########## GUARDAR ELEMENTOS HTML ##########

    // Crea un <li> que contendrá toda la actividad
    const li = document.createElement("li");

    // Crea un <a> que actuará como botón y enlazará a la ruta de la actividad
    const a = document.createElement("a");
    a.href = ruta;                   // Asigna la ruta del enlace
    a.className = "actividad-boton"; // Clase CSS para el estilo del botón

    // Crea un <h3> para el nombre de la actividad
    const h3 = document.createElement("h3");
    h3.textContent = nombre;       // Le asigna el nombre del juego

    // Crea un <p> para la descripción de la actividad
    const p = document.createElement("p");
    p.textContent = descripcion;   // Le asigna la descripción

    // Crea un <div> que muestra la dificultad
    const diff = document.createElement("div");
    diff.className = "dificultad";                       
    diff.textContent = "Dificultad de la actividad: " + dificultad + "/7";

    // Asigna clase según nivel
    if (dificultad <= 2) {
        diff.classList.add("facil");
    } else if (dificultad <= 4) {
        diff.classList.add("media");
    } else {
        diff.classList.add("dificil");
    }

    // ########## ARMAR ESTRUCTURA HTML ##########
    a.appendChild(h3);
    a.appendChild(p);     
    a.appendChild(diff);

    li.appendChild(a);    
    ul.appendChild(li);   
    
    /* 
    Ejemplo de cómo se vería en HTML 

    <ul id="lista-actividades">
        <li>
            <a href="ruta-de-la-actividad" class="actividad-boton">
                <h3>Nombre de la actividad</h3>
                <p>Descripción de la actividad</p>
                <div class="dificultad">Dificultad: 2/7</div>
            </a>
        </li>
    </ul>
    */

});
