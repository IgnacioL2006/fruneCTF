document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Evita que el formulario se envíe

  // Obtener valores ingresados por el usuario 
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const message = document.getElementById("message").value.trim();
  const feedback = document.getElementById("feedback"); // <-- Donde se mostrará retroalimentación

  // Verificar que todos los campos estén completos
  if (name === "" || email === "" || message === "") {
    feedback.textContent = "Por favor completa todos los campos."; 
    feedback.style.color = "red"; 
    return; 
  }
  // Verificar correo válido
  if (!/\S+@\S+\.\S+/.test(email)) {
    feedback.textContent = "El correo electrónico no es válido."; 
    feedback.style.color = "red"; 
    return;
  }

  // Mostrar mensaje
  feedback.textContent = "Formulario enviado.";
  feedback.style.color = "green";

  // Mostrar una alerta
  alert(`Gracias ${name} por contactarnos, te atenderemos lo antes posible en ${email}`);
});

// Obtener ID Botón
const submitBtn = document.getElementById("submitBtn"); 

// Cambiar el color del botón cuando el mouse está sobre él
submitBtn.addEventListener("mouseover", () => {
  submitBtn.style.backgroundColor = "rgb(0, 200, 255)"; // Fondo azul claro
  submitBtn.style.color = "white"; // Texto en blanco
});

// Volver al estilo original 
submitBtn.addEventListener("mouseout", () => {
  submitBtn.style.backgroundColor = ""; 
  submitBtn.style.color = ""; 
});
