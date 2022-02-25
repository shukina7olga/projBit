const form = document.getElementById('formAj');

form.addEventListener('submit', (event) => {
  
  event.preventDefault();
  
  fetch('backend.php', {
    method: 'POST',
    body: new FormData(form)
  })
  .then(response => {
    return response.text();
  })
  .then(text => { 
    const formInp = document.querySelectorAll('.form-input');
    const wellCome = document.querySelector('.wellCome');

    let pars = JSON.parse(text);

    if(pars.status === 'success') {
      wellCome.classList.toggle('wellCome');
      form.innerHTML =`Вы вошли как ${pars.data.full_name}`;
    } else { 
      const errMess = document.createElement('div');
      form.append(errMess);
      formInp.forEach(el => {el.style.borderColor = "#fa0000";});
      errMess.innerHTML = pars.message;
    }

  });

}) 
  



