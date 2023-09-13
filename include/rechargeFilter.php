<?php
include "database_connect.php";




if (isset($_POST["rechargeFilter"])) {
     $fromDate = $_POST["fromDate"];
     $toDate = $_POST["toDate"];


    if ($result=$con->query("SELECT * FROM customers INNER JOIN customer_recharge ON customers.id=customer_recharge.customer_id WHERE 'date' BETWEEN '$fromDate' AND '$toDate' ")) {
            while ($rows=$result->fetch_array()) {
            
            echo '
              <tr>
                 <td>'.$rows['customer_name'].'</td>
                 <td>'.$rows['month'].'</td>
                 <td>'.$rows['recharge_until'].'</td>
                 <td>'.$rows['amount'].'</td>
                 </tr>
            ';
        }
        
    }
    
}