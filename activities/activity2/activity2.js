
document.addEventListener("DOMContentLoaded", () => {

    //Variavle que accede al formulario del puzzle
    const form = document.getElementById("puzzleForm");

    //Se ejecuta una función al enviar una respuesta en el formulario.
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // evita que se recargue la pagina

        //Se guarda la respuesta del usuario, normalizando en minuscula, y eliminando espacios vacios en los extremos
        const respuesta = document.getElementById("respuesta").value.trim().toLowerCase(); 

        const correcta = "universidad san sebastian"; //Respuesta correcta

        //Se comprueba si el usuario respondió correctamente
        if (respuesta === correcta)
        
        // Caso correcto, se le redirige a otra pagina
        {
            document.getElementById("mensaje").innerText = "✅ ¡Correcto! Puedes continuar.";
            setTimeout(() => {
                window.location.href = "2-2.html";
            }, 1500);
        } 

        // Caso incorrecto, se muestra un mensaje
        else {document.getElementById("mensaje").innerText = "❌ No exactamente.";}
    });
});
