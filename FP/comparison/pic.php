<?php
include_once('simple_html_dom.php');
$variable = $_POST['input1'];
$variable= str_replace(" ","+",$variable);

// Create DOM from URL or file

$html = file_get_html('http://www.clickbd.com/search?q='.$variable.'');


//LINK--- ARRAY2..
$name ='http://www.clickbd.com';
$i=0;
$array2 = array();
$array3 = array();
foreach($html->find('div[class=lt] a') as $element)
{

		$array2[$i]=$element->href;
		if (strpos($array2[$i], 'bangladesh') !== false) {
			$array2[$i]=$element->href;
			$array3[$i]=$element->title;
		   	//echo '<a href="'.$name.$array2[$i].'">'.$array3[$i].'<br>';
		   	$i++;
		}
		
}

//Price. ARRAY-5
$ii=0;
$array5 = array();
foreach($html->find('div[class=rt] b') as $element)
{
				$array5[$ii]=$element;
		if((strpos($array5[$ii], 'Tk.') !== true && $ii%2==1)){
			$array5[$ii]=$element;
			//echo $ii.'<br>'.$array5[$ii].'<br>';
			
		}
		$ii++;
}
//die();

//Image of clickbd
$j=0;
$i=1;
$array = array();
$array4 = array();
foreach($html->find('div[class=img] img') as $element)
{
		$array[$j]=$element->src;
		$p1='<a href="'.$name.$array2[$j].'">';
		if ((strpos($array[$j], 'global') !== false)) {
			$array[$j]=$element->src;
			$array4[$j]=$element->alt;
		   	echo '<div class = "col-md-4">'.$p1.'<img border="0" alt="W3Schools" src="'.$array[$j].'" width="200" height="200"><br></div>';
		   	echo $array4[$j]."<br></a>";
		   	echo "<br>PRICE: ".$array5[$i]."<br><br>";
		   	$i=$i + 2;
		   /*	echo '<br>'.$i;*/
		   	if((strpos($array[$j], 'img') !== false)){
		   		$j++;	
		   		/*echo '<br>'.$i.'<br>'.$j;*/
		   	}

		}
}	
echo '<br>'.$j.'<br>'.$i;
die();   

?>