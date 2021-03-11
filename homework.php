<?php

$emails = ['john_ddd@yahoo.com', 'ds_12s@', '@gmail.com', 'e@com.pl', 'EARL.GREY@EE.EA', 'example_domain.com',
           'marta.jasik@nitro-sell.net', 'marta..jasik@nitrosell.net', 'mar-_.k@nitrosell.net', 'marta@nitrosell-.net',
           '43434@com', '-john@gmail.com', 'john.@gmail.com', 'JOHN-DOE_23@hotmail.com'];

$invalidCounter = 0;

//for nice output formatting
$maxLength = max(array_map('strlen', $emails));

/**
 * Prefix:
 *    First and last character - letter or number
 *    Other characters - letter, number, '-', '_' or '.'
 *    Length 3-40
 *
 * Single @ symbol
 *
 * Domain:
 *    First and last character - letter or number
 *    Other characters - letter, number or '-'
 *    Length 2-15
 *
 * Single '.' character
 *
 * Top-level domain:
 *    Only letters
 *    Length 2-9
 *
 * No consecutive special characters allowed.
 * All case-insensitive.
 */
foreach ($emails as $email) {
  echo $email . str_repeat(" ", $maxLength-strlen($email)) . " -> ";
  if (!preg_match('/^(?!.*[\._\-@]{2})[a-z0-9][a-z0-9_\-\.]{2,39}@[a-z0-9\-]{2,15}\.[a-z]{2,9}$/i', $email)) {
    $invalidCounter++;
    echo "in";
  }
  echo "valid" . PHP_EOL;
}

echo PHP_EOL . "You provided " . (count($emails) - $invalidCounter) . " valid e-mail addresses and " . $invalidCounter . " invalid ones.";
