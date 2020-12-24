//-------------------------ajax开始---------------------------------
var ajaxhttp;

function ajaxJsonPostYb(url, cfunction, csend) {
	console.log("ajax异步POST方法执行了");
	if (window.XMLHttpRequest) { // IE7+, Firefox, Chrome, Opera, Safari 代码
		ajaxhttp = new XMLHttpRequest();
	} else { // IE6, IE5 代码
		ajaxhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	ajaxhttp.onreadystatechange = function() {
		if (ajaxhttp.readyState == 4 && ajaxhttp.status == 200) {
			console.log(ajaxhttp.status + "和" + ajaxhttp.readyState);
			var data = JSON.parse(ajaxhttp.responseText);
			cfunction(data);
		}
	}
	ajaxhttp.open("POST", url, true);
	ajaxhttp.setRequestHeader("Content-type",
			"application/x-www-form-urlencoded");
	ajaxhttp.send(csend);
}

function ajaxJsonGetYb(url, cfunction) {
	console.log("ajax异步GET方法执行了");
	if (window.XMLHttpRequest) { // IE7+, Firefox, Chrome, Opera, Safari 代码
		ajaxhttp = new XMLHttpRequest();
	} else { // IE6, IE5 代码
		ajaxhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	ajaxhttp.onreadystatechange = function() {
		if (ajaxhttp.readyState == 4 && ajaxhttp.status == 200) {
			console.log(ajaxhttp.status + "和" + ajaxhttp.readyState);
			var data = JSON.parse(ajaxhttp.responseText);
			cfunction(data);
		}
	}
	ajaxhttp.open("GET", url, true);
	ajaxhttp.send();
}

function ajaxJsonPostTb(url, cfunction, csend) {
	console.log("ajax同步POST方法执行了");
	if (window.XMLHttpRequest) { // IE7+, Firefox, Chrome, Opera, Safari 代码
		ajaxhttp = new XMLHttpRequest();
	} else { // IE6, IE5 代码
		ajaxhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	ajaxhttp.onreadystatechange = function() {
		if (ajaxhttp.readyState == 4 && ajaxhttp.status == 200) {
			console.log(ajaxhttp.status + "和" + ajaxhttp.readyState);
			var data = JSON.parse(ajaxhttp.responseText);
			cfunction(data);
		}
	}
	ajaxhttp.open("POST", url, false);
	ajaxhttp.setRequestHeader("Content-type",
			"application/x-www-form-urlencoded");
	ajaxhttp.send(csend);
}

function ajaxJsonGetTb(url, cfunction) {
	console.log("ajax同步GET方法执行了");
	if (window.XMLHttpRequest) { // IE7+, Firefox, Chrome, Opera, Safari 代码
		ajaxhttp = new XMLHttpRequest();
	} else { // IE6, IE5 代码
		ajaxhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	ajaxhttp.onreadystatechange = function() {
		if (ajaxhttp.readyState == 4 && ajaxhttp.status == 200) {
			console.log(ajaxhttp.status + "和" + ajaxhttp.readyState);
			var data = JSON.parse(ajaxhttp.responseText);
			cfunction(data);
		}
	}
	ajaxhttp.open("GET", url, false);
	ajaxhttp.send();
}
// -------------------------ajax结束--------------------------

// ------------------ajax后加载JavaScript文件------------------
function loadJs(url, callback) {
	var script = document.createElement('script');
	script.type = "text/javascript";
	if (typeof (callback) != "undefined") {
		if (script.readyState) {
			script.onreadystatechange = function() {
				if (script.readyState == "loaded"
						|| script.readyState == "complete") {
					script.onreadystatechange = null;
					callback();
				}
			}
		} else {
			script.onload = function() {
				callback();
			}
		}
	}
	script.src = url;
	document.body.appendChild(script);
}
// loadJs("../js/lunbo.js", function() {
//				
// });
// ------------------ajax后加载JavaScript文件------------------
// -----------------------------------------------------------
function forData(json, num, str) {
	var Json;
	var jsonData;
	if (num == null && str == null) {
		for ( var i in json) {
			Json = json;
		}
	} else if (num != null && str == null) {
		for ( var i in json) {
			Json = json[num];
		}
	}
	return Json;
}