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


?>