<!DOCTYPE html>
<html>
<head>
    <title>Certificate Request Cancelled</title>
</head>
<body>
    <p>Dear {{ $record->user->name }},</p>
    <p>We regret to inform you that your certificate request (ID: {{ $record->id }}) has been cancelled.</p>
    <p>If you have any questions, please contact us.</p>
    <p>Thank you.</p>
</body>
</html>