const form = document.getElementById("puzzle_form");

// Al clickear el submit, se revisa si la respuesta es correcta
form.addEventListener("submit", function(event) {
    event.preventDefault();

    // "this" hace referencia al formulario que disparó el evento
    const number1 = parseInt(this.num1.value, 10);
    const number2 = parseInt(this.num2.value, 10);

    if (code_checker(number1, number2)) {
        window.location.href = "3-2.html";
    }
});

// Función que revisa si la respuesta es correcta
function code_checker(num1, num2) {
    if ((((num1 + 50) / 4) * 15 * (num2 * 2)) === 300) {
        console.log("The numbers are correct");
        return true;
    } else {
        return false;
    }
}
