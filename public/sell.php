<?php

    // configuration
    require("../includes/config.php"); 
    
    // query the rows the match the SESSION id
        $rows = query("SELECT symbol, shares FROM portfo
          WHERE id = ?", $_SESSION["id"]);
    
        // make a foreach loop to add a row array
        $positions = [];
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"],
                    "totalf" => $row["shares"] * $stock["price"]               
                 ];
            }
        }
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
       foreach($positions as $position)
       {
           if ($_POST["symbol"] == $position["symbol"])
           {
       
                // add the 'totalf' amount into the cash column of talbe 'users'
                query("UPDATE users SET cash = cash + ? WHERE id = ?",
                $position["totalf"], $_SESSION["id"]);
        
                // remove the row the user is selling from table 'portfo'
                query("DELETE FROM portfo WHERE id = ? AND symbol = ?",
                $_SESSION["id"], $position["symbol"]);
                
                // add the transaction to the transactions table
                query("INSERT INTO history (id, trans, symbol, shares, price) VALUES(?, 'SELL', ?, ?, ?)", $_SESSION["id"], $position["symbol"], $position["shares"], $position["price"]);
         
               // redirect to portfolio
               redirect("/"); 
           }
         
       }  
       apologize("sorry there was a processing error, try again");   
    }
    
    // query the user's stock symbols and pass to form
    else
    {            
        // render form
        render("sell_form.php", ["title" => "Sell a Stock",
         "positions" => $positions]);
    }
?>
