// Search start

function showResult(str) {
  if (str.length===0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.padding="0px";
    document.getElementById("livesearch").style.border="none";
    document.getElementById("livesearch").style.display="none";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.padding="20px";
      document.getElementById("livesearch").style.border="1px solid #ccc";
      document.getElementById("livesearch").style.display="block";
    }
  }
  xmlhttp.open("GET","search/search.php?q="+str,true);
  xmlhttp.send();
}

// Search ends