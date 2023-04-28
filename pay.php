<?php
include 'db_connect.php';
?>
<?php 
$pname=$_GET['name'];
//echo $pname;
$tamount=$_GET['ttmount'];
$qty=$_GET['qty'];
?>
                 <form action="https://www.sandbox.paypal.com/cgi-bin/websrc" method="POST" accept-charset="utf-8">
              
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="sb-3lzb4722350876@business.example.com">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="iteam_name" value="<? echo $pname; ?>">
                    <!--<input type="hidden" name="amount" value="<? echo $tamount; ?>">-->
                    <input type="hidden" name="iteam_number" value="<? echo $qty;?>">
                    <input type="hidden" name="lc" value="UA">
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="notify_url" value="http://localhost:81/machince&parts/show_product.php">
                    <input type="hidden" name="return" value="http://localhost:81/machince&parts/show_product.php">
                    <input type="submit" name="btn" value="pay now">
</form>
                   
