<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your payment</title>
  </head>
  <body>
    <div id="paypal-button-container"></div>
    <p id="result-message"></p>
    <!-- Replace the "test" client-id value with your client-id -->

    <div id="paypal-button-container"></div>
   
     <!-- PayPal SDK Script -->
     <script src="https://www.paypal.com/sdk/js?client-id=AXhUv-yDdR_jwAUx76BMOQ_lRBTTiJeV6o99AyNdJbE2ntg-3OYUl8ddgL8JP1wIkJH92GveA-g7zsQ_&currency=USD"></script>
    <script>
        // Render PayPal Buttons
        paypal.Buttons({
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '500000000000' // Set the amount here
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Call your server to save the transaction
                    return fetch('/api/orders/' + data.orderID + '/capture', {
                        method: 'POST'
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>

    
  </body>
</html>
