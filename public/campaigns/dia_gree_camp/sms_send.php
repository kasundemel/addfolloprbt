<?php
$number = $_GET["number"];
$provider = $_GET["provider"];
$data = $_GET["data"];
$link = $_GET["link"];
?>
<html>
<script type="text/javascript">
    window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>

<script type="application/javascript" >

    $(document).ready(function()
    {
        <?php if($number > 0){ ?>
        window.location.href = "sms:<?php echo $number; ?>?body=<?php echo $data; ?>";
        <?php } else{?>
        window.location = "<?php echo $link; ?>";
        <?php } ?>
    });
</script>

</html>