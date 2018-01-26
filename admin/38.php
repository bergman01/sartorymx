<?php
session_start();
$sesion = $_SESSION['admin_user'];
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    function changeColor(){
        value = 1;
        var dataString = 1;

        $.ajax({
            type: "POST",
            url: "sesion.php",
            data: dataString,
            success: function(data) {
               //$('#value').text(data); 
                //location.href ="index.php"; 
                    location.reload();
                    
            }
        });
    }

    setInterval(changeColor, 5000);
});
</script>
hola
<span id="value">0</span>
<?php echo $_SESSION["ultimoAcceso"];?><br/>
<?php echo $_SESSION["admin_user"];?><br/>
<input type="hidden" id="value1" name="value1" value="<?php echo $sesion;?>">
