<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide an email address");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("password does not match confirmation");
        }
        
        // query database for user
        if (query("SELECT * FROM users WHERE email = ?", $_POST["email"]) != FALSE)
        {
            apologize("That email is already taken; try another");
        }
        
        // Add user or apologize if name already taken
        if (query("INSERT INTO users (username, hash, cash, email) VALUES(?, ?, 10000.00, ?)", 
        $_POST["username"], crypt($_POST["password"]), $_POST["email"]) === FALSE)
        {
            apologize("That username is already taken; try another");
        }
        
        // log-in new user by remembring id in $_SESSION
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $_SESSION["id"] = $rows[0]["id"];
        
        // redirect to index.php
        redirect("index.php");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
