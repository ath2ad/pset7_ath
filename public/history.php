<?php

    // configuration
    require("../includes/config.php"); 
    
     $rows = query("SELECT * FROM history WHERE id = ?",
      $_SESSION["id"]);
    
        // make a foreach loop to add a row array
        $transactions = [];
        foreach ($rows as $row)
        {
            $transactions[] = [
                "trans" => $row["trans"],
                "timestamp" => $row["timestamp"],
                "symbol" => $row["symbol"],
                "shares" => $row["shares"],
                "price" => $row["price"]            
             ];
        }
    
           
        // render form
        render("history.php", ["title" => "Transactions",
         "transactions" => $transactions]);
?>
