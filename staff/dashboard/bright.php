
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Car Service Management System Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css"> <!-- ubah -->



<style>
#brightness{
    width:100%;
    height:120%;
    background:white;
    position:absolute;
    opacity:0;
}

#controls{
    width:400px;
    height:22px;
    padding:0 5px;
}

</style>

<script>


</script>

  </head>
  
  
  
  <body>
  


Brightness (0 - 100):<br />
  
<input type="range" id="controls" value="50" min="0" max="100" maxlength="2">

  <div id="brightness"></div>
  



 
	<script>
	

	
var brightness = document.getElementById('brightness');
    controls   = document.getElementById('controls');


controls.onkeyup = controls.onchange = function()
{
    var brightness = document.getElementById('brightness'),
        val        = parseInt(this.value) - 50;
    
    if (val > 50 || val < -50)
    return false;
    
    brightness.style.backgroundColor = val > 0 ? 'white' : 'black';
    brightness.style.opacity = Math.abs(val/100) * 2;
}



 //localStorage.setItem("brightness", document.getElementById("controls").value);
 //document.getElemetById('brightness'.style.opacity = localStorage.getItem("brightness");

</script>

   

</body>
</html>

 
	
    

