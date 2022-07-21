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
  var content = document.getElementById('printSale');
  let datos = `<h3 class="col-2">Usuario:</h3><p class="col-10">`+one+`</p>
                <h3 class="col-2">No.Orden:</h3><p class="col-10">`+two+`</p>
                <h3 class="col-2">Fecha:</h3><p class="col-10">`+orderTime.slice(0,33)+`</p>
                <button class="col-1">Cambiar Dirección</button>
                <h3 class="col-2">Dirección:</h3><p class="col-9">`+address+`</p>
            </div>`;
  content.innerHTML+=datos;
}

function drawOrder(id,nm,un,qt)
{
  let content = document.getElementById('salesTable');
  let textblock = `<div class="row salesTableElement">
  <div class="col-1">`+id+`</div>
  <div class="col-6">`+nm+`</div>
  <div class="col-2">$`+un+`</div>
  <div class="col-2">`+qt+`</div>
  <button class="btn btn-warning col-1"><img src="img\\svg\\cart-x-fill.svg" width="32px"/></button>
</div>`;
  content.innerHTML+=textblock;
}

function picture(where,srcOne,srcTwo,def,altText){
  let content = document.getElementById(where);
  let picture = `<picture>
  <source srcset="` + srcOne + ` 767w,` + srcTwo + `, 767w"
  size="(max-width:767px) 767px,768px"
  src="` + def +  `"
  alt="` + altText + `"/>
  <img src="` + def + `"/>
  </picture>`;
  content.innerHTML+=picture;
}