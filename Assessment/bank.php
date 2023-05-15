
<?php
$customers = array();
function displayMenu()
{
    echo "==============================\n";
    echo "  Bank Management Console";
    echo "==============================\n";
    echo "1. Banker\n";
    echo "2. Customer \n";
    echo "3. Exit\n";
     $x = readline("Select your role \r\n");

     if($x == 1)
     {
        Banker();
     }
     if($x == 2)
     {
        customermenu();
     }
     if($x == 3)
     {
        echo "Thank you for using the Bank Management Console. Goodbye!\n";
        exit();
     }

}
 function Banker(){   
        print("Welcome to Banker's app \n");
        print("Operation menu \n");
        print("1.Add customer \n"); 
        print("2.view cumtomer \n");
        print("3.search cumtomer \n");
        print("4.view all customer \n");
        print("5.Total amount in bank \n");
        print("6.Exit \n");
        
    }

function addCustomer()
{
    global $customers;

    echo "Enter Account number: ";
    $customerno = readline();
    echo "Enter Customer Name: ";
    $customerName = readline();
    echo "Enter opening Balance: ";
    $customerBalance = readline();

    $customer = array(
        'account_number' => $customerno,
        'customer_name' => $customerName,
        'opening_balance' => $customerBalance
    );

    $customers[] = $customer;

    echo "Customer added successfully!\n";
}
function viewCustomerDetails()
{
    global $customers;
    $found = false;

    foreach ($customers as $customer) {
        
            echo "Account number: " . $customer['account_number'] . "\n";
            echo "Customer name: " . $customer['customer_name'] . "\n";
            echo "Opening Balance: " . $customer['opening_balance'] . "\n";
            $found = true;
            break;
        }
    }

function viewallcustomer(){
           
    $customer = array(
        array(

        'account_number' => 1,
        'customer_name' => "parth",
        'opening_balance' => 15000
        ),
        array(
        'account_number' => 2,
        'customer_name' => "Viany",
        'opening_balance' => 10000

        ),
        array(
        'account_number' => 3,
        'customer_name' => "Tushar",
        'opening_balance' => 5000
        ),

        array(
        'account_number' => 4,
        'customer_name' => "Parmar",
        'opening_balance' => 45000
      )

    );
                foreach ($customer as $key1 => $value1) {
                
                    foreach ($value1 as $key2 => $value2) {
                        echo "\t" . $key2 . " = " . $value2 . "\n";
                    }
                    echo "\n";
                }
               
            
        }

function searchcustomer()
{ 
    $customer = array(
        array(

        'account_number' => 1,
        'customer_name' => "parth",
        'opening_balance' => 15000
        ),
        array(
        'account_number' => 2,
        'customer_name' => "Viany",
        'opening_balance' => 10000

        ),
        array(
        'account_number' => 3,
        'customer_name' => "Tushar",
        'opening_balance' => 5000
        ),

        array(
        'account_number' => 4,
        'customer_name' => "Parmar",
        'opening_balance' => 45000
      )

    );  
    
    $searchValue = readline("enter Account number to view");
        foreach($customer as $item){
            foreach ($item as $k => $v){
                if ($k == $searchValue || $v == $searchValue){
                    echo "Matching data found:\n";
                    echo "account_number: " . $item['account_number'] . "\n";
                    echo "customer_name: " . $item['customer_name'] . "\n";
                    echo "opening_balance: " . $item['opening_balance'] . "\n";
                    break 2;
                }
            }

        }
    
        
        }

function customermenu()
{
    print("     withdraw Amount      \n");
    print("     Deposite Amount      \n");
    print("     view balance      \n");
}
function totalAmt() {

    $customer = array(
        array("opening_balance" => 15000),
        array("opening_balance" => 10000),
        array("opening_balance" => 5000),
        array("opening_balance" => 45000)
    );
    $totalAmt = array_reduce($customer, function ($total, $m) {
        return $total + $m['opening_balance'];
    }, 0);
    echo "Total amount available in Bank : ".$totalAmt.PHP_EOL;
    echo PHP_EOL;
    echo "Press any key to go back to bank menu".PHP_EOL;
    $addcus = readline("Press any key to go back to bank menu");
    if ($addcus == "y") {
        displayMenu();
    }
}

 while (true) {
    displayMenu();
    
 $choice = readline("Select options...");
     if ($choice == 1) {
            
         addCustomer();
     }elseif ($choice == 2) {
         viewCustomerDetails();
     }elseif ($choice == 3) {
            searchcustomer();
            // $searched_customer = searchcustomer($find, $customers);
    }elseif ($choice == 4) {
             viewallcustomer();
     }elseif ($choice == 5) {
        totalAmt();
     } elseif ($choice == 6) {
          echo "Thank you for using the Bank Management Console. Goodbye!\n";
          break;
     } else {
         echo "Invalid choice. Please try again.\n";
   }
 }

?>