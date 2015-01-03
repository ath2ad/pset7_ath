<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
    <?php           
        foreach ($transactions as $transaction)
        {
            print("<tr>");
            print("<td>{$transaction["trans"]}</td>");
            print("<td>{$transaction["timestamp"]}</td>");
            print("<td>{$transaction["symbol"]}</td>");
            print("<td>{$transaction["shares"]}</td>");
            echo("<td>$". number_format($transaction["price"], 2, '.',',')."</td>");
            print("</tr>");             
        }
        ?>
    </tbody>

</table>
