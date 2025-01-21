<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Youdemy - Inscription & Connexion</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f5f6fa;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .forms-container {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      justify-content: center;
      max-width: 1200px;
      width: 100%;
    }

    .form-box {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .form-title {
      color: #2c3e50;
      margin-bottom: 1.5rem;
      text-align: center;
      font-size: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      color: #2c3e50;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
    }

    input:focus {
      outline: none;
      border-color: #3498db;
      box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
    }

    .role-selection {
      display: flex;
      gap: 2rem;
      margin: 1rem 0;
      padding: 1rem;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f8f9fa;
    }

    .role-option {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }

    .role-option input[type="radio"] {
      cursor: pointer;
      width: 1.2rem;
      height: 1.2rem;
    }

    .role-option label {
      margin: 0;
      cursor: pointer;
    }

    .submit-btn {
      background-color: #3498db;
      color: white;
      padding: 0.8rem;
      border: none;
      border-radius: 5px;
      width: 100%;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .submit-btn:hover {
      background-color: #2980b9;
    }

    .form-footer {
      margin-top: 1rem;
      text-align: center;
      color: #7f8c8d;
    }

    .form-footer a {
      color: #3498db;
      text-decoration: none;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

    .password-requirements {
      font-size: 0.8rem;
      color: #7f8c8d;
      margin-top: 0.5rem;
    }
  </style>
</head>

<body>
  <div class="forms-container">
    <!-- Formulaire d'inscription -->
    <div class="form-box">
      <h2 class="form-title">Créer un compte</h2>
      <?php

      if (isset($_SESSION["message_error"])):
         
        ?>
        <div style="color:red;" >
          <?= $_SESSION["message_error"] ?>
        </div>
        <?php
        unset($_SESSION["message_error"]);
      endif;
      ?>

      <form method="POST" action="http://localhost:8081/youdemy/index.php?route=register" id="signup-form">
        <div class="form-group">
          <label for="signup-name">Nom </label>
          <input name="firstname" id="nom" type="text" id="signup-name" required>
        </div>
        <div class="form-group">
          <label for="signup-name">Prenom </label>
          <input name="lastname" id="prenom" type="text" id="signup-name" required>
        </div>
        <div class="form-group">
          <label for="signup-email">Email</label>
          <input name="email" id="email" type="email" id="signup-email" required>
        </div>
        <div class="form-group">
          <label>Je suis</label>
          <div class="role-selection">
            <div class="role-option">
              <input name="role" id="role" type="radio" id="role-student" name="role" value="etudiant" checked>
              <label for="role-student">Étudiant</label>
            </div>
            <div class="role-option">
              <input name="role" id="role" type="radio" id="role-teacher" name="role" value="enseignant">
              <label for="role-teacher">Enseignant</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="signup-password">Mot de passe</label>
          <input type="password" name="password" id="signup-password" required>
          <div class="password-requirements">
            Le mot de passe doit contenir au moins 8 caractères
          </div>
        </div>
        <!-- <input type="submit"> -->
        <button name="submit" type="submit" class="submit-btn">S'inscrire</button>
        <div class="form-footer">
          Déjà un compte ? <a href="./login.php">Se connecter</a>
        </div>
      </form>
    </div>


  </div>
</body>

</html>