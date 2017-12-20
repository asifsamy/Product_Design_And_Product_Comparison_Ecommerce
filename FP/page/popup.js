

var a=0;
var link="http://localhost/FP/com.php?q=";
function count(){
	a++;
	document.getElementById('demo').textContent="";
	chrome.tabs.query({'active': true, 'windowId': chrome.windows.WINDOW_ID_CURRENT},
	   function(tabs){
	   		var str = tabs[0].url;
			str = str.substring(str.indexOf("=") + 1);
	      	document.getElementById('demo1').textContent="";
	      	var urll=link+str;
	      	chrome.tabs.update({ url: urll });

	   }
	);
}

document.getElementById('do-count').onclick=count;


function myAlert(){
document.getElementById('myForm').submit();
}

document.addEventListener('DOMContentLoaded', function () {
document.getElementById('sbmt').addEventListener('click', myAlert);
});
