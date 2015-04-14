var swapping = false;
var lastpage = 1;
var page = 1;
var options = ["home", "flash", "music", "contact"];

function swapTo(p) {
	if (p !== page && !swapping && p <= 4) {
	swapping = true;
	swapButton(options[page-1] + "-button", options[p-1] + "-button");
	document.getElementById("loadArea").className = "collapse";
	document.getElementById("background").className = "expand";
	lastpage = page;
	page = p;
	setTimeout( finishSwap, 500);
	}
}
function swapButton(from, to){
	document.getElementById(from).className = "button";
	document.getElementById(to).className = "button-selected";
}
function finishSwap(){

	swapPage(options[lastpage-1] + "Div", options[page-1] + "Div");
	document.getElementById("loadArea").className = "expand";
	document.getElementById("background").className = "collapse";
	//setTimeout( function(){ swapping = false; }, 500);
	swapping = false;
}
function swapPage(from, to){
	document.getElementById(from).className = "invisibleSection";
	document.getElementById(to).className = "visibleSection";
}

function fastSwap(p){
	if (p !== page && !swapping && p <= 4 && p >= 1 ) {
	swapping = true;
	swapButton(options[page-1] + "-button", options[p-1] + "-button");
	document.getElementById("loadArea").className = "collapse";
	document.getElementById("background").className = "expand";
	lastpage = page;
	page = p;
	swapPage(options[lastpage-1] + "Div", options[page-1] + "Div");
	document.getElementById("loadArea").className = "expand";
	document.getElementById("background").className = "collapse";
	swapping = false;
	}
}


function unEmbed(){
	if(!swapping){
	swapping = true;
	document.getElementById("embed-button").className = "button-hidden";
	document.getElementById("title-button").className = "button-hidden";
	document.getElementById("detail-button").className = "button-hidden";
	document.getElementById("flash-button").className = "button-selected";
	document.getElementById("home-button").className = "button";
	document.getElementById("contact-button").className = "button";
	document.getElementById("music-button").className = "button";
	document.getElementById("loadArea").className = "collapse";
	document.getElementById("background").className = "expand";
	setTimeout( finishReturn, 500);
	}
}
function finishReturn(){
	document.getElementById("flashEmbedDiv").className = "invisibleSection";
	document.getElementById("flashEmbedDiv").innerHTML = "";
	document.getElementById("flashDiv").className = "visibleSection";
	document.getElementById("loadArea").className = "expand";
	document.getElementById("background").className = "collapse";
	setTimeout( function(){ swapping = false; }, 500);
}


var flashLoad = "";
var directLink = "";

function linkToFlash(){
	window.location.assign(directLink);
}

function embed(flashName, flashWidth, flashHeight){
	if(!swapping){
	swapping = true;
	document.getElementById("embed-button").className = "button";
	document.getElementById("title-button").className = "button-selected";
	document.getElementById("detail-button").className = "button-full";
	directLink = window.location.protocol + "//" + window.location.hostname + "?f=" + flashName + "&w=" + flashWidth + "&h=" + flashHeight;
	document.getElementById("title-button").innerHTML = "<h1>" + flashName + "</h1>";
	document.getElementById("flash-button").className = "button-hidden";
	document.getElementById("home-button").className = "button-hidden";
	document.getElementById("contact-button").className = "button-hidden";
	document.getElementById("music-button").className = "button-hidden";
	document.getElementById("loadArea").className = "collapse";
	document.getElementById("background").className = "expand";
	flashLoad = "<object id=\"flashPlayer\" width=\"" + flashWidth + "\" height=\"" + flashHeight + "\" data=\"" + pre + "swf/" + flashName + ".swf\"" + " style=\"position: relative; top:" + (720 - flashHeight)/2 + "px; left:" + (1280-flashWidth)/2 + "px;\"" + "></object>";
	setTimeout( finishEmbed, 500);
	}
}

function finishEmbed(){
	document.getElementById("flashDiv").className = "invisibleSection";
	document.getElementById("flashEmbedDiv").className = "visibleSection";
	document.getElementById("flashEmbedDiv").innerHTML = flashLoad;
	document.getElementById("flashPlayer").focus();
	document.getElementById("loadArea").className = "expand";
	document.getElementById("background").className = "collapse";
	setTimeout( function(){ swapping = false; }, 500);
}

function fastEmbed(flashName, flashWidth, flashHeight){
	if(!swapping){
	swapping = true;
	document.getElementById("embed-button").className = "button";
	document.getElementById("title-button").className = "button-selected";
	document.getElementById("detail-button").className = "button-full";
	directLink = window.location.protocol + "//" + window.location.hostname + "?f=" + flashName + "&w=" + flashWidth + "&h=" + flashHeight;
	document.getElementById("title-button").innerHTML = "<h1>" + flashName + "</h1>";
	document.getElementById("flash-button").className = "button-hidden";
	document.getElementById("home-button").className = "button-hidden";
	document.getElementById("contact-button").className = "button-hidden";
	document.getElementById("music-button").className = "button-hidden";
	document.getElementById("loadArea").className = "collapse";
	document.getElementById("background").className = "expand";
	flashLoad = "<object id=\"flashPlayer\" width=\"" + flashWidth + "\" height=\"" + flashHeight + "\" data=\"" + pre + "swf/" + flashName + ".swf\"" + " style=\"position: relative; top:" + (720 - flashHeight)/2 + "px; left:" + (1280-flashWidth)/2 + "px;\"" + "></object>";
	document.getElementById("flashDiv").className = "invisibleSection";
	document.getElementById("flashEmbedDiv").className = "visibleSection";
	document.getElementById("flashEmbedDiv").innerHTML = flashLoad;
	document.getElementById("flashPlayer").focus();
	document.getElementById("loadArea").className = "expand";
	document.getElementById("background").className = "collapse";
	swapping = false;
	}
}