<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="pchange.php">Settings</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>

<table class="table table-striped">
   
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Total</th>
        </tr>    
    </thead>    
    <tbody>
        <?php           
            foreach ($positions as $position)
            {
                print("<tr>");
                print("<td>{$position["symbol"]}</td>");
                print("<td>{$position["name"]}</td>");
                print("<td>{$position["shares"]}</td>");
                echo("<td>$". number_format($position["price"], 2, '.', ',')."</td>");
                echo("<td>$". number_format($position["totalf"], 2, '.',',')."</td>");
                print("</tr>");             
            }
            print("<tr>");                
            print("<td colspan=4><strong>CASH</strong></td>");
            echo("<td>$". number_format($users, 2, '.',',')."</td>");                 
            print("</tr>");
        ?>
    </tbody>
    
</table>
