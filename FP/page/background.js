

//alert('Hello, World!'); hostname
//alert('hello ' + document.location.href);

var site="www.daraz.com.bd";
if(document.location.hostname==site){
	var i = 0;
	for(i=0; i<20; i++)
		{
		var site="http://www.clickbd.com/search?q=";
		var str = document.location.href;
		str = str.substring(str.indexOf("=") + 1);

		var node = document.createElement("a"); 
		var textnode = document.createTextNode("MY WEBSITE"); 
		node.href = "http://localhost/FP/com.php?q="+str;
		node.appendChild(textnode); 
		document.getElementsByClassName("top")[i].appendChild(node);
		
		var node = document.createElement("br"); 
		var textnode = document.createTextNode("<br>"); 
		node.href = site+str;
		node.appendChild(textnode); 
		document.getElementsByClassName("top")[i].appendChild(node);
		
		var node1 = document.createElement("a"); 
		var textnode1 = document.createTextNode("CLICKBD.COM"); 
		node1.href = site+str;
		node1.appendChild(textnode1); 
		document.getElementsByClassName("top")[i].appendChild(node1);
		}
}
else{
	site="https://www.daraz.com.bd/catalog/?q=";
	var str = document.location.href;
	str = str.substring(str.indexOf("=") + 1);
	for(var i=0; i<20; i++)
		{
		var node = document.createElement("a"); 
		var textnode = document.createTextNode("MY WEBSITE"); 
		node.href = site+str;
		node.appendChild(textnode); 
		document.getElementsByClassName("sh")[i].appendChild(node);

		var node = document.createElement("br"); 
		var textnode = document.createTextNode("<br>"); 
		node.href = site+str;
		node.appendChild(textnode); 
		document.getElementsByClassName("sh")[i].appendChild(node);
		
		var node1 = document.createElement("a"); 
		var textnode1 = document.createTextNode("daraz.com"); 
		node1.href = site+str;
		node1.appendChild(textnode1); 
		document.getElementsByClassName("sh")[i].appendChild(node1);
		}
}


