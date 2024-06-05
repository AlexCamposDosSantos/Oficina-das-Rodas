<?php
include './lib/php/cartoes.php';
include './lib/php/check.php';
include './lib/php/painel_consulta.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel</title>
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
      <div class="panel">
        <div class="geral_center">
          <div id="Bloco">
            <div class="panel-header">
              <h2>
                <i class="fa-solid fa-gear">   
                </i>Controle das Ordens de Serviços
              </h2>
            </div>
            <div class="panel-body">
              <div class="card">
                <div class="card-panel">
                  <p class="card-title">Ordens Pendentes</p>
                  <p class="card-value" data-target="<?php echo $totalPendentes; ?>">0</p>
                </div>
                <div class="card-panel">
                  <p class="card-title">Ordens em Andamento</p>
                  <p class="card-value card-value2" data-target="<?php echo $totalAndamento; ?>">0</p>
                </div>
                <div class="card-panel">
                  <p class="card-title">Ordens Concluídas</p>
                  <p class="card-value card-value3" data-target="<?php echo $totalConcluidas; ?>">0</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="Bloco2" class="geral_center2">
          <div class="panel-header">
            <h2>
              <i class="fa-solid fa-gear">   
              </i>Comparação de Métricas de Negócios
            </h2>
          </div>
          <div class="panel-body">

            <div class="canvas-container">
              <canvas id="ordensChart" class="Chart"></canvas>
              <canvas id="quantidadesChart" class="Chart" style="margin-left: 80px;"></canvas>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</body>
<script src="./lib/js/cartoes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var ctx1 = document.getElementById('ordensChart').getContext('2d');
    var myChart1 = new Chart(ctx1, {
      type: 'pie',
      data: {
        labels: ['Pendentes', 'Em andamento', 'Concluídas'],
        datasets: [{
          label: 'Ordens de Serviço por Status',
          data: [
            <?php echo $totalPendentes; ?>,
            <?php echo $totalAndamento; ?>,
            <?php echo $totalConcluidas; ?>
          ],
          backgroundColor: [
            'rgba(255, 115, 0, 0.6)',
            'rgba(255, 174, 0, 0.6)',
            'rgba(9, 255, 0, 0.6)'
          ],
          borderColor: [
            'rgba(255, 89, 0, 1)',
            'rgba(255, 213, 0, 1)',
            'rgba(20, 171, 0, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Gráfico de Quantidades (Clientes, Veículos, Usuários)
    var ctx2 = document.getElementById('quantidadesChart').getContext('2d');
    var myChart2 = new Chart(ctx2, {
      type: 'polarArea',
      data: {
        labels: ['Clientes', 'Veículos', 'Usuários'],
        datasets: [{
          label: 'Quantidade',
          data: [
            <?php echo $totalClientes; ?>,
            <?php echo $totalVeiculos; ?>,
            <?php echo $totalUsuarios; ?>
          ],
          backgroundColor: [
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(75, 192, 192, 0.6)'
          ],
          borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>

</html>