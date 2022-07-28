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
  <button class="btn btn-warning col-1"><img src="img/svg/cart-x-fill.svg" width="32px"/></button>
</div>`;
  content.innerHTML+=textblock;
}

function picture(where,srcOne,srcTwo,def,altText){
  let content = document.getElementById(where);
  let picture = `<picture>
  <source srcset="` + srcOne + ` 767w,` + srcTwo + `, 768w"
  size="(max-width:767px) 0px,768px"
  src="` + def +  `"
  alt="` + altText + `"/>
  <img src="` + def + `"/>
  </picture>`;
  content.innerHTML+=picture;
}
function pictureSVG(where,srcOne,srcTwo,def,altText){
  let content = document.getElementById(where);
  let picture = `<picture>
  <source type="image/svg+xml" srcset="` + srcOne + `" media="(min-width:768px)" alt="`+altText+`"/>
  <source type="image/svg+xml" srcset="` + srcTwo + `" media="(max-width:767px)" alt="`+altText+`"/>
  <img src="` + def + `" alt="`+altText+`"/>
  </picture>`;
  content.innerHTML+=picture;
}

function exhibit(where,row,id){
  let p0 = "img/items/"+id+".jpg";
  let p1 = "img/smol/items/"+id+".jpg";
  picture(where,p0,p1,p0,row["it_ds"]);
  document.getElementById("itemName").innerHTML+=capitalizeWords(row["it_nm"]);
  capitalizeWords(document.getElementById("itemPrice").innerHTML+=row["it_ot"]);
  capitalizeWords(document.getElementById("itemDesc").innerHTML+=row["it_ds"]);
  let icon = "";
  switch(row["it_tp"]){
    case "Bota":
      icon = `<img src="img/svg/types/boot.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Clogs":
      icon = `<img src="img/svg/types/clogs.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Loafr":
      icon = `<img src="img/svg/types/loafer.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Atlet":
      icon = `<img src="img/svg/types/sneaker.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Sanda":
      icon = `<img src="img/svg/types/sandal.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Slipp":
      icon = `<img src="img/svg/types/slipper.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Taco":
      icon = `<img src="img/svg/types/heels.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
    case "Work":
      icon = `<img src="img/svg/types/work.svg" class="zapato`+row["it_cl"]+`" />`;
      break;
  }
  document.getElementById("itemIcon").innerHTML+=capitalizeWords(icon);
  let target = "";
  switch(row['it_wh']){
    case "Niña":
      target = document.getElementById("girl");
      break;
    case "Niño":
      target = document.getElementById("boy");
      break;
    case "Infa":
      target = document.getElementById("child");
      break;
    case "Unsx":
      target = document.getElementById("genderless");
      break;
    case "Homb":
      target = document.getElementById("man");
      break;
    case "Mujr":
      target = document.getElementById("woman");
      break;
  }
  target.classList.add("selectedIcon");
  let brand = "";
  switch(row['it_br']){
    case "Adidas":
      brand = '<svg width="24px" height="24px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg"><path d="M11.936 17.952c0-.644.517-1.16 1.162-1.16.644 0 1.16.516 1.16 1.16a1.157 1.157 0 0 1-1.16 1.161 1.157 1.157 0 0 1-1.162-1.16m4.724 0c0-.645.517-1.162 1.161-1.162s1.161.517 1.161 1.161-.517 1.161-1.16 1.161a1.157 1.157 0 0 1-1.162-1.16m-10.95 0c0-.645.517-1.162 1.161-1.162s1.16.517 1.16 1.161-.516 1.161-1.16 1.161a1.157 1.157 0 0 1-1.161-1.16m-4.724 0c0-.645.517-1.162 1.161-1.162s1.161.517 1.161 1.161a1.157 1.157 0 0 1-1.161 1.161 1.157 1.157 0 0 1-1.16-1.16m9.55-2.052h-1.01v4.063h1.01v-4.063zM3.3 19.964h1.01v-4.063H3.3v.326a2.087 2.087 0 0 0-1.2-.374c-1.162 0-2.1.938-2.1 2.1 0 1.168.938 2.099 2.1 2.099.445 0 .858-.135 1.2-.374v.286zm15.674 0h1.01v-4.063h-1.01v.326a2.087 2.087 0 0 0-1.2-.374c-1.162 0-2.1.938-2.1 2.1a2.092 2.092 0 0 0 2.1 2.099c.445 0 .858-.135 1.2-.374v.286zm1.384-1.32c.032.82.732 1.4 1.9 1.4.955 0 1.742-.414 1.742-1.328 0-.636-.358-1.01-1.185-1.17l-.644-.126c-.414-.08-.7-.16-.7-.406 0-.27.278-.39.628-.39.51 0 .716.255.732.557h1.018c-.056-.795-.692-1.328-1.718-1.328-1.057 0-1.686.58-1.686 1.336 0 .922.748 1.073 1.392 1.193l.533.095c.382.072.549.183.549.406 0 .199-.191.397-.645.397-.66 0-.874-.342-.882-.636h-1.034zM8.024 14.517v1.71a2.087 2.087 0 0 0-1.2-.374c-1.162 0-2.1.938-2.1 2.1 0 1.168.938 2.099 2.1 2.099.444 0 .858-.135 1.2-.374v.286h1.01v-5.447h-1.01zm6.226 0v1.71a2.087 2.087 0 0 0-1.2-.374c-1.161 0-2.1.938-2.1 2.1a2.092 2.092 0 0 0 2.1 2.099c.445 0 .858-.135 1.2-.374v.286h1.01v-5.447h-1.01zm-11.626-1.2.684 1.2h4.716l-1.869-3.229-3.53 2.028zm7.913 2.21v-1.01h3.713l-3.96-6.855L6.751 9.69l2.776 4.827v1.01h1.01zm5.217-1.01h4.723L14.37 3.948l-3.531 2.036 4.915 8.533z"/></svg>';
      break;
    case "Caterpillar":
      brand = "<svg id='Layer_1' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 457.33 340.16'><defs><style>.cls-1{fill:#ffcd05;}.cls-2{fill:#231f20;}</style></defs><title>CAT_Logo_Web</title><rect class='cls-1' width='457.33' height='340.16'/><path class='cls-2' d='M167.32,226.92c6.55-5.46,7.67-12.23,7.67-18.29V183.14h-35.6v34.59a9,9,0,0,1-8.95,9,8.67,8.67,0,0,1-8.62-9v-98a8.67,8.67,0,0,1,8.62-8.95,9,9,0,0,1,8.95,8.95v34.81H175V118.41h0c0-20-13-36.37-44.81-36.41h0c-32.62,0-44.95,16.5-44.95,36.45V220.79c0,19.78,15.7,34.75,35.79,34.74h11Z'/><polygon class='cls-2' points='307.67 230.94 307.67 118.48 283.11 118.48 283.11 85.34 372.03 85.34 372.03 118.48 347.33 118.48 347.33 255.33 336.8 255.33 307.67 230.94'/><path class='cls-2' d='M261.72,85.53H212.11L183.21,215.2,237,171.77l56.11,47Zm-34.29,77.92,9.6-49,9.53,49Z'/><polygon class='cls-2' points='323.6 255.57 237.01 183.03 147.28 255.57 323.6 255.57'/><path class='cls-2' d='M378.34,93.36a6.45,6.45,0,1,1,6.47,6.64A6.42,6.42,0,0,1,378.34,93.36Zm6.47,8a7.94,7.94,0,1,0-8.06-8A7.92,7.92,0,0,0,384.81,101.32ZM383.13,94h1.6l2.41,4h1.56l-2.61-4a2.39,2.39,0,0,0,2.37-2.52c0-1.81-1.07-2.61-3.23-2.61h-3.49V98h1.39Zm0-1.18V90H385c1,0,2,.21,2,1.34,0,1.41-1.06,1.49-2.23,1.49Z'/></svg>";
      break;
    case "Converse":
      brand = '<svg xmlns="http://www.w3.org/2000/svg" width="1000" height="671.62" xmlns:v="https://vecta.io/nano"><g transform="matrix(3.394659 0 0 3.394659 -20.16715 -25.345386)"><path d="M116.462 118.176l-.121-29.877 28.605-10.612-28.807-9.434-.604-29.436-17.475 23.75-28.585-8.812 16.593 24.931-16.196 24.977 28.213-9.35zm3.573 31.405h51.236l64.213-71.014L170.96 7.466h-50.741l60.347 70.996zM5.941 187.806c0-9.229 7.802-18.304 18.465-18.304 7.263 0 15.414 8.189 15.414 8.189l-8.831 5.138s-1.459-3.854-6.904-3.854c-5.536 0-8.793 4.545-8.831 8.67-.043 4.611 3.738 8.67 8.51 8.67 3.744 0 7.707-4.014 7.707-4.014l7.546 5.459s-5.647 6.904-15.093 6.904c-9.465 0-17.983-5.707-17.983-16.859z"/><path d="M61 169.969c-9.932 0-17.969 7.933-17.969 17.688S51.068 205.313 61 205.313s18-7.902 18-17.656-8.068-17.687-18-17.687zm0 8.844c4.966 0 9 3.967 9 8.844s-4.034 8.813-9 8.813-8.969-3.935-8.969-8.812 4.003-8.844 8.969-8.844zm24.75-8.344v33.063h8.656v-17.869l14.281 17.869h8.531V170.47h-8.687v19.322L94.406 170.47zm38.531 0l11.688 33.063h12.875l11.688-33.062h-9.469l-8.656 26.25-8.656-26.25zm42.469 0v33.063h26.594v-7.625h-17.937v-5.531h16.125v-6.75h-16.125v-5.281h17.938v-7.875zm107.178 0v33.063h26.594v-7.625h-17.937v-5.531h16.125v-6.75h-16.125v-5.281h17.938v-7.875zm-70.803.625v32.594h7.688v-12.844h4.406l6.75 12.844h9.906l-6.687-13.937c8.695-5.213 6.974-16.125-2.719-18.656h-19.344zm7.531 7.875h8.875c3.084 0 2.883 4.781 0 4.781h-8.875v-4.781z" fill-rule="evenodd"/><path d="M236.494 199.122c.341 2.044 8.398 5.904 16.349 5.904 7.302 0 13.17-3.506 13.17-10.465 0-8.558-9.991-10.539-9.991-10.539s-8.301-.117-8.515-3.974c-.101-1.815 2.428-2.838 4.655-2.838 3.647 0 7.72 3.633 7.72 3.633l5.79-6.244s-7.326-5.79-13.511-5.79c-5.906 0-14.305 3.868-14.305 11.921 0 6.852 9.723 10.004 9.723 10.004s10.259 1.093 10.259 4.301c0 2.184-3.72 2.838-5.904 2.838-5.301 0-9.764-4.655-9.764-4.655z"/></g></svg>';
      break;
    case "Crocs":
      brand = '<img src="img/brands/crocs.svg"/>';
      break;
    case "ECCO":
      brand = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 609.1 148.5" fill="#808386" xmlns:v="https://vecta.io/nano"><path d="M201.9 4.6C210 1.5 218.3 0 227.5 0c23.2 0 44 10.7 57.6 27.4 1.7 2.2 3 5.1 3 8.1 0 4.2-1.8 7.7-5 10l-.2.2c-2.1 1.6-4.8 2.5-7.6 2.5a12.93 12.93 0 0 1-10-4.7c-2.8-3.4-5.9-6.3-9.5-8.9-8-5.7-17.8-9.1-28.3-9.1-6.1 0-11.5 1-16.9 3-10.1 3.8-18.9 11-24.5 20.1-4.6 7.4-7.3 16.1-7.3 25.5 0 6.8 1.5 13.4 4.1 19.3 3.4 7.9 8.8 14.7 15.6 19.8 8 6 18.2 9.6 29.1 9.6 15.2 0 28.9-7.2 37.9-18.2 2.3-3 6-4.9 10-4.9a12.76 12.76 0 0 1 12.8 12.8c0 3.1-1 5.9-2.8 8-13.6 16.9-34.4 27.8-57.8 27.8-41 0-74.3-33.2-74.3-74.3 0-14.5 4.3-28 11.4-39.4 8.4-13.5 21.8-24.2 37.1-30m153.5 0c8.2-3.1 16.4-4.6 25.7-4.6 23.2 0 44 10.7 57.6 27.5 1.8 2.2 2.9 5 2.9 8.1 0 4.2-1.8 7.7-5 10l-.2.2c-2.1 1.6-4.8 2.5-7.7 2.5-4 0-7.6-1.8-9.9-4.8-2.8-3.4-5.9-6.4-9.5-8.9-8-5.8-17.8-9.1-28.3-9.1-6 0-11.5 1.1-16.8 3.1-10.1 3.8-18.9 10.9-24.6 20a48.16 48.16 0 0 0-7.3 25.6c0 6.8 1.6 13.3 4.1 19.1 3.4 7.9 8.8 14.7 15.5 19.8a48.24 48.24 0 0 0 29.1 9.7c15.2 0 29-7.2 37.9-18.2 2.3-2.9 6-4.8 10-4.8a12.76 12.76 0 0 1 12.8 12.8c0 3-1.1 5.9-2.8 8-13.6 17-34.4 27.8-57.8 27.8-41 0-74.2-33.2-74.2-74.1 0-14.6 4.2-28.1 11.4-39.6 8.5-13.5 21.9-24.3 37.1-30.1m121.7 116.1c13.6 16.9 34.4 27.8 57.8 27.8 41 0 74.1-33.2 74.1-74.3 0-14.4-4.1-27.9-11.3-39.4-2.3-3.6-6.3-6.1-10.9-6.1-7 0-12.7 5.7-12.7 12.8 0 2.5.9 5.2 2.1 7.2 4.6 7.4 7.3 16.1 7.3 25.5 0 6.8-1.5 13.4-4.1 19.3-3.4 7.9-8.8 14.7-15.5 19.8-8.2 6-18.2 9.6-29.1 9.6-15.2 0-29-7.2-37.9-18.2-6.8-8.4-10.8-18.9-10.8-30.6 0-16.2 8-30.7 20.3-39.5 8-5.7 17.8-9.1 28.4-9.1 6 0 11.5 1 16.8 3.1 1.4.5 2.9.7 4.4.7 7 0 12.8-5.7 12.8-12.8a12.86 12.86 0 0 0-8.3-12c-8-3-16.4-4.5-25.5-4.5-23.3 0-44.1 10.7-57.7 27.4-10.3 12.8-16.5 29-16.5 46.7-.1 17.7 6.1 33.8 16.3 46.6M48.5 4.6c-4.8 1.8-8.3 6.5-8.3 12.1 0 7 5.7 12.8 12.8 12.8a12.17 12.17 0 0 0 4.3-.8c5.3-2 10.8-3 16.9-3 10.5 0 20.5 3.6 28.5 9.3L29.5 93.4c-2.5-5.9-4-12.4-4-19.1 0-9.4 2.7-18.2 7.2-25.6 1.3-2 2.2-4.7 2.2-7.2 0-7-5.7-12.7-12.8-12.7-4.5 0-8.6 2.5-10.8 6C4.2 46.2 0 59.7 0 74.3c0 40.9 33.2 74.1 74.2 74.1 23.4 0 44.3-10.8 57.8-27.8 1.8-2.2 2.8-5 2.8-8A12.76 12.76 0 0 0 122 99.8c-4.1 0-7.7 1.9-10 4.9-8.9 11-22.7 18.2-37.9 18.2-10.9 0-20.9-3.7-29-9.7l84.5-67.6c3.1-2.4 5.1-5.8 5.1-10 0-3-1.2-5.9-3-8.1C118.3 10.7 97.5 0 74.2 0 65 0 56.7 1.5 48.5 4.6"/></svg>';
      break;
    case "Hush Puppies":
      brand = '<img src="img/brands/hush.webp" />';
      break;
    case "Nike":
      brand = '<svg width="1e3" height="356.39" version="1.1" viewBox="135.5 361.38 1e3 356.39" xmlns="http://www.w3.org/2000/svg"><path d="m 245.8075,717.62406 c -29.79588,-1.1837 -54.1734,-9.3368 -73.23459,-24.4796 -3.63775,-2.8928 -12.30611,-11.5663 -15.21427,-15.2245 -7.72958,-9.7193 -12.98467,-19.1785 -16.48977,-29.6734 -10.7857,-32.3061 -5.23469,-74.6989 15.87753,-121.2243 18.0765,-39.8316 45.96932,-79.3366 94.63252,-134.0508 7.16836,-8.0511 28.51526,-31.5969 28.65302,-31.5969 0.051,0 -1.11225,2.0153 -2.57652,4.4694 -12.65304,21.1938 -23.47957,46.158 -29.37751,67.7703 -9.47448,34.6785 -8.33163,64.4387 3.34693,87.5151 8.05611,15.898 21.86731,29.6684 37.3979,37.2806 27.18874,13.3214 66.9948,14.4235 115.60699,3.2245 3.34694,-0.7755 169.19363,-44.801 368.55048,-97.8366 199.35686,-53.0408 362.49439,-96.4029 362.51989,-96.3672 0.056,0.046 -463.16259,198.2599 -703.62654,301.0914 -38.08158,16.2806 -48.26521,20.3928 -66.16827,26.6785 -45.76525,16.0714 -86.76008,23.7398 -119.89779,22.4235 z"/></svg>';
      break;
    case "SAS":
      brand = '<img src="img/brands/sas.webp" />';
      break;
  }
  document.getElementById("marca").innerHTML+=brand;
}

function accModal(which){
  let inputs = "";
  switch(which){
    case 1:
      inputs = `
      <label>
        Nombre de la Cuenta
        <input type="text" maxlength="32" placeholder="Alias" name="us_dn"/>
      </label>
      <label>
        Primer Nombre
        <input type="text" maxlength="16" placeholder="Nombre" name="us_nm"/>
      </label>
      <label>
        Apellido
        <input type="text" maxlength="32" placeholder="Apellidos" name="us_ln">
      </label>
      `;
      break;
    case 2:
      inputs = `
        <label>
          Modificar Email
          <input type="email" maxlength="128" placeholder="Email" name="em_em0"/>
        </label>
        <label>
          Agregar Email
          <input type="email" maxlength="128" placeholder="Email" name="em_em1"/>
        </label>
        `;
      break;
    case 3:
      inputs = `
        <label>
          Modificar Teléfono
          <input type="tel" minlength="15" maxlength="15" placeholder="Teléfono" name="ph_nm0"/>
        </label>
        <label>
          Agregar Teléfono
          <input type="tel" minlength="15" maxlength="15" placeholder="Teléfono" name="ph_nm1"/>
        </label>
            `;
      break;
    case 4:
      inputs = `
        <label>
          Password
          <input type="password" minlength="16" maxlength="64" placeholder="Password" name="us_pw"/>
        </label>
      `;
      break;
  };
  document.getElementById("mField").innerHTML = inputs;
  document.getElementById("accSend").setAttribute('value',which);
}
function modInput(id){
  let inputs = document.getElementById(id).querySelectorAll("input");
  if(inputs[0].hasAttribute("disabled")){
    inputs.forEach(element => {
      element.removeAttribute("disabled");
    });
  }else{
    inputs.forEach(element => {
      element.setAttribute("disabled","");
    });
  }
  
}