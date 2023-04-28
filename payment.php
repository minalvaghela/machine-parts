<?php
include "db_connect.php";
?>
<form method="POST" action="https://www.sandbox.paypal.com/cgi-bin/websrc">
    <input type="hidden" namw="cmd" value="_xclick">
    <input type="hidden" name="business" value="sb-3lzb4722350876@business.example.com">
    <input type="hidden" name="item_name" value=<?php $pname ?>>
    <input type="hidden" name="amount" value=<?php $ttprice ?>>
    <input type="hidden" name="item_number" value=<?php $pname ?>>
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="lc" value="AU">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="notify_url" value="http://localhost:81//machince&parts/book_order.php">
    <input type="hidden" name="return" value="http://localhost:81//machince&parts/book_order.php">
    <button type="submit" name="pay">pay now</button>

</form>
<input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="sb-3lzb4722350876@business.example.com">
                    <input type="hidden" name="item_name" value="<?php echo $pname;?>">
                    <input type="hidden" name="item_number" value="<?php echo $qty;?>">
                   <!--- <input type="hidden" name="amount" value="5000">--->
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="lc" value="AU">
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="notify_url" value="http://localhost:81/machince&parts/show_product.php">
                    <input type="hidden" name="return" value="http://localhost:81/machince&parts/show_product.php">
                   