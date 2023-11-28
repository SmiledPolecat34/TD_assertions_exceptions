<?php

class AgeCalculator {
    public function calculateAge($birthday) {
        if (!$this->isValidDate($birthday)) {
            throw new Exception("La date de naissance est incorrecte");
        }

        $today = new DateTime();
        $birthDate = new DateTime($birthday);
        $age = $today->diff($birthDate)->y;

        if ($today < $birthDate) {
            throw new Exception("La date de naissance est dans le futur");
        }

        return $age;
    }

    private function isValidDate($date) {
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);
        return $dateTime && $dateTime->format('Y-m-d') === $date;
    }
}

// $essai = new AgeCalculator();
// echo "Vous avez " . $essai->calculateAge('2003-06-10') . " ans.\n";

?>