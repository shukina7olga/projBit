const form = document.getElementById('regEditForm');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    document.querySelectorAll('.super').forEach(el => el.remove()); // удалить все элементы с классом error

    fetch('edit_personal_backend.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => {
        return response.text();
      })
      .then(text => { 
        const formInp = document.querySelectorAll('.form-input');
        let pars = JSON.parse(text);
        if(pars.err_message === null) {      
          //location.reload(true); //метод перезагружает ресурс из текущего URL подобно кнопке обновления браузера    
          formInp.forEach(el => {el.style.borderColor = "#88dfb0";});
          const superMess = document.createElement('p');
          superMess.className = 'super';
          form.append(superMess);
          superMess.innerHTML = pars.message;
        } else {
          formInp.forEach(el => {el.style.borderColor = "#dc3545";});
          const superMess = document.createElement('p');
          superMess.className = 'super';
          form.append(superMess);
          superMess.innerHTML = pars.err_message;
        } 
    });
    
})