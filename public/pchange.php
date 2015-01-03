<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         // validate submission
        if (empty($_POST["password"]))
        {
            apologize("You must provide a password update.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("password does not match confirmation");
        }
        
        // update the password
        query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["password"]), $_SESSION["id"]);
   
        // redirect to index.php
        redirect("index.php");
    }
    else
    {
        // else render form
        render("pchange_form.php", ["title" => "Settings"]);
    }

?>
