document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("puzzleForm");
    const mensaje = document.getElementById("mensaje");

    // Obtener la respuesta
    fetch('aswner.php')
        .then(response => response.json())
        .then(letrasCorrectas => {

            // Función que valida la respuesta del usuario
            function validarRespuesta(formulario, letrasCorrectas) {
                let respuestaUsuario = [];
                
                // Recorrer los inputs ingresados
                letrasCorrectas.forEach((_, index) => {
                    const input = formulario.querySelector(`#respuesta${index + 1}`);
                    respuestaUsuario.push(input.value.trim().toLowerCase());
                });

                // Convertir a minúsculas y comprobar
                const correcta = letrasCorrectas.map(l => l.toLowerCase());
                const Correct = respuestaUsuario.every((letra, i) => letra === correcta[i]);

                if (Correct) {
                    mensaje.innerText = "✅ ¡Correcto! Puedes continuar.";
                    setTimeout(() => window.location.href = "4-2.html", 1500);
                } else {
                    mensaje.innerText = "❌ No exactamente.";
                }
            }

            // LLamar función
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                validarRespuesta(this, letrasCorrectas); // `this` aquí se refiere al formulario que disparó el submit
            });

        })
        .catch(err => {
            console.error("No se pudo cargar la respuesta correcta", err);
        });
});
