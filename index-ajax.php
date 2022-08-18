<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>


        
<script type="text/javascript">
        $(document).ready(function() {
          $("#button").click(function(button) {
              $.get("ajax.php", {
               open:$("#user").val() }, function(open) {
                       $("#show").html(open);
                      }                 
                    );          
                }); 
            });
        </script>
        
    </head>
    <body>
        <input type="text" id="user" name="user" value="">
        <br>
        <button type="button" name="button" id="button" value="GET">get</button>
        <div id="show"></div>
        
        <?php
        $file = file_get_contents('user_db.json');
        $data = json_decode($file);
        echo "<p>ข้อมูลผู้ใช้ทั้งหมด</p>";
        for ($i=0; $i<count($data); $i++) {
        echo $data[$i]->username . "<br>";
        }
        
        ?>
        
        
        
        
        
    </body>
</html>