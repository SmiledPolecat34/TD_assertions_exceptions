<?php

class PasswordManager
{
    public function validatePassword($password)
    {
        if (strlen($password) < 8) {
            throw new Exception('Mot de passe trop court');
            return false; // Mot de passe trop court
        }

        if (!preg_match('/[A-Z]/', $password)) {
            throw new Exception('Absence de lettre majuscule');
            return false; // Absence de lettre majuscule
        }

        if (!preg_match('/[a-z]/', $password)) {
            throw new Exception('Absence de lettre minuscule');
            return false; // Absence de lettre minuscule
        }

        if (!preg_match('/[0-9]/', $password)) {
            throw new Exception('Absence de chiffre');
            return false; // Absence de chiffre
        }

        if (preg_match('/\s/', $password)) {
            throw new Exception('Présence d\'un espace');
            return false; // Présence d'un espace
        }

        if (!preg_match('/[^a-zA-Z\d]/', $password)) {
            throw new Exception('Absence de caractère spécial');
            return false; // Absence de caractère spécial
        }

        return true; // Mot de passe valide
    }
}
?>