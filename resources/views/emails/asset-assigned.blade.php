<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asset Assigned</title>
</head>
<body>

<h2>Asset Assigned Successfully</h2>

<p>Hello,</p>

<p>An asset has been assigned successfully.</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th align="left">Asset Code</th>
        <td>{{ $assignment->asset->asset_code }}</td>
    </tr>

    <tr>
        <th align="left">Asset Name</th>
        <td>{{ $assignment->asset->asset_name }}</td>
    </tr>

    <tr>
        <th align="left">Assigned To</th>
        <td>{{ $assignment->user->name }}</td>
    </tr>

    <tr>
        <th align="left">Assigned Date</th>
        <td>{{ $assignment->assigned_date }}</td>
    </tr>
</table>

<br>

<p>Thank you.</p>

</body>
</html>
