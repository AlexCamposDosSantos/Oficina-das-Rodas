<?php
require './lib/php/conection.php';
$sql = "SELECT * FROM empresa";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$empresa = $stmt->fetch(PDO::FETCH_ASSOC);
include './lib/php/check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro Empresa</title>
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <script src="./lib/js/confirmacao_envio.js"></script>
  <script src="https://kit.fontawesome.com/ef877fec55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./lib/css/global.css">
  <script src="./lib/js/dashboard.js"></script>
  <script src="./lib/js/menu.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
              <i class="fa-solid fa-user"> </i>
              <div class="tit-cadastro">Cadastro Empresa</div>
            </h2>
          </div>
          <div class="panel-body">
            <div class="testbox">
              <form class="register_form" id="register_form" method="POST" action="./lib/php/submit.php" onsubmit="return submitForm();">
                <br />
                <fieldset>
                  <legend>Cadastro Empresa</legend>
                  <div class="columns">
                    <div class="item">
                      <label for="fname" class="text_form">Razão Social<span>*</span></label>
                      <input id="fname" type="text" name="fname" class="register_form" value="<?php echo isset($empresa['razao_social']) ? $empresa['razao_social'] : ''; ?>" <?php echo isset($empresa['razao_social']) ? 'readonly' : ''; ?> required />
                    </div>

                    <div class="item">
                      <label for="lname" class="text_form">CNPJ<span>*</span></label>
                      <input id="lname" type="text" name="lname" class="register_form" value="<?php echo isset($empresa['cnpj']) ? $empresa['cnpj'] : ''; ?>" <?php echo isset($empresa['cnpj']) ? 'readonly' : ''; ?> required />
                    </div>

                    <div class="item">
                      <label for="eaddress" class="text_form">E-mail<span>*</span></label>
                      <input id="eaddress" type="email" name="eaddress" class="register_form" value="<?php echo isset($empresa['email']) ? $empresa['email'] : ''; ?>" <?php echo isset($empresa['email']) ? 'readonly' : ''; ?> required />
                    </div>

                    <div class="item">
                      <label for="zip" class="text_form">CEP<span>*</span></label>
                      <input id="zip" type="text" name="zip" class="register_form" value="<?php echo isset($empresa['cep']) ? $empresa['cep'] : ''; ?>" <?php echo isset($empresa['cep']) ? 'readonly' : ''; ?> required oninput="fillAddress(this.value)" />
                    </div>

                    <div class="item">
                      <label for="address" class="text_form">Endereço<span></span></label>
                      <input id="address" type="text" name="address" class="register_form2" value="<?php echo isset($empresa['endereco']) ? $empresa['endereco'] : ''; ?>" readonly />
                    </div>

                    <div class="item">
                      <label for="city" class="text_form">Cidade<span></span></label>
                      <input id="city" type="text" name="city" class="register_form2" value="<?php echo isset($empresa['cidade']) ? $empresa['cidade'] : ''; ?>" readonly />
                    </div>

                    <div class="item">
                      <label for="state" class="text_form">Estado<span></span></label>
                      <input id="state" type="text" name="state" class="register_form2" value="<?php echo isset($empresa['estado']) ? $empresa['estado'] : ''; ?>" readonly />
                    </div>

                    <div class="item">
                      <label for="bairro" class="text_form">Bairro<span></span></label>
                      <input id="bairro" type="text" name="bairro" class="register_form2" value="<?php echo isset($empresa['bairro']) ? $empresa['bairro'] : ''; ?>" readonly />
                    </div>

                    <div class="item">
                      <label for="phone" class="text_form">Telefone<span>*</span></label>
                      <input id="phone" type="tel" name="phone" class="register_form" value="<?php echo isset($empresa['telefone']) ? $empresa['telefone'] : ''; ?>" <?php echo isset($empresa['telefone']) ? 'readonly' : ''; ?> required />
                    </div>
                </fieldset>
                <br />
                <div>
                  <button type="submit" class="button-enviar">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div id="successMessage" class="success-message"></div>

  <script src="./lib/js/cnpj.js"></script>
  <script src="./lib/js/cep.js"></script>
</body>

</html>
