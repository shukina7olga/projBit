//  errorMessage = 'что-то не так',
//     loadMessage = "загрузка",
//     loginMessage = "вы вошли",

console.log('work');
const form = document.getElementById('formAj');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    let divResp = document.createElement('div');
    divResp.innerHTML = "<b>Hello world!</b>";

   fetch('backend.php', {
        method: 'POST',
        body: new FormData(form)
      })
      .then((response) => response.text())
      .then((text) => form.innerHTML = text);
}) 

//form.append(divResp);
    //document.innerHTML = divResp;
   
    // создаем объект экземпляра класса XMLHttpRequest
    // const request = new XMLHttpRequest()
    // request.addEventListener('readystatechange', () => {
       
    //     if(request.readyState !== 4) { 
    //         return;
    //     }
    //     if(request.status === 200){ // всё ок
    //         let resp = request.response;
    //         divResp.innerHTML = resp;
    //     }
    // })
    // request.open('POST', 'backend.php');
    // request.setRequestHeader('Content-Type', 'multipart/form-data'); // устанавливает значение полей для отсылаемых данных
    // перед отправкой получаем данные 
    // const formData = new FormData();
    // let inputs = document.querySelectorAll('input');
    // inputs.forEach((input) => {
    //     formData.append(input.name, input.value);
    // });
    // //отправляем при помощи метода send
    // request.send(formData);