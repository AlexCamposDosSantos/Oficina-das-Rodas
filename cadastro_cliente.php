<?php include './lib/php/conection.php'; ?>
<?php include './lib/php/search_cliente.php'; 
include './lib/php/check.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro Cliente</title>
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <script src="https://kit.fontawesome.com/ef877fec55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./lib/css/global.css">
  <script src="./lib/js/dashboard.js"></script>
  <script src="./lib/js/menu.js"></script>
  <script src="./lib/js/cadastrar_veiculo.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <style>
    .success-message {
      display: none;
      margin-top: 10px;
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
              <i class="fa-solid fa-user"></i>
              <div class="tit-cadastro">Cadastro Cliente</div>
              <div class="button-container">
                <select id="searchInput" name="cliente_id" class="select-cliente">
                  <option value="">Selecione um cliente</option>
                  <?php
                  $stmt = $pdo->prepare("SELECT id, nome_razao FROM cliente");
                  $stmt->execute();
                  $clientes = $stmt->fetchAll();
                  foreach ($clientes as $cliente) {
                    echo '<option value="' . $cliente['id'] . '">' . $cliente['nome_razao'] . '</option>';
                  }
                  ?>
                </select>
                <button type="button" name="novo" id="addClientBtn" class="btn-block button2" title="Adicionar novo cliente">
                  <i class="fa-solid fa-plus fa-solid2"></i>
                </button>
                <button type="button" name="salvar" id="saveClientBtn" class="btn-block button2" title="Salvar dados do cliente">
                  <i class="fa-solid fa-save fa-solid2"></i>
                </button>
                <button type="button" name="veiculo" id="addVehicleBtn" class="btn-block button2" title="Adicionar veículo">
                  <i class="fa-solid fa-car fa-solid2"></i>
                </button>
                <button type="button" name="cancelar" class="btn-block button2" onclick="window.location.href='painel.php';" title="Cancelar operação">
                  <i class="fa-solid fa-times fa-solid2"></i>
                </button>
              </div>
            </h2>
          </div>

          <div class="panel-body">
            <div class="testbox">
              <form class="register_form" id="register_form" method="POST" action="javascript:void(0);">
                <br />
                <fieldset>
                  <legend>Cliente</legend>
                  <div class="columns">
                    <div class="item">
                      <label for="fname" class="text_form">Nome completo<span>*</span></label>
                      <input id="fname" type="text" name="fname" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="lname" class="text_form">CPF<span>*</span></label>
                      <input id="lname" type="text" name="lname" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="phone" class="text_form">Telefone<span>*</span></label>
                      <input id="phone" type="tel" name="phone" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="zip" class="text_form">CEP<span>*</span></label>
                      <input id="zip" type="text" name="zip" required class="register_form" onchange="fillAddress(this.value)" />
                    </div>
                    <div class="item">
                      <label for="address" class="text_form">Endereço<span>*</span></label>
                      <input id="address" type="text" name="address" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="bairro" class="text_form">Bairro<span>*</span></label>
                      <input id="bairro" type="text" name="bairro" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="city" class="text_form">Cidade<span>*</span></label>
                      <input id="city" type="text" name="city" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="state" class="text_form">Estado<span>*</span></label>
                      <input id="state" type="text" name="state" class="register_form" />
                    </div>
                    <div class="item">
                      <label for="eaddress" class="text_form">E-mail<span>*</span></label>
                      <input id="eaddress" type="text" name="eaddress" class="register_form" />
                    </div>
                  </div>
                </fieldset>
                <fieldset class="fieldset2 vehicle-fieldset">
                  <legend>Veículo</legend>
                  <div class="columns">
                    <div class="item2">
                      <label for="marca" class="text_form">Marca<span>*</span></label>
                      <input id="marca" type="text" name="marca[]" class="register_form" />
                    </div>
                    <div class="item2">
                      <label for="modelo" class="text_form">Modelo<span>*</span></label>
                      <input id="modelo" type="text" name="modelo[]" class="register_form" />
                    </div>
                    <div class="item2">
                      <label for="ano" class="text_form">Ano<span>*</span></label>
                      <input id="ano" type="text" name="ano[]" class="register_form" />
                    </div>
                    <div class="item2">
                      <label for="placa" class="text_form">Placa<span>*</span></label>
                      <input id="placa" type="text" name="placa[]" required class="register_form" />
                    </div>
                    <div class="item2">
                      <label for="quilometragem" class="text_form">Quilometragem<span>*</span></label>
                      <input id="quilometragem" type="text" name="quilometragem[]" required class="register_form" />
                    </div>
                    <div class="item2">
                      <label for="renavan" class="text_form">Renavan<span>*</span></label>
                      <input id="renavan" type="text" name="renavan[]" required class="register_form" />
                    </div>
                  </div>
                </fieldset>
                <input type="hidden" name="cliente_id" id="cliente_id" value="">
                <br />
                <div class="btn-block">
                  <button type="submit" class="button-enviar oculto">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="successMessage" class="success-message">Cliente cadastrado com sucesso!</div>
    <script src="./lib/js/cep.js"></script>
    <script>
      $(document).ready(function() {
        $('#addClientBtn').click(function() {
          $('#register_form').find('input[type="text"], input[type="tel"], input[type="hidden"]').val('');
        });
        $('#searchInput').change(function() {
          var cliente_id = $(this).val();

          if (cliente_id !== "") {
            $.ajax({
              url: './lib/php/get_cliente_details.php',
              method: 'POST',
              data: {
                cliente_id: cliente_id
              },
              success: function(response) {
                var data = JSON.parse(response);
                $('#fname').val(data.nome_razao);
                $('#lname').val(data.cpf_cnpj);
                $('#phone').val(data.telefone);
                $('#zip').val(data.cep);
                $('#address').val(data.endereco);
                $('#bairro').val(data.bairro);
                $('#city').val(data.cidade);
                $('#state').val(data.estado);
                $('#eaddress').val(data.email);
                $('#marca').val(data.marca);
                $('#modelo').val(data.modelo);
                $('#ano').val(data.ano);
                $('#placa').val(data.placa);
                $('#quilometragem').val(data.quilometragem);
                $('#renavan').val(data.renavan);
              },
              error: function(xhr, status, error) {
                console.error(xhr.responseText);
              }
            });
          } else {
            $('#register_form').find('input[type="text"], input[type="tel"], input[type="hidden"]').val('');
          }
        });

        $('#saveClientBtn').click(function() {
          $('#register_form').submit();
        });

        $('#register_form').on('submit', function(e) {
          e.preventDefault();

          $.ajax({
            url: './lib/php/submit_cliente.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
              showSuccessMessage();
            },
            error: function(xhr, status, error) {
              console.error(xhr.responseText);
            }
          });
        });

        function showSuccessMessage() {
          var successMessage = $('#successMessage');
          successMessage.show();

          setTimeout(function() {
            successMessage.hide();
          }, 3000);
        }
      });
    </script>
  </div>
</body>

</html>

