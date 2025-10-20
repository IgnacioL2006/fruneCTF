document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("puzzleForm");
    const mensaje = document.getElementById("mensaje");

    // Traemos la respuesta correcta desde PHP
    fetch('aswner.php')
        .then(response => response.json())
        .then(letrasCorrectas => {

            function validarRespuesta(formulario, letrasCorrectas) {
                let respuestaUsuario = [];
                letrasCorrectas.forEach((_, index) => {
                    const input = formulario.querySelector(`#respuesta${index + 1}`);
                    respuestaUsuario.push(input.value.trim().toLowerCase());
                });

                const correcta = letrasCorrectas.map(l => l.toLowerCase());
                const Correct = respuestaUsuario.every((letra, i) => letra === correcta[i]);

                if (Correct) {
                    mensaje.innerText = "✅ ¡Correcto! Puedes continuar.";
                    setTimeout(() => window.location.href = "4-2.html", 1500);
                } else {
                    mensaje.innerText = "❌ No exactamente.";
                }
            }

            form.addEventListener("submit", function(event) {
                event.preventDefault();
                validarRespuesta(this, letrasCorrectas);
            });

        })
        .catch(err => {
            console.error("No se pudo cargar la respuesta correcta", err);
        });
});
