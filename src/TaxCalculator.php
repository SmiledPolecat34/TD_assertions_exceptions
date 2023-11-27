<?php

class TaxCalculator
{
    public function calculateTax($price, $tax)
    {
        return $price * $tax;
    }

    public function getTaxRate($country)
    {
        if ($country == 'FR') {
            return 0.2;
        } elseif ($country == 'UK') {
            return 0.21;
        } elseif ($country == 'DE') {
            return 0.19;
        }
    }

}

$essai = new TaxCalculator();
$price = 100;

$tax = $essai->getTaxRate('FR');
echo "Calcul : " . $essai->calculateTax($price, $tax) . "€\n";
echo "Taxe : " . $tax . "\n";
$tax = $essai->getTaxRate('UK');
echo "Calcul : £" . $essai->calculateTax($price, $tax) . "\n";
echo "Taxe : " . $tax . "\n";
$tax = $essai->getTaxRate('DE');
echo "Calcul : " . $essai->calculateTax($price, $tax) . "€\n";
echo "Taxe : " . $tax . "\n";

?>