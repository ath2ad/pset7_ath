<?php

// configuration
require("../includes/config.php"); 

// if a post has been made do this
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 

    // Make sure user is buying whole shares of stock
    if (true != preg_match("/^\d+$/", $_POST["shares"]))
    {
        apologize("sorry you can not buy fractions of stocks");
    }
    
    // make sure the "symbol" is in all caps before adding with query
    $validsym = strtoupper($_POST["symbol"]);

    // make sure the user has enough money for the buy
    $stock = lookup($validsym);
    $buybones = $stock["price"] * $_POST["shares"];
    $bones = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    if ($bones === false)
    {
        apologize("query is returing false for some reason");
    }
    else if ($bones[0]["cash"] < $buybones) 
    {          
        // if not apologize
        apologize("sorry not enough money");  
    }

    // add buy with query
    query("INSERT INTO portfo (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + ?", $_SESSION["id"], $validsym, $_POST["shares"], $_POST["shares"]);
     
    // deduct amount from cash total
    query("UPDATE users SET cash = cash - ? WHERE id = ?",
            $buybones, $_SESSION["id"]);  
            
    // add the transaction to the transactions table
    query("INSERT INTO history (id, trans, symbol, shares, price) VALUES(?, 'BUY', ?, ?, ?)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);        
            
    // redirect to portfolio
    redirect("/");         
}    
// if a post has not been made, then render buy_for
else
{
    // render form
    render("buy_form.php", ["title" => "Buy a Stock"]);
}

?>
