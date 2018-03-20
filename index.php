<?php

$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "db");

?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css">
<form action="" method="POST" >
   <div class="container"> 
       <h1>Choose your Desired Country</h1>
    <table>
        <div class="dropdown">
        <tr>
            <td class="text">
                Select Country: 
            </td>
            <td>
                <select id="countrydd" onchange="change_country()" >
                    <option>
                        Select
                    </option>
                    
                    <?php
                        $sql = mysqli_query($connect, "SELECT * FROM countries");
                        while ($row = mysqli_fetch_array($sql)) 
                                {
                            
                        
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                    <?php 
                    }
                    ?>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td class="text">
                Select State: 
            </td>
            <td>
                <div id="state">
                    <select class="stat"
                    <option>
                        Select
                    </option>
                </div>    
             </td>
         </tr>
         
                 <tr>
            <td class="text">
                Select City: 
            </td>
            <td>
                <div id="cities">
                <select>
                    <option>
                        Select
                    </option>
                </div>    
             </td>
         </tr>
        </div>
        
    </table>
   </div>
</form>
<script type="text/javascript">
    function change_country()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","ajax.php?country="+document.getElementById("countrydd").value,false);
        xmlhttp.send(null);
        document.getElementById("state").innerHTML= xmlhttp.responseText;
        
        if(document.getElementById("countrydd").value == "Select")
        {
            document.getElementById("state").innerHTML="<select><option>Select</option></select>";
        }
        
        if(document.getElementById("countrydd").value == "Select")
        {
            document.getElementById("cities").innerHTML="<select><option>Select</option></select>";
        }
    }
    
    function change_state()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","ajax.php?state="+document.getElementById("statedd").value,false);
        xmlhttp.send(null);
        document.getElementById("cities").innerHTML= xmlhttp.responseText;
       
        if(document.getElementById("statedd").value == "Select")
        {
            document.getElementById("cities").innerHTML="<select><option>Select</option></select>";
        }
    }

</script>
    