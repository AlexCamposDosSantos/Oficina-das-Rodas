<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O.S Control</title>
  <link rel="stylesheet" href="lib/css/global.css">
  <link rel="icon" href="./lib/img/icon-logo.png" type="image/png">
  <style>
    .error-message {
        color: #ff6262;
        text-align: center;
        margin-bottom: 10px;
        font-size: 15px;
    }
    .error-message svg {
        vertical-align: middle;
        margin-right: 5px;
        fill: #ff6262;
    }
  </style>
</head>
<body class="align">
  <div class="grid">
    <div class="logo-container">
      <img src="lib/img/logo.png" alt="Logo">
    </div>
    <form action="./lib/php/login.php" method="POST" class="form login">
    <div class="form__field">
        <label for="login__email">
          <svg class="icon">
            <use xlink:href="#icon-user"></use> 
          </svg><span class="hidden"> Email</span></label>
        <input id="login__email" type="email" name="email" class="form__input login__email" placeholder="Email" required>
      </div>
      <div class="form__field">
        <label for="login__password">
          <svg class="icon">
            <use xlink:href="#icon-lock"></use>
          </svg><span class="hidden"> Senha</span></label>
        <input id="login__password" type="password" name="password" class="form__input" placeholder="Senha" required>
      </div>
      <?php
      session_start();
      if (isset($_SESSION['error_message'])) {
          echo '<div class="error-message">
                  <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ff6262" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>' . $_SESSION['error_message'] . '</div>';
          unset($_SESSION['error_message']);
      }
      ?>
      <div class="form__field">
        <input type="submit" value="Entrar">
      </div>
    </form>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/>
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/>
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/>
    </symbol>
  </svg>
</body>
</html>
