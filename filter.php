<?php

header("Content-Type: text/plain"); // We choose to display the content as plain text

include 'simple_html_dom.php';

// We retrieve the contents using file_get_html from simple_html_dom

$html_dom = file_get_html('data.html');
//echo $html_dom;

// Getting all of the table rows
$table_rows = $html_dom->find('td');
$total = count($table_rows);
$total = $total - 2;
//$sample = $table_rows[58]->plaintext;
//echo $sample;
// echo $table_rows[0]->getAttribute('class');
// echo "\n";
// preg_match_all('!\d+!', $sample, $matches);
// print_r($matches);
function cleanText($text_to_clean_up)
{
    return trim(preg_replace('/[\t\n\r\s]+/', ' ', $text_to_clean_up));
}

$data = [];
$header = cleanText($table_rows[0]->plaintext);

$i = 1;
while ($i < $total) {
    $className = $table_rows[$i]->getAttribute('class');
    if ($className == 'bottom_head') {
        $header = $table_rows[$i]->plaintext;
        $i = $i + 1;
    }
    $item = [];
    array_push(
        $item,
        $header,
        cleanText($table_rows[$i]->plaintext),
        cleanText($table_rows[$i + 1]->plaintext),
        cleanText($table_rows[$i + 2]->plaintext),
    );
    array_push($data, $item);
    $i = $i + 3;
}

$output = json_encode($data);
file_put_contents('output.json', $output);
echo "\n";
