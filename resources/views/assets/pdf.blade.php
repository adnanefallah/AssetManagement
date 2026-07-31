<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Assets Report</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th{
            background:#e5e7eb;
            padding:8px;
        }

        td{
            padding:8px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

    </style>

</head>

<body>

<h2>Assets Report</h2>

<table>

    <thead>

    <tr>

        <th>Code</th>
        <th>Name</th>
        <th>Category</th>
        <th>Supplier</th>
        <th>Status</th>

    </tr>

    </thead>

    <tbody>

    @foreach($assets as $asset)

    <tr>

        <td>{{ $asset->asset_code }}</td>

        <td>{{ $asset->asset_name }}</td>

        <td>{{ $asset->category?->category_name }}</td>

        <td>{{ $asset->supplier?->company_name }}</td>

        <td>{{ $asset->status }}</td>

    </tr>

    @endforeach

    </tbody>

</table>

</body>

</html>
