const form = document.getElementById('formPostEdit');

form.addEventListener('submit', (event) => {
    event.preventDefault();


    fetch('editpost_backend.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => {
        return response.text();
      })
      .then(text => { 
        let pars = JSON.parse(text);
        if(pars.status === 'success') { 
          location.reload(true); //метод перезагружает ресурс из текущего URL подобно кнопке обновления браузера    
        } else { 
          
        }    
    });
    
})