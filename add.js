paypal.Buttons({
  createOrder: function(data, actions){
    
    
    console.log('Data: ' + data);
    console.log('Actions: ' + actions);
    
    return actions.order.create({
      purchase_units: [{
        amount: {
          value:'200',

        }
      }]

    })
  },
  onApprove: function(data, actions) {
console.log('Data: ' + data);
    console.log('Actions: ' + actions);
    return actions.order.capture().then(function(details) {
      alert('Transaction completed by'+ details.payer.name.given_name);
    });
    
  }

    
}).render(
  '#paypal-button-container',
);