<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <title>{{ __('assets.report') }}</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#111827;
            padding:30px;
        }

        .header{
            margin-bottom:25px;
            border-bottom:2px solid #111827;
            padding-bottom:15px;
        }

        .title{
            font-size:24px;
            font-weight:bold;
        }

        .subtitle{
            margin-top:5px;
            color:#6b7280;
            font-size:12px;
        }

        .date{
            float:right;
            font-size:12px;
            color:#6b7280;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        thead{
            background:#f3f4f6;
        }

        th{
            border:1px solid #d1d5db;
            padding:10px;
            text-align:left;
            font-size:12px;
        }

        td{
            border:1px solid #d1d5db;
            padding:10px;
        }

        tbody tr:nth-child(even){
            background:#f9fafb;
        }

        .footer{
            margin-top:25px;
            text-align:center;
            font-size:11px;
            color:#6b7280;
        }

    </style>

</head>

<body>

<div class="header">

    <div class="date">
        {{ now()->format('d M Y') }}
    </div>

    <div class="title">
        {{ __('assets.system') }}
    </div>

    <div class="subtitle">
        {{ __('assets.report') }}
    </div>

</div>

<table>

    <thead>

    <tr>

        <th style="width:12%;">{{ __('assets.code') }}</th>
        <th style="width:28%;">{{ __('assets.name') }}</th>
        <th style="width:20%;">{{ __('assets.category') }}</th>
        <th style="width:20%;">{{ __('assets.supplier') }}</th>
        <th style="width:20%;">{{ __('assets.status') }}</th>

    </tr>

    </thead>

    <tbody>

    @forelse($assets as $asset)

    <tr>

        <td>{{ $asset->asset_code }}</td>

        <td>{{ $asset->asset_name }}</td>

        <td>{{ $asset->category?->category_name ?? '-' }}</td>

        <td>{{ $asset->supplier?->company_name ?? '-' }}</td>

        <td>{{ __('assets.' . strtolower($asset->status)) }}</td>

    </tr>

    @empty

    <tr>

        <td colspan="5" style="text-align:center;">
            {{ __('assets.no_assets') }}
        </td>

    </tr>

    @endforelse

    </tbody>

</table>

<div class="footer">

    {{ __('assets.generated_by') }}

</div>

</body>

</html>
