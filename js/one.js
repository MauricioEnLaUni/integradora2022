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


function userOrder()
{
  
}