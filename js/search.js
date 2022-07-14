function estiloForm(value,name)
{
  let checkForm = `
<label>
  <input
  type="checkbox"
  form="searchBar"
  name="estilos"
  value="`+value+`"
  />
  <span>`+name+`</span>
</label>`;
  var content = document.getElementById('estilo');
  content.innerHTML+=checkForm;
}