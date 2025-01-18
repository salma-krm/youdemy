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

        input {
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
  

        <!-- Formulaire de connexion -->
        <div class="form-box">
            <h2 class="form-title">Se connecter</h2>
            <form id="login-form" method="POST" action="../../index.php">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input  name="email" id="email" type="email" id="login-email" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Mot de passe</label>
                    <input  name="password" id="password" type="password" id="login-password" required>
                </div>
                <button  name ="submit" type="submit" value = "login" class="submit-btn"><a href="../app/controller/UtilisateurControllers"></a>Se connecter</button>
                <div class="form-footer">
                    <p>Pas encore de compte ? <a href="./register.php">S'inscrire</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>