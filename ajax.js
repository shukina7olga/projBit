const form = document.getElementById('formAj');


form.addEventListener('submit', (event) => {
  
  event.preventDefault();

  document.querySelectorAll('.error').forEach(el => el.remove());

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
      form.innerHTML = `Вы вошли как ${pars.data.full_name}`;

    } else { 
      formInp.forEach(el => {el.style.borderColor = "#fa0000";});
      const errMess = document.createElement('p');
      errMess.className = 'error';
      form.append(errMess);
      errMess.innerHTML = pars.message;
    }

  });

}) 
  



