<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<body>
    <h1>Wedding Countdown</h1>
    <div id="countdown"></div>

    <script>
        // Function to calculate and update the countdown
        function updateCountdown() {
            // Get the wedding date from the file or database
            fetch('wedding_date.txt')
                .then(response => response.text())
                .then(weddingDate => {
                    // Calculate the time remaining
                    const weddingTime = new Date(weddingDate).getTime();
                    const currentTime = new Date().getTime();
                    const timeRemaining = weddingTime - currentTime;

                    // Calculate days, hours, minutes, and seconds
                    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                    // Display the countdown
                    document.getElementById('countdown').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                });
        }

        // Call the updateCountdown function every second
        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>
