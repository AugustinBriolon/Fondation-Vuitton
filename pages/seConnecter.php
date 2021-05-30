<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/index.css">
        <title>Se connecter</title>
    </head>
    <body>
        <div class="login-form">
        <?php 
            if(isset($_GET['login_err']))
        {
        $err = htmlspecialchars($_GET['login_err']);
    
            switch($err)
        {
            case 'password':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> mot de passe incorrect
        </div>
        <?php
            break;
            case 'email':
        ?>
        <div class="alert alert-danger">
                <strong>Erreur</strong> email incorrect
        </div>
        <?php
            break;
            case 'already':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> compte non existant
        </div>
        <?php
            break;
        }
        }
        ?> 
                
                <form action="login.php" method="post">
                    <h2 class="text-center">Connexion</h2>       
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                    </div>   
                </form>
            </div>
            <style>
                .login-form {
                    width: 340px;
                    margin: 50px auto;
                }
                .login-form form {
                    margin-bottom: 15px;
                    background: #f7f7f7;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .login-form h2 {
                    margin: 0 0 15px;
                }
                .form-control, .btn {
                    min-height: 38px;
                    border-radius: 2px;
                }
                .btn {        
                    font-size: 15px;
                    font-weight: bold;
                }
            </style>
            </body>
    </html>