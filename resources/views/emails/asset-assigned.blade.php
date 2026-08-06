<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('emails.asset_assigned') }}</title>
</head>
<body>

<h2>{{ __('emails.asset_assigned_successfully') }}</h2>

<p>{{ __('emails.hello') }},</p>

<p>{{ __('emails.asset_assigned_message') }}</p>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th align="left">{{ __('emails.asset_code') }}</th>
        <td>{{ $assignment->asset->asset_code }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.asset_name') }}</th>
        <td>{{ $assignment->asset->asset_name }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.assigned_to') }}</th>
        <td>{{ $assignment->user->name }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.assigned_date') }}</th>
        <td>{{ $assignment->assigned_date }}</td>
    </tr>

</table>

<br>

<p>{{ __('emails.thank_you') }}</p>

</body>
</html>
