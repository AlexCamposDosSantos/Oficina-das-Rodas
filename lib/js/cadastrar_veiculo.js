document.addEventListener("DOMContentLoaded", function() {
  const addVehicleBtn = document.getElementById("addVehicleBtn");
  const vehicleFieldset = document.querySelector('.vehicle-fieldset');

  let vehicleCounter = 1;

  addVehicleBtn.addEventListener("click", function() {
    const newVehicleFieldset = vehicleFieldset.cloneNode(true);
    const vehicleInputs = newVehicleFieldset.querySelectorAll('.register_form');
    vehicleInputs.forEach(input => {
      const inputName = input.getAttribute('name') + vehicleCounter;
      input.setAttribute('name', inputName);
      input.value = '';
    });

    vehicleCounter++;

    vehicleFieldset.parentNode.appendChild(newVehicleFieldset);

    adicionarVeiculo();
  });
});

function adicionarVeiculo() {

  const panel = document.querySelector('.geral_center');
  const veiculosAdicionados = document.querySelectorAll('.card-panel');

  let alturaTotalVeiculos = 0;
  veiculosAdicionados.forEach(veiculo => {
    alturaTotalVeiculos += veiculo.offsetHeight;
  });

  panel.style.height = `${alturaTotalVeiculos}px`;
}