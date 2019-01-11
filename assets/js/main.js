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




$(document).ready(function() 
{
	
	//fonction pour s'inscrire à la newsletter
	
	$('.formsubmit').click(function(e) 
	{
		e.preventDefault(); // On empêche de soumettre le formulaire
 
		var email = $('#e-mail').val();
 
		if (email == '')
		{
			$("#newsletter-messages").html('Veuillez entrer une adresse email');
			$('#e-mail').focus();
			return false;
		}
		
		
		$.ajax(
		{
			url: "assets/ajax/submitEmail.php", 
			type: "POST", 
			data: "email="+email,
			success: function(data)
			{
				$("#newsletter-messages").html(data);
			}
		});
 
	});
});
