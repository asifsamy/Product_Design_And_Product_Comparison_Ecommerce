// Similar Search button control..
var go = document.getElementById('do-count');
go.style.display = 'none';
// Form Visibility and hide control..
var nam = document.getElementById('myForm');
nam.style.display = 'none';

// Knock button hide and visble control..
function knocks(){
	nam.style.display = 'block';
	var kon = document.getElementById('knock');
	kon.style.display = 'none';
}

// Form submit hide and visble control..
function submit(){
	var name = document.getElementById('name').value;
	var site = document.getElementById('url').value;
	var email = document.getElementById('email').value;
	var name = name.toUpperCase();
	if(email!=""){
		nam.style.display = 'none';
		document.getElementById('demo1').textContent="Thank You "+name+". We will get back to you shortly.";
	}else{
		document.getElementById('demo1').textContent="* Incorrect!! Please check Your Email Address.";
	}
}

// Check site must be daraz or click..
// If YES then show Find Similar product button..
var domain="";
chrome.tabs.getSelected(null, function (tab) {
	var url = new URL(tab.url)
	domain = url.hostname;
	if(domain=="www.daraz.com.bd" || domain=="www.clickbd.com"){
		go.style.display = 'block';
	}
})

// Send user to my website..
var link="http://localhost/FP/com.php?q=";
function count(){
	chrome.tabs.query({'active': true, 'windowId': chrome.windows.WINDOW_ID_CURRENT},
	   function(tabs){
	   		if(domain=="www.daraz.com.bd"){
	   			var str = tabs[0].url;
		   		if(str.indexOf('catalog') >= 0){
		   			str = str.substring(str.indexOf("=") + 1);
			      	var urll=link+str;
			      	chrome.tabs.update({ url: urll });
			      	document.getElementById('demo1').textContent="Wait Please. You will be redirected shortly.";
					chrome.tabs.onUpdated.addListener(function (tabId , info) {
					  if (info.status === 'complete') {
					    document.getElementById('demo1').textContent="You Have Reached the Destination Website. Enjoy your shopping..";
					  }
					});
				}else if(str.indexOf('-') >= 0){
					str = str.substring(str.indexOf("d/") + 2);
					str = str.substring(0,str.indexOf("-"));
			      	var urll=link+str;
			      	chrome.tabs.update({ url: urll });
			      	document.getElementById('demo1').textContent="Wait Please. You will be redirected shortly.";
					chrome.tabs.onUpdated.addListener(function (tabId , info) {
					  if (info.status === 'complete') {
					    document.getElementById('demo1').textContent="You Have Reached the Destination Website. Enjoy your shopping..";
					  }
					});
				}else{
					chrome.tabs.update({ url: "http://localhost/FP/" });
					chrome.tabs.onUpdated.addListener(function (tabId , info) {
					  if (info.status === 'complete') {
					    document.getElementById('demo1').textContent="You Have Reached the Destination Website. Enjoy your shopping..";
					  }
					});					
				}
	   		}else{
	   			var str = tabs[0].url;
		   		if(str.indexOf('search') >= 0){
		   			str = str.substring(str.indexOf("=") + 1);
			      	var urll=link+str;
			      	chrome.tabs.update({ url: urll });
			      	document.getElementById('demo1').textContent="Wait Please. You will be redirected shortly.";
					chrome.tabs.onUpdated.addListener(function (tabId , info) {
					  if (info.status === 'complete') {
					    document.getElementById('demo1').textContent="You Have Reached the Destination Website. Enjoy your shopping..";
					  }
					});
				}else if(str.indexOf('-') >= 0){
					str = str.substring(str.indexOf("-") + 1);
					str = str.substring(0,str.indexOf("-"));
			      	var urll=link+str;
			      	chrome.tabs.update({ url: urll });
			      	document.getElementById('demo1').textContent="Wait Please. You will be redirected shortly.";
					chrome.tabs.onUpdated.addListener(function (tabId , info) {
					  if (info.status === 'complete') {
					    document.getElementById('demo1').textContent="You Have Reached the Destination Website. Enjoy your shopping..";
					  }
					});
				}else{
					chrome.tabs.update({ url: "http://localhost/FP/" });
					chrome.tabs.onUpdated.addListener(function (tabId , info) {
					  if (info.status === 'complete') {
					    document.getElementById('demo1').textContent="You Have Reached the Destination Website. Enjoy your shopping..";
					  }
					});
				}
	   		}
	   }
	); 
}

// Function calling..
document.getElementById('do-count').onclick=count;
document.getElementById('knock').onclick=knocks;
document.getElementById('sbmt').onclick=submit;

// User Information Send to Database.
function myAlert(){
document.getElementById('myForm').submit();
}

document.addEventListener('DOMContentLoaded', function () {
document.getElementById('sbmt').addEventListener('click', myAlert);
});
