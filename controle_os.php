<?php include './lib/php/controle_os.php';
include './lib/php/check.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Controle de O.S.</title>
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <script src="https://kit.fontawesome.com/ef877fec55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./lib/css/global.css">
  <script src="./lib/js/menu.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./lib/js/dashboard.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
    .filter-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .filter-group {
      flex: 1;
      margin-right: 10px;
    }
  </style>
</head>

<body class="dashboard-page">
  <div class="container">
    <input type="checkbox" name="" id="side-menu-switch">
    <?php include 'menu.php'; ?>
    <div class="page_center">
      <div class="panel">
        <div class="geral_center">
          <div class="panel-header">
            <h2 class="h2-panel">
              <i class="fa-solid fa-folder-open"> </i>
              <div class="tit-cadastro">Controle de O.S</div>
            </h2>
          </div>
          <div class="panel-body">
            <div class="testbox">
              <form class="register_form" id="myForm" method="GET" action="">
                <br />
                <fieldset>
                  <legend>Controle de O.S.</legend>
                  <div class="filter-container">
                    <div class="filter-group">
                      <label for="status" class="text_form">Filtrar por Status:</label>
                      <select name="status" id="status" class="register_form form-field">
                        <option value="">Todos</option>
                        <option value="Novo">Novo</option>
                        <option value="Em atendimento">Em atendimento</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Urgente">Urgente</option>
                        <option value="Concluída">Concluída</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Aguardando peças">Aguardando peças</option>
                        <option value="Aguardando aprovação">Aguardando aprovação</option>
                      </select>
                    </div>

                    <div class="filter-group">
                      <label for="cliente" class="text_form">Filtrar por Cliente:</label>
                      <select name="cliente" id="cliente" class="register_form form-field">
                        <option value="">Todos</option>
                        <?php
                        $sql_clientes = "SELECT nome_razao FROM cliente";
                        $result_clientes = $conn->query($sql_clientes);
                        if ($result_clientes->num_rows > 0) {
                          while ($row_cliente = $result_clientes->fetch_assoc()) {
                            echo "<option value='" . $row_cliente['nome_razao'] . "'>" . $row_cliente['nome_razao'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="filter-group">
                      <label for="mecanico" class="text_form">Filtrar por Mecânico:</label>
                      <select name="mecanico" id="mecanico" class="register_form form-field">
                        <option value="">Todos</option>
                        <?php
                        $sql_mecanicos = "SELECT nome FROM usuario WHERE tipo = 'Mecanico'";
                        $result_mecanicos = $conn->query($sql_mecanicos);
                        if ($result_mecanicos->num_rows > 0) {
                          while ($row_mecanico = $result_mecanicos->fetch_assoc()) {
                            echo "<option value='" . $row_mecanico['nome'] . "'>" . $row_mecanico['nome'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="filter-group">
                      <label for="num_os" class="text_form">Filtrar por Número da OS:</label>
                      <input type="text" name="num_os" class="register_form form-field">
                    </div>
                  </div>
              </form>
              <div class="order-details">
                <button type="submit" class="button button-enviar3 filtrarbtn">Filtrar</button>
                <table>
                  <tr>
                    <th class="resizable">Número da OS</th>
                    <th class="resizable">Data de Abertura</th>
                    <th class="resizable">Cliente</th>
                    <th class="resizable">Status</th>
                    <th class="resizable">Veículo</th>
                    <th class="resizable">Modelo</th>
                    <th class="resizable">Mecânico Responsável</th>
                  </tr>
                  <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr class='os-row' data-num-os='" . $row["num_os"] . "'>";
                      echo "<td class='os-cell'>" . $row["num_os"] . "</td>";
                      echo "<td>" . $row["dat_abert"] . "</td>";
                      echo "<td>" . $row["nome_razao"] . "</td>";
                      echo "<td>" . $row["Status"] . "</td>";
                      echo "<td>" . $row["marca"] . "</td>";
                      echo "<td>" . $row["modelo"] . "</td>";
                      echo "<td>" . $row["Merc_resp"] . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='7'>Nenhum resultado encontrado.</td></tr>";
                  }
                  ?>
                </table>
              </div>
              </fieldset>
              <div id="resultado_busca" class="resultado-busca"></div>
            </div>
            <div class="panel-body">
              <div class="testbox2 oculto">
                <form id="form-abrir-os" class="register_form" action="./lib/php/submit_laudo.php" method="post" onsubmit="return submitForm()">
                  <br />
                  <fieldset>
                    <legend>Laudo Mecânico</legend>

                    <div class="columns">
                      <div class="item">
                        <label for="num_os" class="text_form">Número de OS<span></span></label>
                        <input id="num_os" type="text" name="num_os" required class="register_form form-field" value="" readonly />
                      </div>
                      <div class="item">
                        <label for="data_abertura" class="text_form">Data de Abertura<span></span></label>
                        <input id="data_abertura" type="date" name="data_abertura" value="" class="register_form form-field" />
                      </div>
                      <div class="item">
                        <label for="status" class="text_form">Status<span></span></label>
                        <select id="status_laudo" name="status" required class="register_form form-field">
                          <option value="Novo">Selecione o Status</option>
                          <option value="Novo">Novo</option>
                          <option value="Em atendimento">Em atendimento</option>
                          <option value="Pendente">Pendente</option>
                          <option value="Urgente">Urgente</option>
                          <option value="Concluída">Concluída</option>
                          <option value="Cancelado">Cancelado</option>
                          <option value="Aguardando peças">Aguardando peças</option>
                          <option value="Aguardando aprovação">Aguardando aprovação</option>
                        </select>
                      </div>

                      <div class="item">
                        <label for="Cliente" class="text_form">Cliente<span></span></label>
                        <input id="Cliente" type="text" name="Cliente" required class="register_form form-field" value="" readonly />
                      </div>
                      <div class="item">
                        <label for="Veiculo" class="text_form">Veículo<span></span></label>
                        <input id="Veiculo" type="text" name="Veiculo" required class="register_form form-field" value="" readonly />
                      </div>
                      <div class="item">
                      <label for="mecanico" class="text_form">Mecanico Responsável<span>*</span></label>
                      <select name="mecanico" required id="mecanico" class="register_form form-field">
                        <option value="">Selecione o Mecânico</option>
                        <?php
                        $sql_mecanicos = "SELECT nome FROM usuario WHERE tipo = 'Mecanico'";
                        $result_mecanicos = $conn->query($sql_mecanicos);
                        if ($result_mecanicos->num_rows > 0) {
                          while ($row_mecanico = $result_mecanicos->fetch_assoc()) {
                            echo "<option value='" . $row_mecanico['nome'] . "'>" . $row_mecanico['nome'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                      <div class="full-width">
                        <label for="descricao_problemas" class="text_form">Descrição do Problema<span></span></label>
                        <textarea id="descricao_problemas" name="descricao_problemas" rows="6" required class="register_form form-field"></textarea>
                      </div>
                      <div class="full-width">
                        <label for="informacoes_adicionais" class="text_form">Informações Adicionais</label>
                        <textarea id="informacoes_adicionais" name="informacoes_adicionais" class="register_form form-field"></textarea>
                      </div>
                      <div class="full-width">
                        <label for="servicos_executados" class="text_form">Serviços Executados<span>*</span></label>
                        <textarea id="servicos_executados" name="serv_exec" required rows="6" class="register_form form-field"></textarea>
                      </div>
                      <div class="btn-block">
                        <button type="submit" id="submitFormBtn" class="button-enviar ">Salvar</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="successMessage" class="success-message"></div>
  <script>
    $(".resizable").resizable({
      handles: "e",
      minWidth: 50
    });
    document.querySelectorAll('.os-row').forEach(row => {
  row.addEventListener('click', function() {
    const num_os = row.getAttribute('data-num-os');

    fetch('./lib/php/get_os_data.php?num_os=' + num_os)
      .then(response => response.json())
      .then(data => {
        console.log('Dados da O.S:', data);
        
        if (document.getElementById('num_os')) {
          document.getElementById('num_os').value = data.num_os;
        }
        if (document.getElementById('data_abertura')) {
          document.getElementById('data_abertura').value = data.dat_abert;
        }
        if (document.getElementById('status')) {
          document.getElementById('status').value = data.Status;
        }
        if (document.getElementById('Cliente')) {
          document.getElementById('Cliente').value = data.nome_razao;
        }
        if (document.getElementById('Veiculo')) {
          document.getElementById('Veiculo').value = data.veiculo;
        }
        if (document.getElementById('Mecanico')) {
          document.getElementById('Mecanico').value = data.Merc_resp;
        }
        if (document.getElementById('descricao_problemas')) {
          document.getElementById('descricao_problemas').value = data.Descricao;
        }
        if (document.getElementById('informacoes_adicionais')) {
          document.getElementById('informacoes_adicionais').value = data.inf_adic;
        }
        if (document.getElementById('servicos_executados')) {
          document.getElementById('servicos_executados').value = data.serv_exec;
        }
        if (document.getElementById('status_laudo')) {
          document.getElementById('status_laudo').value = data.Status;
        }

        document.getElementById('form-abrir-os').style.display = 'block';

        const statusSelect = document.getElementById('status');
        const statusOption = [...statusSelect.options].find(option => option.value === data.Status);
        if (statusOption) {
          statusSelect.value = statusOption.value;
        }
      })
      .catch(error => {
        console.error('Erro ao obter dados da O.S:', error);
      });
  });
});

function submitForm() {
  var form = document.getElementById('form-abrir-os');
  var formData = new FormData(form);

  formData.delete('Cliente');

  fetch(form.action, {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    document.getElementById('successMessage').innerText = data;
    document.getElementById('successMessage').style.display = 'block';
    setTimeout(function() {
      document.getElementById('successMessage').style.display = 'none';
      location.reload();
    }, 4000);
  })
  .catch(error => console.error('Error:', error));

  return false;
}

$(document).ready(function(){
  $('.os-row').on('click', function(){
    $('.testbox').addClass('oculto');
  });
});

$(document).ready(function(){
  $('#submitFormBtn').on('click', function(){
    $('.testbox').removeClass('oculto');
  });
});

$(document).ready(function(){
  $('.os-row').on('click', function(){
    $('.testbox2').removeClass('oculto');
  });

  $('#submitFormBtn').on('click', function(){
    $('.testbox2').addClass('oculto');
  });
});
  </script>
</body>

</html>