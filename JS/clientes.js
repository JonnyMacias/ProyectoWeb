document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal"); // Modal principal
    const modalContent = document.querySelector(".contenidoModal"); // Contenido dinámico dentro de la modal
    const openModalButtons = document.querySelectorAll(".open-modal"); // Botones para abrir el modal

    // Iterar sobre cada botón que abre el modal
    openModalButtons.forEach(button => {
        button.addEventListener("click", () => {
            const action = button.getAttribute("data-action"); // Obtener acción (view, edit, delete)
            const clientId = button.getAttribute("data-id"); // Obtener ID del cliente
            const clientName = button.getAttribute("data-client"); // Obtener nombre del cliente
            
            // Cambiar el contenido de la modal según la acción
            if (action === "view") {
                modalContent.innerHTML = `
                    <h2>Detalles del Cliente</h2>
                    <p>Nombre: ${clientName}</p>
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
                        <br>
                        <label for="client-lastname">Apellido:</label>
                        <input type="text" id="client-lastname" required>
                        <br>
                        <label for="client-email">Email:</label>
                        <input type="email" id="client-email">
                        <br>
                        <label for="client-phone">Teléfono:</label>
                        <input type="text" id="client-phone">
                        <br>
                        <label for="client-address">Dirección:</label>
                        <input type="text" id="client-address">
                        
                        <button id="save-changes" type="submit">Guardar Cambios</button>
                    </form>
                    <div class="btn-cerrar">
                        <button id="close-modal">Cerrar</button>
                    </div>
                `;
                
                // Evento para enviar el formulario
                document.getElementById("edit-form").addEventListener("submit", (e) => {
                    e.preventDefault();

                    // Recoger los datos del formulario
                    const updatedName = document.getElementById("client-name").value;
                    const updatedLastName = document.getElementById("client-lastname").value;
                    const updatedEmail = document.getElementById("client-email").value;
                    const updatedPhone = document.getElementById("client-phone").value;
                    const updatedAddress = document.getElementById("client-address").value;

                    // Enviar los datos a través de fetch
                    fetch("acciones_cliente.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `action=edit&id=${clientId}&nombre=${updatedName}&apellido=${updatedLastName}&email=${updatedEmail}&telefono=${updatedPhone}&direccion=${updatedAddress}`,
                    })
                        .then(response => response.text())
                        .then(data => {
                            alert(data); // Mostrar respuesta del servidor
                            location.reload(); // Recargar la página para actualizar la tabla
                        })
                        .catch(error => console.error("Error:", error));
                });
            } else if (action === "delete") {
                modalContent.innerHTML = `
                    <h2>Eliminar Cliente</h2>
                    <p>¿Estás seguro de que deseas eliminar a ${clientName}?</p>
                    <div class="btn-eliminar">
                        <button id="confirm-delete">Eliminar</button>
                        <button id="close-modal">Cancelar</button>
                    </div>
                `;

                // Evento para confirmar eliminación
                document.getElementById("confirm-delete").addEventListener("click", () => {
                    fetch("acciones_cliente.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `action=delete&id=${clientId}`,
                    })
                        .then(response => response.text())
                        .then(data => {
                            alert(data); // Mostrar respuesta del servidor
                            location.reload(); // Recargar la página para actualizar la tabla
                        })
                        .catch(error => console.error("Error:", error));
                });
            }

            // Mostrar el modal
            modal.classList.add("active");

            // Evento para cerrar el modal
            document.getElementById("close-modal").addEventListener("click", () => {
                modal.classList.remove("active");
            });
        });
    });

    // Cerrar el modal al hacer clic fuera de él
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.remove("active");
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // Identificar botones y modales
    const addClientBtn = document.getElementById("add-client-btn");
    const addClientModal = document.getElementById("add-client-modal");
    const closeAddModalBtn = document.getElementById("close-add-modal");
    const addClientForm = document.getElementById("add-client-form");

    // Abrir el modal de agregar cliente
    addClientBtn.addEventListener("click", () => {
        addClientModal.classList.add("active");
    });

    // Cerrar el modal de agregar cliente
    closeAddModalBtn.addEventListener("click", () => {
        addClientModal.classList.remove("active");
        addClientForm.reset(); // Vacía los campos del formulario al cerrar el modal
    });

    // Enviar datos del formulario para agregar cliente
    addClientForm.addEventListener("submit", (e) => {
        e.preventDefault();

        // Recoger los datos del formulario
        const clientName = document.getElementById("add-client-name").value;
        const clientLastName = document.getElementById("add-client-lastname").value;
        const clientEmail = document.getElementById("add-client-email").value;
        const clientPhone = document.getElementById("add-client-phone").value;
        const clientAddress = document.getElementById("add-client-address").value;

        // Enviar datos al servidor
        fetch("insert_clientes.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `nombre=${clientName}&apellido=${clientLastName}&email=${clientEmail}&telefono=${clientPhone}&direccion=${clientAddress}`,
        })
            .then(response => response.text())
            .then(data => {
                alert(data); // Mostrar respuesta del servidor
                addClientForm.reset(); // Vacía los campos del formulario al enviar
                addClientModal.classList.remove("active"); // Cierra el modal
                location.reload(); // Recargar la página para actualizar la tabla
            })
            .catch(error => console.error("Error:", error));
    });

    // Cerrar modal al hacer clic fuera de él
    window.addEventListener("click", (e) => {
        if (e.target === addClientModal) {
            addClientModal.classList.remove("active");
            addClientForm.reset(); // Vacía los campos del formulario al cerrar el modal
        }
    });
});