<?php

    session_start(); // Démarrage de la session
    require_once 'config.php'; // On inclut la connexion à la base de données
    if (isset($_POST['email']) && isset($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, email, password, role FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        // Si > à 0 alors l'utilisateur existe
        if ($row > 0) {
            // Si le mail est bon niveau format
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Si le mot de passe est le bon
                if (md5($password) === $data['password']) {
                    // On créer la session et on redirige sur index.php
                    $_SESSION['user'] = $data['pseudo'];
                    $_SESSION['role'] = $data['role'];
                    header('Location: ../index.php');
                    //Si il y a une erreur
                } else {
                    header('Location: seConnecter.php?login_err=password');
                    die();
                }
            } else {
                header('Location: seConnecter.php?login_err=email');
                die();
            }
        } else {
            header('Location: seConnecter.php');
            die();
        }
    }

