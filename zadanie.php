<?php
    # Zadanie 1 + zadanie dodatkowe
    # Do zadań wykorzystam tablice asocjacyjne

    $csv_data = fopen("php_internship_data.csv", "r");

    $array_name = [];
    $array_birthday = [];

    while (($data = fgetcsv($csv_data, 50, ",")) !== false) {

        # Jeżeli wartość daty urodzenia jest większa lub równa 2000-01-01 zwiększ wartość o 1
        if(strtotime($data[1]) >= strtotime("2000-01-01")){
            # Jeżeli podany klucz nie istanieje w tablicy, zostaje utworzony oraz zostaje przypisana mu wartość 0
            if(!isset($array_birthday[$data[1]])){
                $array_birthday[$data[1]] = 0;
            }
            $array_birthday[$data[1]]++;
        }
        # Jeżeli podany klucz nie istanieje w tablicy, zostaje utworzony oraz zostaje przypisana mu wartość 0
        if(!isset($array_name[$data[0]])){
            $array_name[$data[0]] = 0;
        }
        # Wartość w tablicy dla wskazanego klucza zwiększona zostaje o 1
        $array_name[$data[0]]++;
    }

    # Sortowanie tablicy po wartościach malejąco
    arsort($array_name);

    echo "Zadanie 1:\n";
    foreach(array_slice($array_name, 0, 10) as $name => $num){
        echo ucfirst($name)."\t".$num."\n";
    };

    # Sortowanie tablicy po wartościach malejąco
    arsort($array_birthday);
    echo "\nZadanie dodatkowe:\n";
    foreach(array_slice($array_birthday, 0, 10) as $birthday => $num){
        echo date("d.m.Y",strtotime($birthday))." ".$num."\n";
    };
?>