<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body class="row d-flex justify-content-center">
<?php 
// Include configuration file 
include_once 'config.php'; 
 
// Include database connection file 
include_once 'dbConnect.php'; 
?>
<div class="col-md-6">
        <form action="<?php echo PAYPAL_URL; ?>" method="post" id="paypal_form" onSubmit="return validateForm();">
            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
            
            <div style="max-width: 400px;">
            </div>
            <div style="padding-bottom: 18px;font-size : 24px;">Donation</div>
            <div style="display: flex; padding-bottom: 18px;max-width : 550px;">
                <div style=" margin-left: 0; margin-right: 1%; width: 49%;">Name<span style="color: red;"> *</span><br/>
                    <input type="text" id="name" name="name" style="max-width: 100%;" class="form-control" required/>
                </div>
            </div>
            <div style="padding-bottom: 18px;">Phone<span style="color: red;"> *</span><br/>
                <input type="text" name="phone" style="max-width : 550px;" class="form-control" required/>
            </div>
            <div style="padding-bottom: 18px;">Email<span style="color: red;"> *</span><br/>
                <input type="text" id="email" name="email" style="max-width : 550px;" required class="form-control"/>
            </div>
            <div style="padding-bottom: 18px;">Donation Amount<span style="color: red;"> *</span><br/>
                <span><input type="radio" id="data_5_0" name="amount" value="50"/> $50</span><br/>
                <span><input type="radio" id="data_5_1" name="amount" value="100"/> $100</span><br/>
                <span><input type="radio" id="data_5_2" name="amount" value="250"/> $250</span><br/>
                <span><input type="radio" id="data_5_3" name="amount" value="500"/> $500</span><br/>
            </div>
            <div style="padding-bottom: 18px;">Comment<br/>
                <textarea id="data_6" false name="comment" style="max-width : 550px;" rows="3" class="form-control"></textarea>
            </div>
            <!-- Specify a Buy Now button. -->
            <input type="hidden" name="cmd" value="_xclick">
            <!-- Specify URLs -->
            <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
            <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

            <div style="padding-bottom: 18px;"><input name="skip_Submit" value="Submit" type="submit"/></div>

        </form>
    </div>

        <script type="text/javascript">
            function validateForm() {
                if (!validateEmail(document.getElementById('email').value.trim())) {
                    alert('Email must be a valid email address!');
                    return false;
                }
                if (!document.getElementById('data_5_0').checked && !document.getElementById('data_5_1').checked && !document.getElementById('data_5_2').checked && !document.getElementById('data_5_3').checked ) {
                    alert('Donation Amount is required!');
                    return false;
                }
                submitData();
                return true;
            }
            function isEmpty(str) { return (str.length === 0 || !str.trim()); }
            function validateEmail(email) {
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
                return isEmpty(email) || re.test(email);
            }
            function submitData()
            {
                var formData = $('#paypal_form').serialize();
                $.ajax({
                    url:"insertData.php",
                    type:"POST",
                    data:formData
                });
            }
        </script>

</body>
</html>