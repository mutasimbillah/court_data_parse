<?php

header("Content-Type: text/plain"); // We choose to display the content as plain text

include 'simple_html_dom.php';

// We retrieve the contents using file_get_html from simple_html_dom

$html_dom = file_get_html('data.html');
//echo $html_dom;

// Getting all of the table rows
$table_rows = $html_dom->find('td');
echo $table_rows[0]->plaintext;
//echo $table_rows[0]->getAttribute('class');
echo "\n";

foreach ($table_rows as $table_row) {
    //$className = $table_row->getAttribute('class');
    //echo $className;
    echo $table_row;
    echo "\n";
    echo "\n";

}
