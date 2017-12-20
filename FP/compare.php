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
include 'inc/header.php';
include_once('comparison /simple_html_dom.php');
$variable = $_POST['input'];
$variable= str_replace(" ","+",$variable);



// through crawler inserting to the database:



// CInsert is a element using for goto
CInsert:
$sql = "SELECT product_address,product_image,product_name,product_price FROM others_product where product_catagory='$variable' and product_price>10  ORDER BY product_price asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {

		$p1='<a href="'.$row["product_address"].'">';
        echo '<div class = "col-md-4" style="float:left;padding: 25px;
    margin: 22px; width:260px; height:260px;">'.$p1.'<img border="0" alt="W3Schools" src="'.$row["product_image"].'" width="200" height="200"><br>'.$row["product_name"].'</a><br>PRICE: TK. <b>'.$row["product_price"].'</b></div>';
    }

} 

else {
   
// Create DOM from URL or file
$html = file_get_html('https://www.daraz.com.bd/catalog/?q='.$variable.'');


$i=0;
$j=0;
$array = array();
$array2 = array();

// image for daraz $array

foreach($html->find('img') as $element)
{
	if($i>3 && ($i%2==0)){
		 //echo $element->src . '<br>';
		 $array[$j]=$element->src;
		 
		 $j++;
	}

	$i++;
}
 
$i=0;
$j=0;

// brand/address for daraz... $array2

foreach($html->find('.link') as $element){
	//echo $array[$i].'<br>';
    //echo $element . '<br>'; 
	$array2[$i]=$element->href;
	//echo $array2[$i];
	$i++;
	
}
//price for daraz...$array3
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

//Name for daraz...$array4
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



/*	$p1='<a href="'.$array2[$i].'">';
	echo '<div class = "col-md-4" style="float:left;padding: 25px;
    margin: 22px; width:260px; height:260px;">'.$p1.'<img border="0" alt="W3Schools" src="'.$array[$j].'" width="200" height="200"><br>'.$element.'</a><br>'.$array4[$n].'<br>'.$array3[$i].'</div>';*/
	
	
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
	    //echo "New record created successfully";
	} else {
	    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	//Inserting end---
	$n++;
	$j++;
	$i=$i+2;
}









//FOR CLICKBD.COM



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


		   	$sql = "INSERT ignore INTO others_product (product_image,product_name, product_address, product_catagory,product_price)
			VALUES ('{$array6[$j]}','{$array9[$j]}', '{$array7[$j]}', '$variable','{$array10[$i]}')";
		   	

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
echo '</div>';
//include 'inc/footer.php';

?>