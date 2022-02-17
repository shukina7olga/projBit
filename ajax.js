const errorMessage = 'что-то не так',
    loadMessage = "загрузка",
    loginMessage = "вы вошли",
    loginId = document.getElementById('loginId'),
    passId = document.getElementById('passId');

const form = document.getElementById('formAj');

const message = document.createElement('div');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    form.appendChild(message);

    // создаем объект экземпляра класса XMLHttpRequest
    const request = new XMLHttpRequest()
    request.addEventListener('readystatechange', () => {
        message.textContent = loadMessage;

        if(request.readyState !== 4) { 
            return;
        }
        if(request.status === 200){ // всё ок
            message.textContent = loginMessage;
            loginId.value = '';
            passId.value ='';
        }else {
            message.textContent = errorMessage;
        }
    })
    request.open('POST', 'backend.php');
    request.setRequestHeader('Content-Type', 'multipart/form-data'); // устанавливает значение полей для отсылаемых данных
    // перед отправкой получаем данные 
    const formData = new FormData(form);
    //отправляем при помощи метода send
    request.send(formData);



})