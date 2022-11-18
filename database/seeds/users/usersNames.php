<?php

function getRandomName(): string
{
    $names = ['John', 'Bob', 'Robert', 'Kevin', 'Bo', 'Riannon', 'Duncan', 'Ayla', 'Phoebe', 'Jennifer'];
    return $names[rand() % 10];
}

function getRandomSurname(): string
{
    $surnames = ['Travolta', 'Dallas', 'Lewandowski', 'Feige', 'Lucas', 'Decart', 'McCloud', 'Labaf', 'Buffay', 'Lopes'];
    return $surnames[rand() % 10];
}

function getRandomFullName(): string
{
    return getRandomName() . " usersNames.php" . getRandomSurname();
}