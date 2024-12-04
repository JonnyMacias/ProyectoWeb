//Definición de variables
const url = 'http://localhost:3000/api/producto/'
const contenedor = document.querySelector('tbody')
let resultados = ''


const modalProducto = new bootstrap.Modal(document.getElementById('modalProducto'))
const formProducto = document.querySelector('form')
const nombre = document.getElementById('nombre')
const descripcion = document.getElementById('descripcion')
const precio = document.getElementById('precio')
const stock = document.getElementById('stock')
const imagen = document.getElementById('imagen')
var opcion = ''


btnCrear.addEventListener('click', ()=>{
    nombre.value = '' 
    descripcion.value = ''
    precio.value = ''
    stock.value = ''
    imagen.value = ''
    modalProducto.show()
    opcion = 'crear'
})


//funcion para mostrar los resultados
const mostrar = (productos) => {
    productos.forEach(producto => {
        resultados += `<tr>
                            <td>${producto.id_producto}</td>
                            <td>${producto.nombre}</td>
                            <td>${producto.precio}</td>
                            <td>${producto.stock}</td>
                            <td class="text-center"><a class="btnEditar "> <img src="https://cdn-icons-png.flaticon.com/512/10608/10608888.png" alt="Editar" title="Editar" width="40" height="40">
                            </a><a class="btnBorrar "><img src="https://cdn-icons-png.freepik.com/512/12313/12313511.png" alt="Eliminar" title="Eliminar"  width="40" height="40"></a></td>
                       </tr>
                    `    
    })
    contenedor.innerHTML = resultados
    
}


//Procedimiento Mostrar
fetch(url)
    .then( response => response.json() )
    .then( data => mostrar(data) )
    .catch( error => console.log(error))


  
const on = (element, event, selector, handler) => {
    //console.log(element)
    //console.log(event)
    //console.log(selector)
    //console.log(handler)
    element.addEventListener(event, e => {
        if(e.target.closest(selector)){
            handler(e)
        }
    })
}


//Procedimiento Borrar
on(document, 'click', '.btnBorrar', e => {
    const fila = e.target.parentNode.parentNode
    const id_producto = fila.firstElementChild.innerHTML
    alertify.confirm("Estas seguro que deseas eliminar este producto?",
    function(){
        fetch(url+id_producto, {
            method: 'DELETE'
        })
        .then( res => res.json() )
        .then( ()=> location.reload())
        alertify.success('Eliminado correctamente ')
    },
    function(){
        alertify.error('Cancel')
    })
})


//Procedimiento Editar
let idForm = 0
on(document, 'click', '.btnEditar', e => {    
    const fila = e.target.parentNode.parentNode
    idForm = fila.children[0].innerHTML
    const nombreForm = fila.children[1].innerHTML
    const descripcionForm = fila.children[2].innerHTML
    const precioForm = fila.children[3].innerHTML
    const stockForm = fila.children[4].innerHTML
    const imagenForm = fila.children[5].innerHTML

    nombre.value =  nombreForm
    descripcion.value =  descripcionForm
    precio.value =  precioForm
    stock.value =  stockForm
    imagen.value =  imagenForm
    opcion = 'editar'
    modalProducto.show()
     
})


//Procedimiento para Crear y Editar
formProducto.addEventListener('submit', (e)=>{
    e.preventDefault()
    if(opcion=='crear'){        
        //console.log('OPCION CREAR')
        fetch(url, {
            method:'POST',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify({
                nombre:nombre.value,
                descripcion:descripcion.value,
                precio:precio.value,
                stock:stock.value,
                imagen:imagen.value

            })
        })
        .then( response => response.json() )
        .then( data => {
            const nuevoProducto = []
            nuevoProducto.push(data)
            mostrar(nuevoProducto)
        })
    }
    if(opcion=='editar'){    
        //console.log('OPCION EDITAR')
        fetch(url+idForm,{
            method: 'PUT',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify({

                nombre:nombre.value,
                descripcion:descripcion.value,
                precio:precio.value,
                stock:stock.value,
                imagen:imagen.value
            })
        })
        .then( response => response.json() )
        .then( response => location.reload() )
    }
    modalProducto.hide()
})
