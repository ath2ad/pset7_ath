<?php

    // configuration
    require("../includes/config.php"); 
    
    // query the rows the match the SESSION id
    $rows = query("SELECT symbol, shares FROM portfo
      WHERE id = ?", $_SESSION["id"]);
    
    // make a foreach loop to add row info to the users position varialbe
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
  
    // query total amount of cash for the user
    $guy = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    $users = $guy[0]["cash"];

    // render portfolio
    render("portfolio.php", ["positions" => $positions,
     "title" => "Portfolio", "users" => $users]);

?>
