<?php

    // configuration
    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        
        // look up stock
        $stock = lookup($_POST["symbol"]);
        
        // is the stock valid?
        if ($stock === false)
        {
            apologize("stock symbol is not valid");
        }
        else
        {
           $formprice = number_format ($stock["price"], 2, '.', '');
           render("quote.php",["sname" => "$stock[name]", "sprice" => "$formprice",
           "title" => "Quote"]);
        }
        
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Get a Quote"]);
    }
?>
