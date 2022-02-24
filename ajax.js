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
    const wellCome = document.getElementById('wellCome');
    //const wellComeH = document.getElementById('wellComeH');
    wellCome.classList.toggle('wellCome');

    form.innerHTML = text;

    // if(text.status === 200) {
    //   // const wellCome = document.getElementById('wellCome');
    //   // wellCome.classList.toggle('wellCome');
    //   //(console.log(`деляй ${pars.two}`)); 
    //   let pars = JSON.parse(text);
    //   console.log(pars);
    //   return pars;
    // }

    let pars = JSON.parse(text);
    wellCome.append(`Вы вошли как ${pars.two}`);

    return pars;
  });

}) 
  
  



