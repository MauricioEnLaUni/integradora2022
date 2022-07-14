function estiloForm()
{
  let typeArray = [
    'Bota',
    'Bote',
    'Clogs',
    'Loafer',
    'Sandalia',
    'Slipper',
    'Atlético',
    'Trabajo',
    'Mocasín',
    'Vestir',
    'Tacones',
    'Mary Janes',
    'Ortopédico'
    ];
  let content = document.getElementById('estilo');
    for(i = 0; i < typeArray.length;i++)
    {
        sum=`
        <label>
        <input
        type="checkbox"
        form="searchBar"
        name="estilos"
        value="`+i+`"
        />
        <span>`+typeArray[i]+`</span>
        </label>`;
        content.innerHTML+=sum;
    }
}
window.addEventListener(onload,estiloForm());