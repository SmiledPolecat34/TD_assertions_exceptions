<?php

class AgeCalculator
{
    public function calculateAge($birthday)
    {
        $now = new DateTime();
        $interval = $now->diff($birthday);
        if ($birthday)
        return $interval->y;
    }

    public function displayAge($birthday)
    {
        $age = $this->calculateAge($birthday);
        return "Vous avez $age ans";
    }
}

// $essai = new AgeCalculator();
// echo "Vous avez " . $essai->calculateAge(new DateTime('2003-06-10')) . " ans.\n";
?>