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
    let pars = JSON.parse(text);

    if(pars.result === 'success') {
      const wellCome = document.getElementById('wellCome');
      const wellComeH = document.getElementById('wellComeH');

      form.innerHTML = text;
      wellCome.classList.toggle('wellCome');
      wellComeH.append(` вы вошли как ${pars.two}`);

      return pars;
    }
    
    formInp.forEach(el => {
      el.style.borderColor = "#fa0000";
    });
    
    return text;
  });

}) 
  
  



