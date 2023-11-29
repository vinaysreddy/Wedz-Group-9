<!-- user_page.php -->
<!DOCTYPE html>
<html>
<body>
   <h2>Wedding Countdown</h2>
   <div id="countdown" style="font-size: 30px;"></div>

   <script>
      function updateCountdown(weddingDate) {
         const weddingTime = new Date(weddingDate).getTime();
         const currentTime = new Date().getTime();

         if (weddingTime <= currentTime) {
            // Wedding date has passed; stop the countdown
            document.getElementById('countdown').innerHTML = "The wedding has already happened!";
         } else {
            const timeRemaining = weddingTime - currentTime;

            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            document.getElementById('countdown').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
         }
      }

      // Fetch the wedding date from the database (replace with your database retrieval code)
      fetch('get_wedding_date.php')
      .then(response => response.text())
      .then(weddingDateStr => {
          console.log("Received date from server: " + weddingDateStr); // Add this line
          const weddingDate = new Date(weddingDateStr);
          if (!isNaN(weddingDate)) {
              updateCountdown(weddingDate);
              if (weddingDate.getTime() > new Date().getTime()) {
                  setInterval(() => updateCountdown(weddingDate), 1000);
              }
          } else {
              console.error("Invalid date format or data from the server.");
          }
      });
   </script>
</body>
</html>
