document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal");
    const closeModal = document.getElementById("close-modal");
    const modalContent = document.querySelector(".contenidoModal");
    const openModalButtons = document.querySelectorAll(".open-modal");

    openModalButtons.forEach(button => {
        button.addEventListener("click", () => {
            const action = button.getAttribute("data-action");
            const clientName = button.getAttribute("data-client");
            
            // Cambiar contenido según la acción
            if (action === "view") {
                modalContent.innerHTML = `
                    <h2>Detalles del Cliente</h2>
                    <p>Detalles de: ${clientName}</p>
                    <div class="btn-cerrar">
                        <button id="close-modal">Cerrar</button>
                    </div>
                `;
            } else if (action === "edit") {
                modalContent.innerHTML = `
                    <h2>Editar Cliente</h2>
                    <form id="edit-form">
                        <label for="client-name">Nombre:</label>
                        <input type="text" id="client-name" value="${clientName}" required>
                        <label for="client-sales">Ventas:</label>
                        <input type="number" id="client-sales" min="0" required>
                        <button type="submit">Guardar Cambios</button>
                    </form>
                    <div class="btn-cerrar">
                        <button id="close-modal">Cerrar</button>
                    </div>
                `;
            } else if (action === "delete") {
                modalContent.innerHTML = `
                    <h2>Eliminar Cliente</h2>
                    <p>¿Estás seguro de que deseas eliminar a ${clientName}?</p>
                    <button id="confirm-delete">Eliminar</button>
                    <div class="btn-cerrar">
                        <button id="close-modal">Cancelar</button>
                    </div>
                `;
            }

            // Mostrar el modal
            modal.classList.add("active");

            // Agregar eventos dinámicos al nuevo contenido
            document.getElementById("close-modal").addEventListener("click", () => {
                modal.classList.remove("active");
            });

            if (action === "delete") {
                document.getElementById("confirm-delete").addEventListener("click", () => {
                    alert(`${clientName} ha sido eliminado.`);
                    modal.classList.remove("active");
                });
            }

            if (action === "edit") {
                document.getElementById("edit-form").addEventListener("submit", (e) => {
                    e.preventDefault();
                    const updatedName = document.getElementById("client-name").value;
                    const updatedSales = document.getElementById("client-sales").value;
                    alert(`Cliente actualizado: ${updatedName}, Ventas: ${updatedSales}`);
                    modal.classList.remove("active");
                });
            }
        });
    });

    // Cerrar el modal al hacer clic fuera de él
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.remove("active");
        }
    });
});
