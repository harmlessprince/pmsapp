<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

<div
    style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

    <h2>Contact Us</h2>

    <p>Hello Admin,</p>

    <p>You have received a new message from the contact form:</p>

    <ul>
        <li><strong>First Name:</strong> <?php echo e($first_name); ?></li>
        <li><strong>Last Name:</strong> <?php echo e($last_name); ?></li>
        <li><strong>Email:</strong> <?php echo e($email); ?></li>
        <li><strong>Email:</strong> <?php echo e($phone_number); ?></li>
        <li><strong>Message:</strong> <?php echo e($messageBody); ?></li>
    </ul>

    <p>Please respond to this inquiry as soon as possible.</p>

    <p>Thank you,</p>
    <p><?php echo e(config('app.name')); ?></p>
</div>

</body>
</html>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/emails/contact_us.blade.php ENDPATH**/ ?>