<?php
# wikipedia.php

$html = file_get_contents('http://www.supremecourt.gov.bd/web/cause_list_print_without_result.php?court_id=36&date1=16/02/2022&bench_id=5890');

//echo $html;

$start = strrpos($html, '<table');

$end = strrpos($html, '</table', $offset = $start);

$length = $end - $start;

$htmlSection = substr($html, $start, $length);

//echo $htmlSection;

file_put_contents('data.html', $htmlSection);
