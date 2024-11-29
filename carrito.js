document.addEventListener('DOMContentLoaded', () => {
    const carritoBtns = document.querySelectorAll('.agregar-carrito');

    carritoBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            // Redirigir al enlace del carrito sin interferencias
            const url = e.target.getAttribute('href');
            if (url) {
                window.location.href = url;
            }
        });
    });
});