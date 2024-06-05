<?php include './lib/php/controle_os.php'; 
include './lib/php/check.php';?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Relatório e Termos</title>
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <script src="https://kit.fontawesome.com/ef877fec55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./lib/css/global.css">
  <script src="./lib/js/dashboard.js"></script>
  <script src="./lib/js/menu.js"></script>
  <style>
    .button-container {
      margin-top: 15px;
    }

    .button-container button {
      margin-right: 10px;
    }

    select {
      color: #4c7e4a;
      width: 300px;
      height: 30px;
    }
  </style>
  <script>
    function openReportInNewWindow(num_os) {
      var newWindow = window.open('relatorio.php?num_os=' + num_os, '_blank');
      newWindow.focus();
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
              <i class="fa-solid fa-pen-to-square"> </i>
              <div class="tit-cadastro">Relatório e Termos</div>
            </h2>
          </div>
          <div class="panel-body">
            <div class="testbox">
              <div class="container">
                <fieldset>
                  <legend>Gerar Relatório de Manutenção</legend>
                  <div class="columns">
                    <form method="POST" onsubmit="event.preventDefault(); openReportInNewWindow(document.getElementById('num_os').value);">
                      <div class="form-group">
                        <label for="num_os" class="text_form">Número da OS <b>concluída</b>:</label>
                        
                        <select id="num_os" name="num_os" class="register_form" required>
                          <?php
                            $conn = new mysqli('localhost', 'root', '', 'oficinadasrodas');
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT num_os FROM os WHERE Status = 'Concluída'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['num_os'] . "'>" . $row['num_os'] . "</option>";
                              }
                            }
                            $conn->close();
                          ?>
                        </select>

                      </div>
                      <div class="button-container">
                        <button type="submit" class="button button-enviar">Gerar Relatório</button>
                      </div>
                    </form>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>