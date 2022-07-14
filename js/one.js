/* This hides a modal when you click outside of it. */
var userStop = false;
const target = document.querySelector('#gridUser');
const fUsr = document.getElementById("formaUsuario");
  document.addEventListener('click', (event) => {
    const withinBoundaries = event.composedPath().includes(target)
  
    if (!withinBoundaries) {
      fUsr.style.display = "none";
    }
  });



function appear(elem)
{
  let a = document.getElementById(elem);
  if(window.getComputedStyle(a).display == "none")
  {
    a.style.removeProperty('display');
    event.stopImmediatePropagation();
  }
  else
  {
    a.style.display = "none";
  }
};



function sideBar(elem,classAdd,classRemove)
{
  let a = document.getElementById(elem);
  if(a.classList.contains(classRemove)){
    a.classList.add(classAdd);
    a.classList.remove(classRemove);
  }
  else{
    a.classList.remove(classAdd);
    a.classList.add(classRemove);
  }
};


function userOrder(one,two,address,button)
{
  let d = Date(Date.now());
  let orderTime = d.toString();
  var content = document.getElementById('datosSale');
  let datos = `<h3><strong>Nombre de Usuario:</strong></h3><p>`+one+`</p>
                <h3>Número de Orden:</h3><p>`+two+`</p>
                <h3>Fecha de Pedido:</h3><p>`+orderTime+`</p>
                <button>Agregar otra dirección</button>
                <h3>Dirección de Envio</h3><p>`+address+`</p>
            </div>`;
  content.innerHTML+=datos;
}