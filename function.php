<?php
function task1()
{
    $xml = simplexml_load_file('data.xml');
    foreach ($xml->attributes() as $a => $b) {
        echo $a . ': ' . $b;
        echo '<br>';
    }
    echo '<br>';
    for ($i = 0; $i < 2; $i++) {
        foreach ($xml->Address[$i]->attributes() as $a => $b) {
            echo 'Address ' . $a . ': ' . $b;
            echo '<br>';
        }
        echo 'Name: ' . $xml->Address[$i]->Name;
        echo '<br>';
        echo 'Street: ' . $xml->Address[$i]->Street;
        echo '<br>';
        echo 'City: ' . $xml->Address[$i]->City;
        echo '<br>';
        echo 'State: ' . $xml->Address[$i]->State;
        echo '<br>';
        echo 'Zip: ' . $xml->Address[$i]->Zip;
        echo '<br>';
        echo 'Country: ' . $xml->Address[$i]->Country;
        echo '<br>';
        echo '<br>';
    }
    echo 'DeliveryNotes: ' . $xml->DeliveryNotes;
    echo '<br>';
    echo '<br>';

    for ($i = 0; $i < 2; $i++) {
        foreach ($xml->Items->Item[$i]->attributes() as $a => $b) {
            echo 'Item ' . $a . ': ' . $b;
            echo '<br>';
        }

        echo 'ProductName: ' . $xml->Items->Item[$i]->ProductName;
        echo '<br>';
        echo 'Quantity: ' . $xml->Items->Item[$i]->Quantity;
        echo '<br>';
        echo 'USPrice: ' . $xml->Items->Item[$i]->USPrice;
        echo '<br>';
        if ($xml->Items->Item[$i]->Comment != '') {
            echo 'Comment: ' . $xml->Items->Item[$i]->Comment;
        }
        if ($xml->Items->Item[$i]->ShipDate != '') {
            echo 'ShipDate: ' . $xml->Items->Item[$i]->ShipDate;
        }
        echo '<br>';
        echo '<br>';
    }
}

function task2()
{
    $arr = array(
        "numbers" => array(1,
            2,
            3,
            4,
            5,
            6
        ),
        "letters" => array('a',
            'a',
            'c',
            'd'
        )
    );
    //21 - измеение значений массива, сравнение, вывод в декод
    $jsonString = json_encode($arr);
    echo 'Файл output.json';
    echo '<br>';
    echo " ", json_encode($arr), "\n\n";
    file_put_contents('output.json', $jsonString);
    $jsonFile = file_get_contents('output.json');
    $jsonArray = json_decode($jsonFile, true);
    echo '<br>';
    echo 'Файл output2.json';
    echo '<br>';
    $random = rand(0, 1);
    if ($random == 1) {
        foreach ($jsonArray as &$v1) {
            foreach ($v1 as &$v2) {
                $v2 = '!';
            }
        }
        $jsonString = json_encode($jsonArray);
        file_put_contents('output2.json', $jsonString);
    }
    $jsonFile1 = file_get_contents('output2.json');
    echo $jsonFile1;
    echo '<br>';
    echo '<br>';
    $jsonArray2 = json_decode($jsonFile1, true);
    print_r($jsonArray2);
    echo '<br>';
    $jsonArray3 = json_decode($jsonFile, true);
    print_r($jsonArray3);
    echo '<br>';
    echo '<br>';
    //$result = serialize($jsonArray3, $jsonArray2);
    $diff = array_diff(array_map('json_encode', $jsonArray2), array_map('json_encode', $jsonArray3));

// Json decode the result
    $diff = array_map('json_decode', $diff);
    print_r($diff);
}

function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    if ($a!=$b){
        return 1;
    }
}


?>