const form = document.getElementById('regForm');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    document.querySelectorAll('.error').forEach(el => el.remove()); // удалить все элементы с классом error

    fetch('register_backend.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => {
        return response.text();
      })
      .then(text => { 
        const formInp = document.querySelectorAll('.form-input');
        let pars = JSON.parse(text);
        if(pars.status === 'success') {      
         // location.reload(true); //метод перезагружает ресурс из текущего URL подобно кнопке обновления браузера    
        } else { 
          formInp.forEach(el => {el.style.borderColor = "#fa0000";});
          const errMess = document.createElement('p');
          errMess.className = 'error';
          form.append(errMess);
          errMess.innerHTML = pars.message;
        }    
    });
    
})