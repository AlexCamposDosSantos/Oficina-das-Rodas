function fillAddress(zip) {
    fetch(`https://viacep.com.br/ws/${zip}/json/`)
      .then(response => response.json())
      .then(data => {
        if (!data.erro) {
          document.getElementById('address').value = data.logradouro;
          document.getElementById('bairro').value = data.bairro;
          document.getElementById('city').value = data.localidade;
          document.getElementById('state').value = data.uf;
        } else {
          alert("CEP não encontrado");
        }
      })
      .catch(error => console.error('Erro ao buscar CEP:', error));
  }