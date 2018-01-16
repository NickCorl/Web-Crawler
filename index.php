<?php
$start = "http://www.cnn.com";

function follow_links($url){
	
	$doc = new DOMDocument();
	$doc->loadHTML(file_get_contents($url));
	
	//Find and store all anchors in HTML code of website
	$linklist = $doc->getElementsByTagName("a");
	
	foreach ($linklist as $link){
		//Copy and contain the link where provided href= element within the anchor tags
		$l = $link->getAttribute("href");
		//Copy and contain text within the anchor tags
		$lt = $link->nodeValue;
		echo $l."\n";
		
		if(parse_url($l, PHP_URL_PATH) != "/" && parse_url($l, PHP_URL_PATH) != "" ){
			//Outputs path of link
			echo $lt." [".rtrim(parse_url($l, PHP_URL_PATH),"/")."]\n";
		}
		
		elseif( parse_url($l, PHP_URL_FRAGMENT) != ""){
			//Outputs fragment of link if provided
			echo $lt." [#".parse_url($l, PHP_URL_FRAGMENT)."]\n";
		}
	}
	
}

follow_links($start);