function myFunction(){
	//get the Checkbox
	var checkbox=document.getElementById("myCheck");
	//get the output Text
	var text=document.getElementById("text");
	//if the checkbox checked,display output
	if(checkbox.checked==true){
		text.style.display="none";
	}else {
		text.style.display="block";
	}
	
}
function seemore() {
    var element = document.getElementById("seemore");
    element.style.color = "black";
    element.innerHTML = "Philosophers have emphasized the power of books in expanding our understanding of the world, engaging with different perspectives, and gaining insights into various subjects. Books are seen as tools for intellectual growth and self-improvement.";
    element.style.fontFamily = "'Comic Sans MS', cursive";
    element.style.fontSize = "20px"; 
}