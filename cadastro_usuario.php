<?php include './lib/php/check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro Usuário</title>
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <script src="./lib/js/confirmacao_envio.js"></script>
  <script src="https://kit.fontawesome.com/ef877fec55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./lib/css/global.css">
  <script src="./lib/js/dashboard.js"></script>
  <script src="./lib/js/menu.js"></script>
  <style>
    .columns {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .columns .item {
      flex: 1 1 45%;
      margin: 10px;
    }

    .table-center {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }

    .table-center table {
      width: 80%;
    }
  </style>
  <script>
    function setPermissions() {
      const tipo = document.getElementById('tipo').value;
      const permissions = document.getElementsByName('permissions[]');

      // Desmarcar e desabilitar todos os checkboxes inicialmente
      for (let i = 0; i < permissions.length; i++) {
        permissions[i].checked = false;
        permissions[i].disabled = true;
      }

      // Chamar a função correspondente para definir as permissões com base no tipo de usuário
      if (tipo === 'Administrador') {
        setAdminPermissions(permissions);
      } else if (tipo === 'Gerente') {
        setManagerPermissions(permissions);
      } else if (tipo === 'Mecanico') {
        setMechanicPermissions(permissions);
      }
    }

    function setAdminPermissions(permissions) {
      // Habilitar e marcar todos os checkboxes para o Administrador
      for (let i = 0; i < permissions.length; i++) {
        permissions[i].checked = true;
        permissions[i].disabled = false;
      }
    }

    function setManagerPermissions(permissions) {
      // Definir permissões específicas para o Gerente
      document.getElementById('cadastrar_usuario').checked = true;
      document.getElementById('cadastrar_cliente').checked = true;
      document.getElementById('abrir_alterar_ordem').checked = true;
      document.getElementById('gerar_termo_garantia').checked = true;
      document.getElementById('visualizar_empresa').checked = true;
      document.getElementById('visualizar_cliente').checked = true;
      document.getElementById('visualizar_ordem_servico').checked = true;
      // Habilitar os checkboxes relevantes para o Gerente
      for (let i = 0; i < permissions.length; i++) {
        permissions[i].disabled = false;
      }
    }

    function setMechanicPermissions(permissions) {
      // Definir permissões específicas para o Mecânico
      document.getElementById('visualizar_empresa').checked = true;
      document.getElementById('visualizar_cliente').checked = true;
      document.getElementById('visualizar_ordem_servico').checked = true;
      document.getElementById('registrar_manutencao').checked = true;
      // Habilitar os checkboxes relevantes para o Mecânico
      for (let i = 0; i < permissions.length; i++) {
        permissions[i].disabled = false;
      }
    }
  </script>
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
              <div class="tit-cadastro">Cadastro Usuário</div>
            </h2>
          </div>
          <div class="panel-body">
            <div class="testbox">
              <form class="register_form" id="register_form" method="POST" action="./lib/php/submit_usuario.php" onsubmit="return submitForm();">
                <br />
                <fieldset>
                  <legend>Dados do Usuário</legend>
                  <div class="columns">
                    <div class="item">
                      <label for="nome" class="text_form">Nome<span>*</span></label>
                      <input id="nome" type="text" name="nome" class="register_form form-field" required />
                    </div>
                    <div class="item">
                      <label for="email" class="text_form">E-mail<span>*</span></label>
                      <input id="email" type="email" name="email" class="register_form form-field" required />
                    </div>
                    <div class="item">
                      <label for="senha" class="text_form">Senha<span>*</span></label>
                      <input id="senha" type="password" name="senha" class="register_form form-field" required />
                    </div>
                    <div class="item">
                      <label for="tipo" class="text_form">Tipo<span>*</span></label>
                      <select id="tipo" name="tipo" required class="register_form form-field" onchange="setPermissions()">
                        <option value="">Selecione o tipo</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Mecanico">Mecânico</option>
                      </select>
                    </div>
                  </div>
                  <div class="table-center">
                    <table>
                      <tr>
                        <td><input type="checkbox" id="cadastrar_empresa" name="permissions[]" value="cadastrar_empresa"></td>
                        <td><label for="cadastrar_empresa" class="text_form">Cadastrar Empresa</label></td>
                        <td><input type="checkbox" id="visualizar_empresa" name="permissions[]" value="visualizar_empresa"></td>
                        <td><label for="visualizar_empresa" class="text_form">Visualizar Empresa</label></td>
                        <td><input type="checkbox" id="cadastrar_usuario" name="permissions[]" value="cadastrar_usuario"></td>
                        <td><label for="cadastrar_usuario" class="text_form">Cadastrar Usuário</label></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" id="cadastrar_cliente" name="permissions[]" value="cadastrar_cliente"></td>
                        <td><label for="cadastrar_cliente" class="text_form">Cadastrar Cliente</label></td>
                        <td><input type="checkbox" id="visualizar_cliente" name="permissions[]" value="visualizar_cliente"></td>
                        <td><label for="visualizar_cliente" class="text_form">Visualizar Cliente</label></td>
                        <td><input type="checkbox" id="abrir_alterar_ordem" name="permissions[]" value="abrir_alterar_ordem"></td>
                        <td><label for="abrir_alterar_ordem" class="text_form">Abrir/Alterar Ordem de Serviço</label></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" id="visualizar_ordem_servico" name="permissions[]" value="visualizar_ordem_servico"></td>
                        <td><label for="visualizar_ordem_servico" class="text_form">Visualizar Ordem de Serviço</label></td>
                        <td><input type="checkbox" id="registrar_manutencao" name="permissions[]" value="registrar_manutencao"></td>
                        <td><label for="registrar_manutencao" class="text_form">Registrar Manutenção</label></td>
                        <td><input type="checkbox" id="gerar_termo_garantia" name="permissions[]" value="gerar_termo_garantia"></td>
                        <td><label for="gerar_termo_garantia" class="text_form">Gerar Termo de Garantia</label></td>
                      </tr>
                    </table>
                  </div>
                  <br>
                </fieldset>
                <br />
                <div class="btn-block">
                  <button type="submit" class="button-enviar">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div id="successMessage" class="success-message"></div>
</body>

</html>