<?php
// Create DOM from URL or file
$html = file_get_html('https://www.daraz.com.bd/catalog/?q='.$variable.'');

echo '<br><h3>daraz.com</h3><br>';

$i=0;
$j=0;
$array = array();
$array2 = array();
foreach($html->find('div[class=top] img') as $element)
{
	if($i>3 && ($i%2==0)){
		 //echo $element->src . '<br>';
		 $array[$j]=$element;
		 $array[$j]=str_replace("src","srcb",$array[$j]);
		 $array[$j]=str_replace("data-srcb","src",$array[$j]);
		 echo $array[$j];
		 $j++;
	}
	$i++;
}
 die();
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



	$p1='<a href="'.$array2[$i].'">';
	echo '<div class = "col-md-4">'.$p1.'<img border="0" alt="W3Schools" src="'.$array[$j].'" width="200" height="200"><br>'.$element.'</a><br>'.$array4[$n].'<br>'.$array3[$i].'</div>';
	
	
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

	$sql = "INSERT ignore INTO others_product (product_image,product_name, product_address, product_catagory,product_price)
	VALUES ('{$array[$j]}','{$array4[$n]}', '{$array2[$i]}', '$variable','$array3[$i]')";

	if (mysqli_query($conn, $sql)) {
	   // echo "New record created successfully";
	} else {
	    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	//Inserting end---
	$n++;
	$j++;
	$i=$i+2;
}
echo '</div>';

?>