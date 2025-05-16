<?php
//Odd or Even
// $num = readline("Enter a number: ");
// if ($num % 2 == 0) {
//     echo $num . " is Even\n";
// } else {
//     echo $num . " is Odd\n";
// }

//Short-circuited Odd or Even
// $num = readline("Enter a number: ");
// $result = "Even";
// if ($num % 2 != 0) {
//     $result = "Odd";
// }
// echo "The number is: $num and it is $result\n";

//Prime Number or Not
// function isItPrime($number) {
//     if ($number < 2) {
//         return "{$number} is not prime\n";
//     }
//     if ($number === 2) {
//         return "{$number} is prime\n";
//     }
//     $sqrtNumber = sqrt($number);
//     for ($i = 3; $i <= $sqrtNumber; $i += 2) {
//         if ($number % $i === 0) {
//             return "{$number} is not prime\n";
//         }
//     }
//     return "{$number} is prime\n";
// }

// $number = readline("Enter a number: ");
// if (!is_numeric($number)) {
//     echo "Invalid input. Please enter a number.\n";
//     exit;
// }
// $number = (int) $number;
// for ($ctr = 2; $ctr <= $number; $ctr++) {
//     //call the function here
//     echo isItPrime($ctr);
// }

//Using Slugify, UUID, and Timelog
require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify;
use Ramsey\Uuid\Uuid;
use Faker\Factory;

$slugify = new Slugify();
echo $slugify->slugify("This is the new sample text.") . "\n";

$uuid = Uuid::uuid4();
echo $uuid->toString() . "\n";

$faker = Factory::create();
echo $faker->name . "\n";
echo $faker->email . "\n";
echo $faker->text . "\n";
