function loadMore()
{
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (this.readyState==4 && this.status==200)
		{
			if(empty(this.responseText))
			{
				document.getElementById("loadbutton").innerHTML= "<br/><br/>Aucun autre article trouvé.<br/><br/><br/><br/>";
			}
			else
			{
				document.getElementById("morepost").innerHTML+=this.responseText;
			}
		}
	}
	xmlhttp.open("GET","assets/ajax/morePosts.php?q="+document.getElementById("morepost").childElementCount,true);
	xmlhttp.send();
}

function empty(e) {
  switch (e) {
    case "":
    case 0:
    case "0":
    case null:
    case false:
    case typeof this == "undefined":
      return true;
    default:
      return false;
  }
}
