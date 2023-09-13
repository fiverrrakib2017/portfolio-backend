<?php 
include 'database_connect.php';
include 'security_token.php';



if (isset($_POST['studentFilter'])) {
	$to_date=$_POST['to_date'];
	$from_date=$_POST['from_date'];

    //total customer
	$sql="SELECT * FROM customers  WHERE   date BETWEEN '$from_date' AND '$to_date' ";
	$allCustomer=$con->query($sql);
	 $totalCustomer=$allCustomer->num_rows;

	//customer paid
	$allAmount=$con->query("SELECT SUM(paid) as customerPaid FROM customers  WHERE   date BETWEEN '$from_date' AND '$to_date'");
	while ($rows=$allAmount->fetch_array()) {
	      $customerPaid= $rows['customerPaid'];
	     
	}
    //customer recharge amount
    if ($allAmount=$con->query("SELECT SUM(amount) as rechargeAmount FROM customer_recharge")) {
        while ($rows=$allAmount->fetch_array()) {
        $customerRechargePaid= $rows['rechargeAmount'];
            
        }
    }
    //customer total Due script
    $allDueAmount=$con->query("SELECT SUM(due) as totalDue FROM customers  WHERE   date BETWEEN '$from_date' AND '$to_date'");
	while ($rows=$allDueAmount->fetch_array()) {
	      $totalDue= $rows['totalDue'];
	     
	}
    //total expire customer
    if ($expire=$con->query("SELECT * FROM `customers` WHERE date BETWEEN '$from_date' AND '$to_date'AND `expire_date` <NOW()")) {
        $total_expire_customer=  $expire->num_rows;
     }

    //total expense script
     $allExpense=$con->query("SELECT SUM(amount) as totalExp FROM expense WHERE date BETWEEN '$from_date' AND '$to_date'  ");
     while ($expenseRows=$allExpense->fetch_array()) {
         $totalExpense=$expenseRows['totalExp'];
     }
     //total withdraw script
     $allWithdraw=$con->query("SELECT SUM(amount) as totalwithdraw FROM withdraw WHERE date BETWEEN '$from_date' AND '$to_date' ");
     while ($rows=$allWithdraw->fetch_array()) {
         $totalWithdraw=$rows['totalwithdraw'];
     }
     //calculation in net profit
     $totalSpend=$totalExpense+$totalWithdraw;
     $getAmountFromCustomer=($customerPaid+$customerRechargePaid);
     $netIncome=number_format($getAmountFromCustomer-$totalSpend);


	echo '
    
    <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-body">
                                        <div class="mini-stat">
                                            <span class="mini-stat-icon bg-purple me-0 float-end"><i class=" fas fa-users"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-teal" id="activeStd">
                                                    '.$totalCustomer.'
                                                </span>
                                                Total Active Customer
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--End col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-body">
                                        <div class="mini-stat">
                                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="fas fa-user"></i></span>
                                            <div class="mini-stat-info text-danger">
                                                <span class="counter text-danger" id="totalBatch">
                                                   '.$total_expire_customer.'
                                                </span>
                                                Total Expired Customer
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- End col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mini-stat">
                                        <span class="mini-stat-icon bg-teal me-0 float-end"><i class=" fas fa-dollar-sign"></i></span>
                                        <div class="mini-stat-info">
                                            <span class="counter text-teal" id="totalDue">
                                                '.$totalDue.'
                                            </span>
                                            Total Due
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mini-stat">
                                        <span class="mini-stat-icon bg-teal me-0 float-end"><i class=" fas fa-donate"></i></span>
                                        <div class="mini-stat-info">
                                            <span class="counter text-teal" id="customerPaid">
                                                '.$customerPaid.'
                                            </span>
                                            Customer Paid 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-body">
                                        <div class="mini-stat">
                                            <span class="mini-stat-icon bg-purple me-0 float-end"><i class="  fas fa-donate"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-teal" id="totalExp">
                                                    '.$totalExpense.'
                                                </span>
                                                Total Expense
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--End col -->
                        <div class="col-md-6 col-xl-3">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mini-stat">
                                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class=" fas fa-donate"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-teal" id="totalWithdraw">
                                                    '.$totalWithdraw.'
                                                </span>
                                                Total Withdraw
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> <!-- End col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mini-stat">
                                        <span class="mini-stat-icon bg-brown me-0 float-end"><i class=" fas fa-donate"></i></span>
                                        <div class="mini-stat-info">
                                            <span class="counter text-teal" id="customer_recharge">
                                                '.$customerRechargePaid.'         
                                            </span>
                                            Total Customer Recharge
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mini-stat">
                                        <span class="mini-stat-icon bg-brown me-0 float-end"><i class=" fas fa-dollar-sign"></i></span>
                                        <div class="mini-stat-info">
                                            <span class="counter text-primary" id="netProfit">
                                                '.$netIncome.'
                                            </span>
                                            Net Profit
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End col -->
    
    
    ';


}



