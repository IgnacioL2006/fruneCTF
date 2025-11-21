function load_comments(data) {
    const comments_container = document.getElementById("comments-section");
    if (!comments_container) return; // Se agrega verificación
    comments_container.innerHTML = "";

    data.forEach(row => {
        const comment_box = document.createElement("div");
        comment_box.className = "comment-box";

        const img = document.createElement("img");
        img.src = row.photo_url || "images/user-images/user_image_default.png";
        img.className = "comment-user-img";
        comment_box.appendChild(img);

        const username = document.createElement("strong");
        username.textContent = row.webname;
        comment_box.appendChild(username);

        const content = document.createElement("p");
        content.textContent = row.content;
        comment_box.appendChild(content);

        const footer = document.createElement("small");
        footer.textContent = "Publicado el " + row.created_at;

        if (row.updated_at && row.updated_at !== row.created_at) {
            footer.textContent += " - (Editado)";
        }
        comment_box.appendChild(footer);

        // NOTA: sessionUserId DEBE ser una variable global definida en el HTML
        if (typeof sessionUserId !== 'undefined' && row.user_id == sessionUserId) {
            const btnContainer = document.createElement("div");
            btnContainer.className = "mt-2";

            const editBtn = document.createElement("button");
            editBtn.className = "btn edit-btn btn-sm me-2";
            editBtn.style.backgroundColor = "rgb(92, 115, 163)"; 
            editBtn.style.color = "#fff";
            editBtn.textContent = "Editar";
            editBtn.onclick = () => editComment(row.id, row.content);
            btnContainer.appendChild(editBtn);

            const deleteBtn = document.createElement("button");
            deleteBtn.className = "btn delete-btn btn-sm";
            deleteBtn.style.backgroundColor = "#ff4444";
            deleteBtn.style.color = "#fff";
            deleteBtn.textContent = "Eliminar";
            deleteBtn.onclick = () => deleteComment(row.id);
            btnContainer.appendChild(deleteBtn);

            comment_box.appendChild(btnContainer);
        }
        comments_container.appendChild(comment_box);
    });
}

function editComment(commentId, oldContent) {
    // NOTA: $ (jQuery) DEBE estar disponible globalmente
    if (typeof $ === 'undefined') { console.error("jQuery no está cargado."); return; }
    const newContent = prompt("Editar comentario:", oldContent);
    if (!newContent) return;
    $.post("../edit_comment.php", { id: commentId, content: newContent }, function (resp) { location.reload(); })
    .fail(function(err) { console.error("Error edit comment:", err); });
}

function deleteComment(commentId) {
    if (typeof $ === 'undefined') { console.error("jQuery no está cargado."); return; }
    if (!confirm("Estás seguro de eliminar el comentario?")) return;
    $.post("../delete_comment.php", { id: commentId }, function(resp) { location.reload(); })
    .fail(function(err) { console.error("Error deleting comment:", err); });
}



function Create_newsletter(data) {
    const news_container = document.getElementById("news_container");
    if (!news_container) return; // Se agrega verificación
    news_container.innerHTML = "";

    data.forEach((row) => {
        const news_letter = document.createElement("div");
        news_letter.className = "news_letter";

        const title = document.createElement("h1");
        title.textContent = row.title;
        news_letter.appendChild(title);

        const sub_title = document.createElement("p");
        sub_title.innerHTML = `
            <img src="${row.photo_url || 'images/user-images/user_image_default.png'}" 
                class="comment-user-img">
            <strong>${row.webname}</strong> el ${row.date}
        `;
        news_letter.appendChild(sub_title);

        const body_container = document.createElement("div");
        body_container.className = "news_letter_body";

        const body = document.createElement("p");
        body.textContent = row.body;
        body_container.appendChild(body);

        news_letter.appendChild(body_container);
        news_container.appendChild(news_letter);
    });
}

function loadHeader() {
    fetch("header.php")
        .then(response => response.text())
        .then(data => {
            const headerElement = document.getElementById("header");
            if (headerElement) headerElement.innerHTML = data;
        });
}

function loadFooter() {
    fetch("footer.html")
        .then(response => response.text())
        .then(data => {
            const footerElement = document.getElementById("footer");
            if (footerElement) footerElement.innerHTML = data;
        });
}

function toggleDescForm() {
    const f = document.getElementById('desc-form');
    f.style.display = (f.style.display === 'none' || f.style.display === '') ? 'block' : 'none';
}

function toggleImgForm() {
    const f = document.getElementById('img-form');
    f.style.display = (f.style.display === 'none' || f.style.display === '') ? 'block' : 'none';
}

document.addEventListener("DOMContentLoaded", function() {

    // --- 2.1 Estructura: Cargar Header y Footer ---
    loadHeader();
    loadFooter(); 

    // --- 2.2 Contenido: Carga Dinámica de Comentarios y Noticias ---
    
    // Cargar Comentarios (se llama a fetch y load_comments)
    if (typeof pageUserId !== 'undefined') {
        fetch("retrieve_comment.php?user_id=" + pageUserId)
            .then((response) => response.json())
            .then((data) => {
                load_comments(data);
            })
            .catch((error) => console.log("Error loading comments", error));
    }

    // Cargar Noticias (se llama a fetch y Create_newsletter)
    fetch("/retrieve_news.php") 
        .then(response => response.json())
        .then(news_data => {
            Create_newsletter(news_data);
        })
        .catch((error) => console.log("Error loading news", error));


    // --- 2.3 Eventos del Formulario de Contacto (submit, mouseover, mouseout) ---
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        contactForm.addEventListener("submit", function (e) {
            e.preventDefault(); 
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();
            const feedback = document.getElementById("feedback"); 

            if (name === "" || email === "" || message === "") {
                feedback.textContent = "Por favor completa todos los campos."; 
                feedback.style.color = "red"; 
                return; 
            }
            if (!/\S+@\S+\.\S+/.test(email)) {
                feedback.textContent = "El correo electrónico no es válido."; 
                feedback.style.color = "red"; 
                return;
            }

            feedback.textContent = "Formulario enviado.";
            feedback.style.color = "green";
            alert(`Gracias ${name} por contactarnos, te atenderemos lo antes posible en ${email}`);
        });
    }

    const submitBtn = document.getElementById("submitBtn"); 
    if (submitBtn) {
        submitBtn.addEventListener("mouseover", () => {
            submitBtn.style.backgroundColor = "rgb(0, 200, 255)"; 
            submitBtn.style.color = "white"; 
        });

        submitBtn.addEventListener("mouseout", () => {
            submitBtn.style.backgroundColor = ""; 
            submitBtn.style.color = ""; 
        });
    }

    // --- 2.4 Eventos del Slider de Formulario (click en pestañas) ---
    const loginTab    = document.getElementById("login-tab");
    const registerTab = document.getElementById("register-tab");
    const slider      = document.querySelector(".forms-slider");

    if (loginTab && registerTab && slider) { // Se agrega verificación de slider
        loginTab.addEventListener("click", () => {
            slider.style.transform = "translateX(0)";
            loginTab.classList.add("active");
            registerTab.classList.remove("active");
        });

        registerTab.addEventListener("click", () => {
            slider.style.transform = "translateX(-50%)";
            registerTab.classList.add("active");
            loginTab.classList.remove("active");
        });
    }
});



// Array de actividades: cada elemento tiene [nombre, descripción, dificultad (1-7), ruta del enlace]
const activities = [
    ["Top de nombres para perros", "Encuentra información oculta en un simple e inocente blog canino | 2 Mins", 1, "activities/activity1/1-1.html"], 
    ["Detective de imágenes", "Demuestra tus habilidades de OSINT en este desafío introductorio! | 3 Mins.", 2, "activities/activity2/2-1.html"],
    ["El codigo secreto", "Encuentra el codigo secreto aplicando ingeniería inversa | 6 Mins", 2, "activities/activity3/3-1.html"],
    ["Fiesta de figuras", "Ayuda a un circulo a superar un momento incómodo | 15 Mins.", 5, "activities/activity4/4-1.html"]
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

