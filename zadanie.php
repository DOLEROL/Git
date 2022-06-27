<?php
    # Zadanie 1 + zadanie dodatkowe
    # Do zadań wykorzystane zostały tablice asocjacyjne

    $csv_data = fopen("php_internship_data.csv", "r");

    $array_name = [];
    $array_birthday = [];

    # Funkcja sprawdzająca czy podany klucz istanieje w tablicy oraz zwiększająca wartość o 1
    function checkArrayKey(&$array, $key){

        # Jeżeli podany klucz nie istanieje w tablicy, zostaje utworzony oraz zostaje przypisana mu wartość 1.
        # W innym przypadku wartość zostaje zwiększona o 1
        (!isset($array[$key])) ? $array[$key] = 1 : $array[$key]++;
    }

    while (($data = fgetcsv($csv_data, 50, ",")) !== false) {

        # Jeżeli wartość daty urodzenia jest większa lub równa 2000-01-01
        (strtotime($data[1]) >= strtotime("2000-01-01")) ? checkArrayKey($array_birthday, $data[1]) : null;

        checkArrayKey($array_name, $data[0]);
    }

    # Sortowanie tablicy po wartościach malejąco
    arsort($array_name);

    echo "Zadanie 1:\n";
    foreach(array_slice($array_name, 0, 10) as $name => $num){
        echo ucfirst(strtolower($name));
        echo (mb_strlen($name) < 8) ? "\t\t" : "\t";
        echo $num."\n";
    };

    # Sortowanie tablicy po wartościach malejąco
    arsort($array_birthday);

    echo "\nZadanie dodatkowe:\n";
    foreach(array_slice($array_birthday, 0, 10) as $birthday => $num){
        # Zmiana formatu wyświetlanej daty z Y-m-d na d.m.Y
        echo date("d.m.Y",strtotime($birthday))." ".$num."\n";
    };
?>