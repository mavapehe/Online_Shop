<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order Form</title>
    <link rel="stylesheet" href="styles-form.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="png_materials/logo_shortcut.png" />
</head>
<body style="background-color:#F5F5F5;">

<?php
require_once('header.php')
?>
<?php
require_once('back-button.php')
?>

<div class="form-container">
<form id="order-form" method="post" action="submit_form.php">
        <h6>Contact Information</h6>
        <div class="row">
        <label class="required"></label>
            <input type="text" placeholder="Name" id="name" name="name" required>
            <label class="required"></label>
            <input type="text" placeholder="Last Name" id="last_name" name="last_name" required>
        </div>
        <div class="row">
        <label class="required"></label>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <label class="required"></label>
            <input type="tel" placeholder="Phone Number" id="phone_number" name="phone_number" pattern="[0-9]{10}" required>
        </div>
        <h6>Delivery Details</h6>
        <div class="row">
        <label class="required"></label>
            <input type="text" placeholder="Address" id="address" name="address" required>
        </div>
        <div class="row">
        <label class="required"></label>
            <input type="text" placeholder="Country" id="country" name="country" value="Australia" readonly>
            <label class="required"></label>
            <select id="state" name="state" required>
                <option value="">Select State</option>
                <option value="New South Wales">New South Wales</option>
                <option value="Queensland">Queensland</option>
                <option value="South Australia">South Australia</option>
                <option value="Tasmania">Tasmania</option>
                <option value="Victoria">Victoria</option>
                <option value="Western Australia">Western Australia</option>
            </select>
        </div>
        <div class="row">
        <label class="required"></label>
            <select id="suburb" name="suburb" required>
                <option value="">Select Suburb</option>
            </select>
            <label class="required"></label>
            <input type="text" placeholder="Zip Code" id="zip_code" name="zip_code" pattern="[0-9]{4}" required>
        </div>
        <div class="row">
    <label class="required"></label>
    <input type="date" id="delivery_date" name="delivery_date" required>
    <label class="required"></label>
    <input type="time" id="delivery_time" name="delivery_time" required>
</div>
<p>Please note that we only deliver between 8:00 p.m. and 5:00 p.m.</p>
        <div class="row">
            <button type="submit" id="submit_button" disabled>Place Order</button>
            
        </div>
    </form>
</div>

<?php
require_once('footer.php')
?>

<!--Javascript-->
	<script>
            // Suburb dropdown based on selected state
            $('#state').on('change', function() {
                var suburbs = [];

                switch ($(this).val()) {
                    case 'New South Wales':
                        suburbs = ['Sydney', 'Newcastle', 'Wollongong'];
                        break;
                    case 'Queensland':
                        suburbs = ['Brisbane', 'Gold Coast', 'Sunshine Coast'];
                        break;
                    case 'South Australia':
                        suburbs = ['Adelaide'];
                        break;
                    case 'Tasmania':
                        suburbs = ['Hobart', 'Launceston'];
                        break;
                    case 'Victoria':
                        suburbs = ['Melbourne', 'Geelong', 'Ballarat'];
                        break;
                    case 'Western Australia':
                        suburbs = ['Perth', 'Mandurah'];
                        break;
                }

                var suburb_dropdown = $('#suburb');
                suburb_dropdown.empty();
                $.each(suburbs, function(i, suburb) {
                    suburb_dropdown.append($('<option>').text(suburb).attr('value', suburb));
                });

                // Only deliveries from 8am to 5pm
                $(document).ready(function() {
                    $('#delivery_time').attr({
                        'min': '08:00',
                        'max': '17:00',
                    });
                });

			// enable submit button if all fields are filled out
			if ($('#name').val() && $('#last_name').val() && $('#address').val() && $('#state').val() && $('#suburb').val() && $('#zip_code').val() && $('#phone_number').val() && $('#email').val()) {
                $('#submit_button').prop('disabled', false);
            } else {
                $('#submit_button').prop('disabled', true);
                }
            });

            // enable submit button if all fields are filled out
              $('input').on('input', function() {
		    if ($('#name').val() && $('#last_name').val() && $('#address').val() && $('#state').val() && $('#suburb').val() && $('#zip_code').val() && $('#phone_number').val() && $('#email').val()) {
		    	$('#submit_button').prop('disabled', false);
		    } else {
		    	$('#submit_button').prop('disabled', true);
	        	}
	        });



            // Popup
            function showConfirmationPopup() {
                const name = document.getElementById('name').value;
                const lastName = document.getElementById('last_name').value;
                const email = document.getElementById('email').value;
                const phoneNumber = document.getElementById('phone_number').value;
                const address = document.getElementById('address').value;
                const country = document.getElementById('country').value;
                const state = document.getElementById('state').value;
                const suburb = document.getElementById('suburb').value;
                const zipCode = document.getElementById('zip_code').value;
                const deliveryDate = document.getElementById('delivery_date').value;
                const deliveryTime = document.getElementById('delivery_time').value;

            const message = `Dear ${name} ${lastName},\n\n` +
                `Thank you for shopping with us! Your order has been placed and an email was sent to ${email}.\n\n` +
                `Your order will be delivered on ${deliveryDate} at ${deliveryTime} to:\n` +
                `Address: ${address}\n` +
                `Country: ${country}\n` +
                `State: ${state}\n` +
                `Suburb: ${suburb}\n` +
                `Zip Code: ${zipCode}\n\n` +
                `Phone Number: ${phoneNumber}`;


            alert(message);
         }

            document.getElementById('order-form').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission and page refresh

                if (!this.checkValidity()) {
                    return;
                }

                showConfirmationPopup();
                // Implement sending an email or processing the order here
            });
    </script>

</body>
</html>