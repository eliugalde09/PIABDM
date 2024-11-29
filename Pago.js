document.addEventListener("DOMContentLoaded", () => {
    const formPago = document.getElementById("form-pago");
    const formNuevoMetodo = document.getElementById("form-nuevo-metodo");
    const selectType = document.getElementById("type");
    const inputCVV = document.getElementById("cvv");
    const feedbackCVV = document.getElementById("cvv-feedback");

    // Validación del CVV
    formPago.addEventListener("submit", async (event) => {
        event.preventDefault();
        const idMetodo = selectType.value;
        const cvv = inputCVV.value;

        const response = await fetch("validar_cvv.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id_metodo: idMetodo, cvv }),
        });

        const result = await response.json();
        if (result.success) {
            alert("Compra realizada con éxito.");
            window.location.href = "MiCurso.html";
        } else {
            feedbackCVV.style.display = "block";
        }
    });

    // Guardar nuevo método de pago
    formNuevoMetodo.addEventListener("submit", async (event) => {
        event.preventDefault();
        const formData = new FormData(formNuevoMetodo);

        const response = await fetch("agregar_metodo.php", {
            method: "POST",
            body: formData,
        });

        const result = await response.json();
        if (result.success) {
            alert("Nuevo método agregado.");
            location.reload();
        } else {
            alert("Error al agregar el método de pago.");
        }
    });
});
