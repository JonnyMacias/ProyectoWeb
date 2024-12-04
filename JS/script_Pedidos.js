
document.getElementById('toggleButton').addEventListener('click', function () {
    const panel = document.getElementById('registerPanel');
  
    if (panel.style.display === 'none' || panel.style.display === '') {
      panel.style.display = 'flex';
      this.textContent = 'Ocultar Registro';
    } else {
      panel.style.display = 'none';
      overlay.style.display = 'none';
      this.textContent = 'Mostrar Registro';
    }
  });
 
 document.getElementById('agregarDiv').addEventListener('click', function () {
    const contenedor = document.getElementById('contenedor');
    
    const nuevoDiv = document.createElement('div');
    nuevoDiv.className = 'cantidadP'; // Asignar la misma clase

    // Agregar los campos al nuevo div
    nuevoDiv.innerHTML = `
        <input type="text" id="Producto" name="Producto[]" required placeholder="Producto" class="producto">
        <input type="number" id="cantidad" name="cantidad[]" required placeholder="Cantidad" class="cantidad">
    `;

   
    // Agregar el nuevo div al contenedor
    contenedor.appendChild(nuevoDiv);

});


document.getElementById('calcularTotal').addEventListener('click', async function (e) {
    e.preventDefault();
    const productos = document.querySelectorAll('.producto');
    const cantidades = document.querySelectorAll('.cantidad');
    let total = 0;
    
    for (let i = 0; i < productos.length; i++) {
        console.log("hola");
        const nombreProducto = productos[i].value;
        const cantidad = parseInt(cantidades[i].value) || 0;
        
        if (nombreProducto && cantidad > 0) {
            const response = await fetch('CodigoReutilizable/total.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nombreProducto, cantidad })
            });

            const data = await response.json();
            
            if (data.success) {
                total += data.precioTotal;
            }
        }
    }

    document.getElementById('total').value = total.toFixed(2);
});


function mostrarDetalle(idVenta) {
    // Mostrar el panel
    document.getElementById('panelDetalle').style.display = 'block';
    
    // Hacer una solicitud AJAX para obtener los detalles de la venta
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'CodigoReutilizable/tablaPedidos.php?id_venta=' + idVenta, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('detalleContenido').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function cerrarPanel() {
    document.getElementById('panelDetalle').style.display = 'none';
}

function cerrar() {
    const panel = document.getElementById('registerPanel').style.display = 'none';
}

function setStatus(idVenta){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'CodigoReutilizable/nuevoStatus.php?id_venta=' + idVenta, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('detalleContenido').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}