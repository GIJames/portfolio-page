/*
<tr onclick="parent.embed(&quot;NAME&quot;);" >
	<td>NAME</td>
	<td><img src="img/NAME.png"></td>
	<td>DESCRIPTION</td>
</tr>
*/

var flashList = [];

function pembed(flashName){
	var flashNumber = flashList.length + 1;
	for (i = 0; i < flashList.length; i++){
		if(flashName == flashList[i].name){
			flashNumber = i;
			break;
		}
	}
	if(flashNumber <= flashList.length){
	parent.embed(flashName, flashList[i].width, flashList[i].height);
	}
}

function rowFromData(data, i){
	var s = "<tr onclick=\"pembed(&quot;";
	
	return s.concat(data[i].name, "&quot;);\" ><td>", data[i].name, "</td><td><img src=\"img/", data[i].name, ".png\"></td><td>", data[i].description, "</td></tr>");
}

function requestFlashTable(){
	var flashRequest = new XMLHttpRequest();
	var url = "js/flashlist.json";
	
	flashRequest.onreadystatechange=function() {
		if (flashRequest.readyState == 4 && flashRequest.status == 200){
			populateFlashTable(flashRequest.responseText);
		}
	}
	flashRequest.open("GET" , url, true);
	flashRequest.send();
	
}

function populateFlashTable(response){

	var flashJson = JSON.parse(response);
	flashList = flashJson.flashes;	
	
	var inside = "<table>";

	for(i = 0; i < flashList.length; i++){
		inside = inside.concat(rowFromData(flashList, i));
		
	}	
	inside = inside.concat("</table>");
	document.getElementById("flashTable").innerHTML = inside;
}
