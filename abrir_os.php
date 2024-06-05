<?php include './lib/php/conection.php';
include './lib/php/check.php';

$stmt = $pdo->query('SELECT num_os FROM OS ORDER BY num_os DESC LIMIT 1');
$last_num_os = $stmt->fetchColumn();
$next_num_os = $last_num_os + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Abrir O.S.</title>
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <script src="https://kit.fontawesome.com/ef877fec55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./lib/css/global.css">
  <script src="./lib/js/dashboard.js"></script>
  <script src="./lib/js/menu.js"></script>
</head>

<body class="dashboard-page">
  <div class="container">
    <input type="checkbox" name="" id="side-menu-switch">
    <?php include 'menu.php'; ?>
    <div class="page_center">
      <div class="panel" id="abrir-os">
        <div class="geral_center">
          <div class="panel-header">
            <h2 class="h2-panel">
              <i class="fa-solid fa-file"> </i>
              <div class="tit-cadastro">Abrir O.S</div>
              <div class="button-container">
                <button type="button" name="salvar" id="saveClientBtn" class="btn-block button2" title="Salvar dados do cliente">
                  <i class="fa-solid fa-save fa-solid2"></i>
                </button>
                <button type="button" name="cancelar" class="btn-block button2" onclick="window.location.href='painel.php';" title="Cancelar operação">
                  <i class="fa-solid fa-times fa-solid2"></i>
                </button>
              </div>
            </h2>
          </div>
          <div class="panel-body">
            <div class="testbox">
              <form id="form-abrir-os" class="register_form" action="./lib/php/submit_os.php" method="post" onsubmit="return submitForm()">
                <br />
                <fieldset>
                  <legend>Abrir Ordem de serviço</legend>
            
                  <div class="columns">
                    <div class="item">
                      <label for="num_os" class="text_form">Número de OS<span>*</span></label>
                      <input id="num_os" type="text" name="num_os" required class="register_form form-field" value="<?php echo $next_num_os; ?>" readonly />
                    </div>
                    <div class="item">
                      <label for="data_abertura" class="text_form">Data de Abertura<span>*</span></label>
                      <input id="data_abertura" type="date" name="data_abertura" value="<?php echo date('Y-m-d'); ?>" class="register_form form-field" />
                    </div>
                    <div class="item">
                      <label for="status" class="text_form">Status<span>*</span></label>
                      <select id="status" name="status" required class="register_form form-field">
                        <option value="">Selecione o Status</option>
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
                      <label for="cliente" class="text_form">Cliente<span>*</span></label>
                      <select id="cliente" name="cliente" required class="register_form form-field">
                        <option value="">Selecione o Cliente</option>
                        <?php
                        $stmt = $pdo->query('SELECT id, nome_razao FROM cliente');
                        while ($row = $stmt->fetch()) {
                          echo '<option value="' . $row['id'] . '">' . $row['nome_razao'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="item">
                      <label for="veiculo" class="text_form">Veículo<span>*</span></label>
                      <select id="veiculo" name="veiculo" required class="register_form form-field">
                        <option value="">Selecione o Veículo</option>
                        <?php
                        $stmt = $pdo->query('SELECT id, modelo, marca, cliente_id FROM veiculo');
                        while ($row = $stmt->fetch()) {
                          echo '<option value="' . $row['id'] . '" data-cliente-id="' . $row['cliente_id'] . '">' . $row['marca'] . ' - ' . $row['modelo'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="item">
                      <label for="mecanico" class="text_form">Mecânico Responsável <span></span></label>
                      <select id="mecanico" name="mecanico" class="register_form form-field">
                        <option value="">Selecione o Mecânico</option>
                        <?php
                        $stmt = $pdo->query("SELECT nome FROM usuario WHERE tipo = 'Mecanico'");
                        while ($row = $stmt->fetch()) {
                          echo '<option value="' . $row['nome'] . '">' . $row['nome'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="full-width">
                      <label for="descricao_problemas" class="text_form">Descrição do Problema<span>*</span></label>
                      <textarea id="descricao_problemas" name="descricao_problemas" required rows="6" required class="register_form form-field"></textarea>
                    </div>
                    <div class="full-width">
                      <label for="informacoes_adicionais" class="text_form">Informações Adicionais</label>
                      <textarea id="informacoes_adicionais" name="informacoes_adicionais" class="register_form form-field"></textarea>
                    </div>
                    <div class="full-width">
                      <input type="hidden" id="hidden_servicos_executados" name="servicos_executados">
                    </div>
                    <div class="btn-laudo">
                      <button id="gerenciar-laudo-btn" type="button" class="button-enviar button-enviar2 oculto">Laudo Mecânico</button>
                    </div>
                  </div>
                </fieldset>
                <div class="btn-block">
                  <button type="submit" id="submitFormBtn" class="button-enviar oculto">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="laudo-mecanico" class="panel oculto" style="display: none;">
        <div class="geral_center">
          <div class="panel-header">
            <h2 class="h2-panel">
              <i class="fa-solid fa-user"> </i>
              <div class="tit-cadastro">Laudo Mecânico</div>
              <div class="button-container">
                <button type="button" name="salvar" id="saveClientBtn3" class="btn-block button2" title="Salvar dados do cliente">
                  <i class="fa-solid fa-save fa-solid2"></i>
                </button>
                <button type="button" name="cancelar" class="btn-block button2" onclick="window.location.href='painel.php';" title="Cancelar operação">
                  <i class="fa-solid fa-times fa-solid2"></i>
                </button>
              </div>
            </h2>
          </div>
          <div class="panel-body">
            <div class="testbox">
              <form id="form-laudo-mecanico" class="register_form">
                <br />
                <fieldset>
                  <legend>Laudo Mecânico</legend>
                  <div class="columns">
                    <div class="item">
                      <label for="laudo_num_os" class="text_form">Número de OS<span></span></label>
                      <input id="laudo_num_os" type="text" name="num_os" required class="register_form form-field" />
                    </div>
                    <div class="item">
                      <label for="laudo_data_abertura" class="text_form">Data de Abertura<span></span></label>
                      <input id="laudo_data_abertura" type="date" name="data_abertura" value="<?php echo date('Y-m-d'); ?>" class="register_form form-field" />
                    </div>
                    <div class="item">
                      <label for="laudo_status" class="text_form">Status<span>*</span></label>
                      <select id="laudo_status" name="status" required class="register_form form-field">
                        <option value="">Selecione o Status</option>
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
                      <label for="laudo_cliente" class="text_form">Cliente<span></span></label>
                      <input id="laudo_cliente" type="text" name="cliente" class="register_form form-field" />
                    </div>
                    <div class="item">
                      <label for="laudo_veiculo" class="text_form">Veículo<span></span></label>
                      <input id="laudo_veiculo" type="text" name="veiculo" class="register_form form-field" />
                    </div>
                    <div class="item">
                      <label for="laudo_mecanico" class="text_form">Mecânico Responsável <span>*</span></label>
                      <select id="laudo_mecanico" name="mecanico" required class="register_form form-field">
                        <option value="">Selecione o Mecânico</option>
                        <?php
                        $stmt = $pdo->query("SELECT nome FROM usuario WHERE tipo = 'Mecanico'");
                        while ($row = $stmt->fetch()) {
                          echo '<option value="' . $row['nome'] . '">' . $row['nome'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="full-width">
                      <label for="servicos_executados" class="text_form">Serviços Executados<span>*</span></label>
                      <textarea id="servicos_executados" name="serv_exec" required rows="6" required class="register_form form-field"></textarea>
                    </div>
                    <div class="btn-laudo">
                      <button id="voltar-os-btn" type="button" class="button-enviar">Voltar</button>
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
  <div id="successMessage" class="success-message"></div>
  <script>
    document.getElementById('gerenciar-laudo-btn').addEventListener('click', function() {
      document.getElementById('laudo_num_os').value = document.getElementById('num_os').value;
      document.getElementById('laudo_data_abertura').value = document.getElementById('data_abertura').value;
      document.getElementById('laudo_status').value = document.getElementById('status').value;
      document.getElementById('laudo_cliente').value = document.getElementById('cliente').options[document.getElementById('cliente').selectedIndex].text;
      document.getElementById('laudo_veiculo').value = document.getElementById('veiculo').options[document.getElementById('veiculo').selectedIndex].text;
      document.getElementById('laudo_mecanico').value = document.getElementById('mecanico').value;
      document.getElementById('abrir-os').style.display = 'none';
      document.getElementById('laudo-mecanico').style.display = 'block';
    });

    document.getElementById('voltar-os-btn').addEventListener('click', function() {
      document.getElementById('hidden_servicos_executados').value = document.getElementById('servicos_executados').value;
      document.getElementById('abrir-os').style.display = 'block';
      document.getElementById('laudo-mecanico').style.display = 'none';
    });

    document.getElementById('cliente').addEventListener('change', function() {
      var cliente_id = this.value;
      var veiculos = document.getElementById('veiculo').getElementsByTagName('option');

      for (var i = 0; i < veiculos.length; i++) {
        if (veiculos[i].getAttribute('data-cliente-id') === cliente_id || veiculos[i].getAttribute('data-cliente-id') === '') {
          veiculos[i].style.display = 'block';
        } else {
          veiculos[i].style.display = 'none';
        }
      }
    });

    function submitForm() {
      var form = document.getElementById('form-abrir-os');
      var formData = new FormData(form);

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
            window.location.href = 'painel.php';
          }, 4000);
        })
        .catch(error => console.error('Error:', error));

      return false;
    }

    document.getElementById('saveClientBtn3').addEventListener('click', function() {
      document.getElementById('voltar-os-btn').click();
      setTimeout(function() {
        document.getElementById('submitFormBtn').click();
      }, 100);
    });

    document.getElementById('saveClientBtn').addEventListener('click', function() {
      document.getElementById('submitFormBtn').click();
    });

    document.getElementById('saveClientBtn2').addEventListener('click', function() {
      document.getElementById('submitFormBtn').click();
    });
  </script>
</body>

</html>