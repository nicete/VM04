<!DOCTYPE html>
<html>
<head>
    <title>Trading Strategy Test Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Add CSS styles here */
    </style>
</head>
<body>
    <header>
        <h1>Trading Strategy Test Application</h1>
    </header>
    
    <section>
        <h2>Asset Information</h2>
        <p>Starting Price: $100</p>
        <p>Current Price: <span id="currentPrice"><!-- Add PHP code to display current price --></span></p>
    </section>

    <section>
        <h2>Bot Information</h2>
        <p>Total Open Trades: <!-- Add PHP code to display total open trades --></p>
        <p>Total Open Orders: <!-- Add PHP code to display total open orders --></p>
        <!-- Add PHP code to display order details -->
    </section>

    <button id="startStopButton">Start</button>

    <section>
        <h2>Trade History</h2>
        <!-- Add PHP code to display trade history -->
    </section>

    <script>
        var isRunning = false;
        var intervalId = null;
        var interval = 1000;  // 1 second

        function getPrice() {
            $.ajax({
                url: 'get_price.php',
                success: function(data) {
                    $('#currentPrice').text(data);
                }
            });
        }

        $('#startStopButton').click(function() {
            if (isRunning) {
                // If the bot is running, stop it
                clearInterval(intervalId);
                $(this).text('Start');
            } else {
                // If the bot is not running, start it
                intervalId = setInterval(getPrice, interval);
                $(this).text('Stop');
            }
            isRunning = !isRunning;
        });
    </script>
</body>
</html>
