<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta http-equiv="refresh" content="5" >
	<style>
table, td, th {
    border: 1px solid #444;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    padding: 15px;
}
</style>

</head>
<body>

<p id=day></p>

<p>WINLAB</p>


<div id="container"></div>


<br>




<?php 
#$Refresh = 1000;
$a = array();
$b = array();
$file = fopen("f.txt","r");

#while(! feof($file))
  {
    $var = fgets($file);
    $var1 = explode(';',$var);
    
    $length=count($var1);

  for($i=0;$i<$length;$i++)
    {
      if($i%2==0)
      {
        array_push($a, $var1[$i]);
      }
      else
        array_push($b, $var1[$i]);

    }
  }

fclose($file);

#echo json_encode($a);
#echo json_encode($b);
?>




<script type="text/javascript">


var myFunction = function(){
    var jArray= <?php echo json_encode($a); ?>;
    var timeArray= <?php echo json_encode($b); ?>;



var table = document.createElement('table'), tr, td, row, cell;

 tr = document.createElement('tr');
for (cell = 0; cell < 4; cell++) 
    {
        td = document.createElement('td');
        tr.appendChild(td);
        
        if(cell==0)
        {
        td.innerHTML = "Name";
        }

      else if (cell==1) 
      {
        td.innerHTML = "Image";
      }

        
        else if (cell==2) 
      {
        
        td.innerHTML="Authorization";
      }

        else if (cell==3) 
      {
        td.innerHTML= "Time Stamp";
      }
    }
    table.appendChild(tr);




for (row = 0; row < jArray.length ; row++) 
{


    tr = document.createElement('tr');

    for (cell = 0; cell < 4; cell++) 
    {
        td = document.createElement('td');
        tr.appendChild(td);
        
        if(cell==0)
        {
        td.innerHTML = jArray[row];
        }

    	else if (cell==1) 
    	{
    		var xy = jArray[row];
        var xyz = jArray[row]+'.jpg';

    		td.innerHTML="<img id="+xy+" name = "+xy+" src="+xyz+" height = '80' onclick='ajaxcall(this.id)' alt='hello'/>";
         
      

      	}
      	else if (cell==2) 
    	{
    		var xyz = jArray[row]+'.jpg';
    		td.innerHTML="Authorized";
      	}

      	else if (cell==3) 
    	{
    		td.innerHTML= timeArray[row];
      	}
    }
    table.appendChild(tr);

document.getElementById('container').appendChild(table);
}
}

var timer = setTimeout(myFunction, 1000);
 </script>


<script>
function ajaxcall(x) {
    
     
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("container").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "dbconn.php?q="+x, true);
        xmlhttp.send();
    }

</script>


<script>

function myDeleteFunction() {
    document.getElementById("myTable").deleteRow(0);
}
</script>

</body>
</html>