<?php
include "db_connect.php";
$sid=$_GET['proid'];
?>
<html>
    <head>
        <style>
            .invoice_body{
                height:auto;
                width:50%;
                border:1px solid black;
            }
            .customer_Details{

                width:auto;
                border:1px solid black;
                float:right;
                font-size:20px;
                padding:5px;
                margin:10px;  
            } 
            .details_table{
                height:auto;
                width:auto;
                margin:15px;
                margin-top:200px;
                padding:10px;
                border:1px solid black;
            }
            th{
                font-size:20px;
                text-align:center;
            }
            td{
                text-align:center;
            }
            table,th,td{
                border:1px solid black;
                padding:10px;
            }
            table{
                border-collapse:collapse;
                width:100%;
            }
            .total{
                text-align:right;
                font-size:20px;
                font-weight:bold;
                margin-right:50px;
            }
            .heading{
                text-align:center;
            }
            .invoice{
                text-align:center;
            }
            .date{
                font-size:20px;
                padding-left:10px;
                margin-top:20px;
                text-align:right; 
            } 
           .no{
                
                margin:10px; 
                width:auto;
                height:auto;
            } 
            .incus{
                border:1px solid black;
                height:auto;
                margin:10px;
            }
        </style>
        <script>
  function printDiv() {
    // Get the div element to be printed
    var printContents = document.getElementById("printThis").innerHTML;
    // Create a new window for printing
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
    </script>
    </head>
            <body>
                <div class="invoice_body" id="printThis">
                    <div class="invoice">
                        <h1>INVOICE</h1>
                    </div>
                    <div class="heading">
                    <img src="logo.png" style="height: 100px;width: 120px;margin-left:0%">
                        <h2>SURYA Engineering</h2>
                       
                      
                    </div>
                   
                        <div class="no">
                            <p class="date"><b>Invoice No.:</b>&nbsp;<?php echo $sid; ?></p>
                            <?php $q="select date from sales_order where sales_order_id='$sid'";
                            $qres=mysqli_query($conn,$q);
                            $qrow=mysqli_fetch_array($qres);
                            ?>
                            <p class="date"><b>Invoice Date:</b>&nbsp;<?php echo $qrow[0]; ?></p>
                            <div class="customer_details">
                            <?php
                                $uid=$_GET['uid'];
                                $sql1="select * from user_details where user_id='$uid'";
                                $res1=mysqli_query($conn,$sql1);
                                $row1=mysqli_fetch_array($res1);
                                echo "TO.<br><br>";
                                echo $row1[1]."<br>";
                                echo $row1[3]."<br>";
                                echo $row1[4]."<br>";
                            ?>
                        </div>
                        </div>
                        
                    
                    <div class="details_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>qty</th>
                                    <th>price</th>
                                    <th>amount</th>
                                </tr>
                            </thead>
                            <?php
                             
                            $sql2="select * from sales_order where user_id='$uid'";
                            $res2=mysqli_query($conn,$sql2);
                            $total = 0;
                            while($row2=mysqli_fetch_array($res2))
                            {
                                $saleid=$row2['sales_order_id'];
                                $sql3="select * from sales_order_detail where sales_order_sales_order_id='$saleid'" ;
                                $res3=mysqli_query($conn,$sql3);
                                while($row3=mysqli_fetch_array($res3))
                                {
                                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row3['product_product_id'];?></td>
                                    <?php
                                    $pid=$row3['product_product_id'];
                                    $sql4="select * from product where product_id='$pid'";
                                    $res4=mysqli_query($conn,$sql4);
                                    while ($row4 = mysqli_fetch_array($res4)) 
                                    {
                                        $a = $row4['price'] * $row3['qty'];
                                       
                                        $total = $total + $a;
                                                                           
                                    
                                    ?>
                            
                                    <td><?php echo $row4['product_name'];?></td>
                                    <td><?php echo $row3['qty'];?></td>
                                    <td><?php echo $row4['price'];?></td>
                                    <td><?php echo $a;?></td>
                                </tr>
                            </tbody>
                            <?php
                                    }
                                }

                            }
                            
                        
                            ?>
                            
                        </table>
                        <p class="total">total amount:&nbsp;&nbsp; <?php echo $total;?> </p>

                    </div>

                </div>
            </body>
            <button onclick="printDiv()">Print</button>
</html>