<?php
include 'inc/header.php';
include_once('comparison /simple_html_dom.php');
$variable = $_POST['input'];
$variable= str_replace(" ","+",$variable);

// Create DOM from URL or file
$html = file_get_html('https://www.daraz.com.bd/catalog/?q='.$variable.'');

//$ret['Title'] = $html->find('title', 0)->innertext;

//echo $ret['Title'];

/* foreach($html->find('section[class="products"]') as $div) {

	
	$div=str_replace("src","src2",$div);
	$div=str_replace("data-src2","src",$div);
	echo $div;
	die();
	
} */
$i=0;
$j=0;
$array = array();
$array2 = array();
foreach($html->find('img') as $element)
{
	if($i>3 && ($i%2==0)){
		 //echo $element->src . '<br>';
		 $array[$j]=$element->src;
		 
		 $j++;
		 
		 //echo '<br>====j='.$j.'<br>';
	}

	$i++;
	//echo '<br>i='.$i.'<br>';
}
 
$i=0;
$j=0;
// Find all brand
foreach($html->find('.link') as $element){
	//echo $array[$i].'<br>';
    //echo $element . '<br>'; 
	$array2[$i]=$element->href;
	//echo $array2[$i];
	$i++;
	
}
//price
$k=0;
$array3 = array();
foreach($html->find('.price-box') as $element)
{
	$array3[$k] = $element ; 
	$k++;
}


//LINK
$i=0;
echo '<div class = "container">';
foreach($html->find('.brand') as $element){
	$p1='<a href="'.$array2[$i].'">';
	echo '<div class = "col-md-4">'.$p1.'<img border="0" alt="W3Schools" src="'.$array[$j].'" width="200" height="200"><br>'.$element.'</a><br>'.$array3[$j].'</div>';
	$j++;
	$i=$i+2;
	//echo '<br>';
	//echo '<br>';
}
echo '</div>';
include 'inc/footer.php';
?>