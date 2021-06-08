<?php
include('simple_html_dom.php');
$html = file_get_html('https://region15.ru/novosti/');

$textpolups = array();
$hrefs = array();
$i = 0;
$textarray = array();
foreach($html->find('div.news-item__text') as $element){
    $textarray[]=$element;
}
$datetimes = array();
foreach($html->find('div.news-item__meta') as $element){
    $datetimes[]=$element;
}
foreach($html->find('a.news-item-link') as $element){
    $link = $element->href;
    $hrefs[]=$link;
    echo '<a href = "'. $link.'"class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true"><div class="d-flex w-100 align-items-center justify-content-between"><strong class="mb-1">'.$textarray[$i]->plaintext.'</strong><small>'.$datetimes[$i]->plaintext.'</small></div><div class="col-10 mb-1 small"></div></a>';
    $i =$i+1;
}

foreach($textarray as $element){
    $textpolups[]=$element->plaintext;
}

$html1 = file_get_html('https://region15.ru/novosti/page/2/');


$i = 0;
$textarray = array();
foreach($html1->find('div.news-item__text') as $element){
    $textarray[]=$element;
}
$datetimes = array();
foreach($html1->find('div.news-item__meta') as $element){
    $datetimes[]=$element;
}
foreach($html1->find('a.news-item-link') as $element){
    $link = $element->href;
    $hrefs[]=$link;
    echo '<a href = "'.$link.'"class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true"><div class="d-flex w-100 align-items-center justify-content-between"><strong class="mb-1">'.$textarray[$i]->plaintext.'</strong><small>'.$datetimes[$i]->plaintext.'</small></div><div class="col-10 mb-1 small"></div></a>';
    $i =$i+1;
}


foreach($textarray as $element){
    $textpolups[]=$element->plaintext;
}
$reversed = array_reverse($textpolups);
$links = array_reverse($hrefs);

?>