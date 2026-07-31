<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Support Ticket</title>
</head>
<body>

<h2>New Support Ticket Created</h2>

<p>Hello,</p>

<p>A new support ticket has been created.</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th align="left">Title</th>
        <td>{{ $ticket->title }}</td>
    </tr>

    <tr>
        <th align="left">Asset</th>
        <td>{{ $ticket->asset->asset_name }}</td>
    </tr>

    <tr>
        <th align="left">Reported By</th>
        <td>{{ $ticket->user->name }}</td>
    </tr>

    <tr>
        <th align="left">Priority</th>
        <td>{{ $ticket->priority }}</td>
    </tr>

    <tr>
        <th align="left">Status</th>
        <td>{{ $ticket->status }}</td>
    </tr>

    <tr>
        <th align="left">Description</th>
        <td>{{ $ticket->description }}</td>
    </tr>
</table>

<br>

<p>Thank you.</p>

</body>
</html>
