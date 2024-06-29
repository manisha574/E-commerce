<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Nearby Gyms</title>
    <style>
        /* Add your CSS here */
        #gyms {
            margin: 20px;
        }
        .gym {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .review-form {
            margin-top: 20px;
        }
        .review-form input, .review-form textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
        }
        .review-form button {
            padding: 10px 20px;
            background-color: #74b9ff;
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;
            fetchGyms(lat, lng);
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        function fetchGyms(lat, lng) {
            fetch(`fetch_gyms.php?lat=${lat}&lng=${lng}`)
                .then(response => response.json())
                .then(data => {
                    let gymsContainer = document.getElementById("gyms");
                    gymsContainer.innerHTML = "";
                    data.gyms.forEach(gym => {
                        let gymElement = document.createElement("div");
                        gymElement.className = "gym";
                        gymElement.innerHTML = `<h3>${gym.name}</h3><p>Distance: ${gym.distance.toFixed(2)} km</p>`;
                        gymsContainer.appendChild(gymElement);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        window.onload = getLocation;
    </script>
</head>
<body>
    <div id="gyms">Loading nearby gyms...</div>

    <div class="review-form">
        <h2>Submit a Review</h2>
        <form action="submit_review.php" method="POST">
            <input type="text" name="gym_name" placeholder="Gym Name" required>
            <input type="text" name="user_name" placeholder="Your Name" required>
            <textarea name="review_text" placeholder="Your Review" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    </div>
</body>
</html>
