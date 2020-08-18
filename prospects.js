// AJAX FUNCTION
function ajax({ url, method = 'GET', async = true, done = () => { }, error = (e) => { }, responseType = 'json', data = {}, nonce }) {
  const request = new XMLHttpRequest();

  request.responseType = responseType;
  request.onreadystatechange = () => {
    if (request.readyState === 4) {
      if (request.status >= 200 && request.status <= 299) {
        done(request.response);
      } else {
        error(request.status);
      }
    }
  }
  request.open(method, url, async);
  request.setRequestHeader("X-WP-Nonce", nonce);
  request.setRequestHeader("Content-Type", "application/" + responseType + ";charset=UTF-8");
  (method === 'GET') ? request.send(null) : request.send((JSON.stringify(data)));
}
// AJAX FUNCTION
let button = document.getElementById('send-prospect');
let entryHTML = document.getElementById('form__section');

// Get data
function getProspectData() {
  let data = {
    "nombre": document.getElementById("nombre").value,
    "email": document.getElementById("email").value,
    "telefono": document.getElementById("telefono").value,
    "tipo": document.getElementById("tipo").value,
    "review": document.getElementById("review").value,
    "notas": document.getElementById("notas").value,
  }
  return data;
}
// Clear Input
function clearProspectData() {
    document.getElementById("nombre").value = "";
    document.getElementById("email").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("tipo").value = "";
    document.getElementById("review").value = "";
    document.getElementById("notas").value = "";
}
// Show Message
function showMessage() {
  let messageHTML = document.getElementById("prospect__message");
  messageHTML.style.display = "block";
  setTimeout(() =>  messageHTML.style.display = "none", 5000);
}
// C: Create
function createProspect() {
  let data = getProspectData();
  let apiURL = prospect.local + '\/wp-json\/wp\/v2\/prospect';
  ajax({
    "url": apiURL,
    "method": 'POST',
    "nonce": prospect.nonce,
    "data": {
      "title": data.nombre,
      "status": "publish",
      "fields": data
    },
    done: () => {
        readProspect();
        clearProspectData();
        showMessage();
    }
  });
}
// R: Read
function readProspect() {
  if(prospect.current === '0'){
      window.location.replace(prospect.local + "\/my-account")
  }
  let apiURL = prospect.local + '\/wp-json\/wp\/v2\/prospect?author=' + prospect.current;
  ajax({
    "url": apiURL,
    "nonce": prospect.nonce,
    "done": res => {
      let content = document.getElementById('table__content');
      let structureTable = "";
      let longitud = res.length;
      if(longitud > 0) {
        res.forEach((el,i) => {
          structureTable += `
          <tr role="row">
          <td role="cell">${el.acf.nombre}</td>
          <td role="cell">${el.acf.email}</td>
          <td role="cell">${el.acf.tipo}</td>
          <td role="cell">${el.acf.review}</td>
          <td role="cell">${el.acf.telefono}</td>
          <td role="cell">${el.acf.notas}</td>
          <td role="cell">
          <button id="table__edit" data-edit="${i}" onclick="editProspect(${el.id}, ${i})" >Edita</button>
          <button id="table__remove" data-remove="${i}" onclick="deleteProspect(${el.id})">Remueve</button>
          </td>
          </tr>`;
          (longitud - 1 == i) ? content.innerHTML = structureTable : '';
        });
      } else {
        content.innerHTML = "<h4>Sin Resultados</h4>";
      }
    },
  })
}
// U: Update
function editProspect(id, index) {
  let apiURL = prospect.local + '\/wp-json\/wp\/v2\/prospect?author=' + prospect.current;
  ajax({
    "url": apiURL,
    "nonce": prospect.nonce,
    "done": res => {
      let content = document.getElementById('table__content');
      let structureTable = "";
      let longitud = res.length;
      res.forEach((el,i) => {
        if(index != i) {
          structureTable += `
          <tr role="row">
            <td role="cell">${el.acf.nombre}</td>
            <td role="cell">${el.acf.email}</td>
            <td role="cell">${el.acf.tipo}</td>
            <td role="cell">${el.acf.review}</td>
            <td role="cell">${el.acf.telefono}</td>
            <td role="cell">${el.acf.notas}</td>
            <td role="cell">
            <button id="table__edit" data-edit="${i}"  onclick="editProspect(${el.id}, ${i})">Edita</button>
            <button id="table__remove" data-remove="${i}" onclick="deleteProspect(${el.id})">Remueve</button>
            </td>
          </tr>`;
        } else {
          structureTable += `
          <tr role="row">
            <td role="cell"><input id="nombre-update"type="text" value="${el.acf.nombre}" placeholder="Nombre" /></td>
            <td role="cell"><input id="email-update"type="text" value="${el.acf.email}" placeholder="E-mail" /></td>
            <td role="cell"><input id="tipo-update"type="text" value="${el.acf.tipo}" placeholder="Tipo" /></td>
            <td role="cell"><input id="review-update"type="text" value="${el.acf.review}" placeholder="Review" /></td>
            <td role="cell"><input id="telefono-update"type="text" value="${el.acf.telefono}" placeholder="Telefono" /></td>
            <td role="cell"><input id="notas-update"type="text" value="${el.acf.notas}" placeholder="Notas" /></td>
            <td role="cell">
            <button id="table__edit" data-edit="${i}" onclick="updateProspect(${el.id}, ${i})" >Actualiza</button>
            <button id="table__remove" data-remove="${i}" onclick="deleteProspect(${el.id})">Remueve</button>
            </td>
          </tr>`;
        }
        (longitud - 1 == i) ? content.innerHTML = structureTable : '';
      });
    },
  })
}
function updateProspect(id, index) {
  let data = {
    "nombre": document.getElementById("nombre-update").value,
    "email": document.getElementById("email-update").value,
    "telefono": document.getElementById("telefono-update").value,
    "tipo": document.getElementById("tipo-update").value,
    "review": document.getElementById("review-update").value,
    "notas": document.getElementById("notas-update").value,
  }
  console.log(`ID: ${id} \n INDEX: ${index}`);
  let apiURL = prospect.local + '\/wp-json\/wp\/v2\/prospect\/' + id;
  ajax({
    "url": apiURL,
    "method": 'POST',
    "nonce": prospect.nonce,
    "data": {
      "fields": data
    },
    done: () => readProspect() 
  });
}
// D: Delete
function deleteProspect(id) {
  let apiURL = prospect.local + '\/wp-json\/wp\/v2\/prospect\/' + id;
  ajax({
    "url": apiURL,
    "method": 'DELETE',
    "nonce": prospect.nonce,
    done: () => readProspect()
  });
}
button.addEventListener('click', () => createProspect());
readProspect();