//clase
class Puntuacion{
    constructor(ID,nombre,precio){
        this.ID=ID;
        this.nombre=nombre;
    }

    // metodo para agregar las nuevas filas
    // el get por separado es una firma del método de tipo get, significa que siempre va a regresar un valor por lo que necesita un get
    get descripcion() {
        let row = document.createElement("tr");
    //las comillas francesas indican que el texto es puro html
        row.innerHTML = `
            <td>${this.ID}</td>
            <td>${this.nombre}</td>
            <td><button id="${this.ID}" name="delete" onclick="EliminarDB()">Eliminar</button></td>
        `;
        return row;
      }

}


//se guarda el elemento entero al no tener el .value
let formProd=document.getElementById('formProd');
let tableBod=document.getElementById('listaProds');

let productos=[];


function ListarProds(){
    //limpiar la tabla
    tableBod.innerHTML="";
    //for each con la función dentro crea una variable por cada elemento que hay en el arreglo productos
productos.forEach((producto)=>{
tableBod.appendChild(producto.descripcion);

});

}
//////////PRACTICA3////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////
//practica 4
//tiene que ser una función asíncrona para que se pueda completar el request antes de que ya lo queramos utilizar, también por eso se usa el prefijo await 
async function ontenerProductosDB(){
let response= await fetch("http://localhost/ServicioProductos/productos.php");
//la respuesta se transforma a formato json para poder accsesar los atributos de nuestra tabla}

let responseJSON=await response.json();
//let responsetext=await response.text();

responseJSON.forEach(p => {

    let nuevoProducto=new Puntuacion(p.ID,p.nombre);
    //para agregarlo al arreglo de productos
    productos.push(nuevoProducto);

    //console.log(p.nombre);
    


});
ListarProds();
}
ontenerProductosDB();


/////funcion de eliminar el producto en la data base


function EliminarDB(){
    let hidden=document.getElementById('codigoDELETE');
    var btnID = event.target.id;

    hidden.value=btnID;

    let inputH=document.getElementById('codigoDELETE').value;

    console.log(inputH);
}