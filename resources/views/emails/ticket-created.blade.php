<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('emails.new_support_ticket') }}</title>
</head>
<body>

<h2>{{ __('emails.new_support_ticket_created') }}</h2>

<p>{{ __('emails.hello') }},</p>

<p>{{ __('emails.new_support_ticket_message') }}</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th align="left">{{ __('emails.title') }}</th>
        <td>{{ $ticket->title }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.asset') }}</th>
        <td>{{ $ticket->asset->asset_name }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.reported_by') }}</th>
        <td>{{ $ticket->user->name }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.priority') }}</th>
        <td>{{ $ticket->priority }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.status') }}</th>
        <td>{{ $ticket->status }}</td>
    </tr>

    <tr>
        <th align="left">{{ __('emails.description') }}</th>
        <td>{{ $ticket->description }}</td>
    </tr>
</table>

<br>

<p>{{ __('emails.thank_you') }}</p>

</body>
</html>
