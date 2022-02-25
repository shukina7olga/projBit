const form = document.getElementById('formAj');

form.addEventListener('submit', (event) => {
  
  event.preventDefault();
  
  fetch('backend.php', {
    method: 'POST',
    body: new FormData(form)
  })
  .then(response => {
    //console.log(response);
    return response.text();
  })
  .then(text => { 
    const formInp = document.querySelectorAll('.form-input');

    if(text.length > 5) {
      const wellCome = document.getElementById('wellCome');
      const wellComeH = document.getElementById('wellComeH');
      form.innerHTML = text;
      wellCome.classList.toggle('wellCome');
      let pars = JSON.parse(text);
      wellComeH.append(` вы вошли как ${pars.two}`);
      return pars;
    }
    formInp.forEach(el => {
      el.style.borderColor = "#fa0000";
    });
    
    return text;
  });

}) 
  
  



