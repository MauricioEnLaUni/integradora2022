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
    'Trabajo'
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

function marcasDraw()
{
  let typeArray = [
    'Adidas',
    'Nike',
    'Converse'
    ];
  let content = document.getElementById('marca');
    for(i = 0; i < typeArray.length;i++)
    {
        sum=`
        <label>
        <input
        type="checkbox"
        form="searchBar"
        name="marca"
        value="`+i+`"
        />
        <span>`+typeArray[i]+`</span>
        </label>`;
        content.innerHTML+=sum;
    }
}
window.addEventListener(onload,marcasDraw());

function colorDraw()
{
  let typeArray = [
    'Blanco','#ffffff',
    'Negro','#000000',
    'Rojo','#FF0000',
    'Azul','#0000FF',
    'Verde','#008000',
    'Amarillo','#ffff00',
    'Naranja','#ffa500',
    'Morado','#800080',
    'Café','#a52a2a'
    ];
  let content = document.getElementById('color');
    for(i = 0; i < typeArray.length;i+=2)
    {
        sum=`
        <label>
        
        <span style="background:`+typeArray[i+1]+`">
        <input
        type="checkbox"
        form="searchBar"
        name="color"
        value="`+typeArray[i+1]+`"
        />
        <img class="colorImg" src="img\\svg\\check-circle-fill.svg" />
        </span>
        </label>`;
        content.innerHTML+=sum;
    }
}
window.addEventListener(onload,colorDraw());