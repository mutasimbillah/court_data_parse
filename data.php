<?php
# wikipedia.php

$html = file_get_contents('http://www.supremecourt.gov.bd/web/cause_list_print_without_result.php?court_id=50&date1=15/02/2022&bench_id=5978');

//echo $html;

$start = strrpos($html, '<table');

$end = strrpos($html, '</table', $offset = $start);

$length = $end - $start;

$htmlSection = substr($html, $start, $length);

echo $htmlSection;
