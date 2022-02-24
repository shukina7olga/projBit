const form = document.getElementById('formAj');

form.addEventListener('submit', (event) => {
  event.preventDefault();
 
  fetch('backend.php', {
    method: 'POST',
    body: new FormData(form)
  })
  .then(response => {
    console.log(response);
    return response.text();
  })
  .then(text => { 
    form.innerHTML = text;
  
    let indexOfX = text.indexOf("{");
    text = text.substring(indexOfX,text.length)

    let pars = JSON.parse(text);
    console.log(pars);
    return pars;
  });

   
// const request = new XMLHttpRequest();    

// request.open('GET', 'backend.php');

// request.setRequestHeader( 'Content-Type', 'application/json');
 
// request.addEventListener("readystatechange", () => {

// 	if ( request.status === 200) {
//     let data = JSON.stringify(request);
//     let parsed = JSON.parse(data);
//       console.log(parsed.text);
// 	  //console.log( request.responseText);
//     }
// });
 
// // Выполняем запрос 
// request.send(); 
      


}) 







// let vote = () => {

//   let getXmlHttp = () => {
//     let xmlhttp;
//     try {
//       xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//     } catch (e) {
//       try {
//         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//       } catch (E) {
//         xmlhttp = false;
//       }
//     }
//     if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
//       xmlhttp = new XMLHttpRequest();
//     }
//     return xmlhttp;
//   }
// // (1) создать объект для запроса к серверу
// let req = getXmlHttp(); 
  
// req.onreadystatechange = function() { 
//     // onreadystatechange активируется при получении ответа сервера

//     if (req.readyState == 4) {
//         // если запрос закончил выполняться
//         if(req.status == 200) {
//               // если статус 200 (ОК) - выдать ответ пользователю
//             console.log("Ответ сервера: "+req.response);
//         }
//     }

// }

//     //  задать адрес подключения
// req.open('GET', 'backend.php', true); 

// // объект запроса подготовлен: указан адрес и создана функция onreadystatechange
// // для обработки ответа сервера
  
//     // 
// req.send(null);  // отослать запрос

// }

// vote();



