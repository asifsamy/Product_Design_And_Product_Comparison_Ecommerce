<?php
setlocale(LC_ALL, 'en_US.UTF-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "design_club";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// END DB----------------------------

include_once('comparison /simple_html_dom.php');

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
foreach($html->find('.price') as $element)
{
	$array3[$k] = $element ; 
	/*echo $element;
	die();*/
	$k++;
	/*if($element )*/
}

//Name
$k=0;
$array4 = array();
foreach($html->find('.name') as $element)
{
	$array4[$k] = $element ; 
	//echo $array4[$k]."<br>";
	$k++;

}


//LINK
$i=0;
$n=0;
echo '<div class = "container">';
foreach($html->find('.brand') as $element){



	/*$p1='<a href="'.$array2[$i].'">';*/
	//echo '<div class = "col-md-4">'.$p1.'<img border="0" alt="W3Schools" src="'.$array[$j].'" width="200" height="200"><br>'.$element.'</a><br>'.$array4[$n].'<br>'.$array3[$i].'</div>';
	
	
	$array3[$i]=str_replace(',', '', $array3[$i]);
	$array3[$i]=str_replace(' ', '', $array3[$i]);
	$array3[$i]=substr($array3[$i],88);
	$array3[$i]=substr($array3[$i], 0, -21);

	$ss =  $array3[$i];
	$ll=0;
	for ($iii = 1; $iii <= strlen($ss); $iii++){
	   $char = $ss[$iii-1];
	   if (is_numeric($char)) {
	   } else {
	      $ll++;
	   }
	}
	$array3[$i]=substr($array3[$i], 0, -$ll);
	$sql = "UPDATE others_product SET product_price = '$array3[$i]' WHERE product_catagory = '$variable'";
	if (mysqli_query($conn, $sql)) {
	   /* echo "New record created successfully";*/
	} else {
	   /* echo "Error: " . $sql . "<br>" . mysqli_error($conn);*/
	}
	//
	$n++;
	$j++;
	$i=$i+2;
}

$html = file_get_html('http://www.clickbd.com/search?q='.$variable.'');


//LINK--- ARRAY2..
$name ='http://www.clickbd.com';
$i=0;
$array7 = array();
$array8 = array();
// address/link for clickbd....$array7
// name for clickbd....$array8
foreach($html->find('div[class=lt] a') as $element)
{

		$array7[$i]=$element->href;
		$array7[$i]=$name.$array7[$i];
/*		if (strpos($array7[$i], 'bangladesh') !== false) {
			$array7[$i]=$element->href;*/
			$array8[$i]=$element->title;
		   	//echo '<a href="'.$name.$array7[$i].'">'.$array8[$i].'<br>';
		   	$i++;
/*		}*/
		
}

//Price for clickbd....$array10
$ii=0;
$array10 = array();
foreach($html->find('div[class=rt] b') as $element)
{
				$array10[$ii]=$element;
		if((strpos($array10[$ii], 'Tk.') !== true && $ii%2==1)){
			$array10[$ii]=$element;
			$array10[$ii]=substr($array10[$ii],3);
			$array10[$ii]=substr($array10[$ii], 0, -4);
			$array10[$ii]=str_replace(",","",$array10[$ii]);
			//echo $ii.'<br>'.$array10[$ii].'<br>';

		}
	//converting string price to int price
	// string to int
	//$array10[$ii] =(int)$array10[$ii];
	
		$ii++;
}
//die();

//Image for clickbd...$array6
$j=0;
$i=1;
$array6 = array();
$array9 = array();
foreach($html->find('div[class=img] img') as $element)
{
		$array6[$j]=$element->src;
		$p1='<a href="'.$name.$array7[$j].'">';
		if ((strpos($array6[$j], 'global') !== false)) {
			$array6[$j]=$element->src;
			$array9[$j]=$element->alt;
/*		   	echo '<div class = "col-md-4">'.$p1.'<img border="0" alt="W3Schools" src="'.$array6[$j].'" width="200" height="200"><br></div>';
		   	echo $array9[$j]."<br></a>";
		   	echo "<br>PRICE: ".$array10[$i]."<br><br>";*/


		   	$sql = "UPDATE others_product SET product_price = '$array10[$i]' WHERE product_catagory = '$variable'";
		   	

		   /*	echo '<br>'.$i;*/
		   	if((strpos($array6[$j], 'img') !== false)){
		   		$j++;	
		   		/*echo '<br>'.$i.'<br>'.$j;*/
		   	}
		   		$i=$i + 2;

		}

			if (mysqli_query($conn, $sql)) {
/*	   echo "New record created successfully";*/
	} else {
/*	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);*/
	}
}

goto CInsert;
}



?>