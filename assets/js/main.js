function loadMore() {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			document.getElementById("morepost").innerHTML=this.responseText;
		}
  }
  xmlhttp.open("GET","assets/ajax/morePosts.php",true);
  xmlhttp.send();
}
