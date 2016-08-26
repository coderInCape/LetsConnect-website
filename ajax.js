

function showitem(str) {
    if (str == "") {
        document.getElementById("functionContent").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }	
		{
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("functionContent").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","display_useritem.php?username="+str,true);
        xmlhttp.send();				
    }
	}
}

function clickColor(str)
{
	if (str.length==0) { 
    document.getElementById("color").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("color").innerHTML= str;
	  return;
    }
  }
 
}

function display_location(str) {
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("lo").innerHTML=xmlhttp.responseText;
    }
  }
 
	  xmlhttp.open("GET","display_location.php?keyword="+str,true);
  

  xmlhttp.send();
}

function showResult(str,type) {
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("mainContent").innerHTML=xmlhttp.responseText;
    }
  }
 
	  xmlhttp.open("GET","display_item.php?keyword="+str+"&category="+type,true);
  

  xmlhttp.send();
}

function showResult2(str,type) {
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("mainContent").innerHTML=xmlhttp.responseText;
    }
  }
 
	  xmlhttp.open("GET","display_request.php?keyword="+str,true);
  

  xmlhttp.send();
}

function checkusername(str,type) {
  if (str.length==0) { 
    document.getElementById("checkusername").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("checkusername").innerHTML=xmlhttp.responseText;
  }
  }
		
	  xmlhttp.open("GET","checkusername.php?keyword="+str,true);

  

  xmlhttp.send();
}

function display_signup(str,type) {
  if (str.length==0) { 
    document.getElementById("checkusername").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
   
	  document.getElementById("signup").innerHTML=xmlhttp.responseText;
    }
  }
	
	  xmlhttp.open("GET","display_signup.php",true);
  

  xmlhttp.send();
}

function loginfunction() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","database/login.php",true);
        xmlhttp.send();				
    }

function listitem() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","display_item.php",true);
        xmlhttp.send();				
    }
	
function itemdetails() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("map").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","display_item.php",true);
        xmlhttp.send();				
    }
	
function itemlocation() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","map.html",true);
        xmlhttp.send();				
    }	
	
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
}

function listcategory(str) {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","display_category.php?category="+str,true);
        xmlhttp.send();				
    }	
	
function normalsearch(str) {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","display_category.php?keyword="+str,true);
        xmlhttp.send();				
    }
	
function listrequest() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
            }
        };
	
        xmlhttp.open("GET","display_request.php",true);
        xmlhttp.send();				
    }	

	function requestitem(i,u) {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("requestitembtns").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","request.php?itemid="+i+"&username="+u,true);
        xmlhttp.send();				
    }	
	
	function addpost() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("userNav").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","clientPanelPost.php",true);
        xmlhttp.send();				
    }	
	function postdonationitem() {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("functionContent").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","clientPanlDonationPost.php",true);
        xmlhttp.send();				
    }	
	function navigation(str,url) {
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(str).innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET",url,true);
        xmlhttp.send();				
    }	