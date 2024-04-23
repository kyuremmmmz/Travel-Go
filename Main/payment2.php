<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .choice{
             background-color: antiquewhite;
             display: flex;
             
 
        }

          /* Custom CSS to decrease the width of form elements */
    #data_5_0,
    #data_6 {
        max-width: 250px; /* Adjust the width as needed */
    }   
    </style>
</head>
<body class="row d-flex justify-content-center">
<?php 
// Include configuration file 
include_once 'config.php'; 
 
// Include database connection file 
include_once 'dbConnect.php'; 
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 choice">
            <form action="<?php echo PAYPAL_URL; ?>" class="" method="post" id="paypal_form" onSubmit="return validateForm();" style="max-width: 300px;">
                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
                
                <div style="max-width: 400px;"></div>
                <div style="padding-bottom: 18px;">
                    Donation Amount<span style="color: red;"> *</span><br/>
                    <span><input type="number" id="data_5_0" name="amount" value="<?php $img = $_GET['choice']; echo ($img);?>"/></span><br/>
                </div>
                <div style="padding-bottom: 18px;">Comment<br/>
                    <textarea id="data_6" name="comment" style="max-width: 550px;" rows="3" class="form-control"></textarea>
                </div>
                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">
                <!-- Specify URLs -->
                <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                <div style="padding-bottom: 18px;"><input name="skip_Submit" value="Submit" type="submit"/></div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateForm() {
        if (!document.getElementById('data_5_0').value) {
            alert('Donation Amount is required!');
            return false;
        }
        submitData();
        return true;
    }
    function submitData() {
        var formData = $('#paypal_form').serialize();
        $.ajax({
            url: "insertData.php",
            type: "POST",
            data: formData,
            success: function(response) {
                console.log(response); // Log the response for debugging
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log any errors
            }
        });
    }
</script>

</body>
</html> 
