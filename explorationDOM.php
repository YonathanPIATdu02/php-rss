<?php
require_once "./classe/WebPage.class.php";
$xml = new DOMdocument();
$xml->load("http://www.bfmtv.com/rss/societe/");
$html = new WebPage("voir bfm");
$items = $xml->getElementsByTagName("item");
$titres = $xml->getElementsByTagName("title");
$titre = $titres[0]->nodeValue;

$html->appendContent("<h1>Les nouvelles de '$titre'</h1>");
foreach($items as $item){
    $titre = $item->getElementsByTagName("title")[0]->nodeValue;
    $html->appendContent("<div>".$titre."</div>");
}

echo $html->toHTML();