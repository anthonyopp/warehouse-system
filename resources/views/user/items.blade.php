<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f9;
        }
        /* Admin button style */
        .admin-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .admin-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Warehouse Items</h1>

    <!-- Admin Button -->
    <a href="{{ route('admin.dashboard') }}" class="admin-btn">Admin</a>

    <!-- 搜索表单 -->
    <form method="GET" action="{{ route('user.items') }}">
        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" value="{{ request('sku') }}">

        <label for="zone">Zone:</label>
        <input type="text" id="zone" name="zone" value="{{ request('zone') }}">

        <label for="rack">Rack:</label>
        <input type="text" id="rack" name="rack" value="{{ request('rack') }}">

        <button type="submit">Search</button>
    </form>

    <!-- 数据表 -->
    <table>
        <thead>
            <tr>
                <th>SKU</th>
                <th>Zone</th>
                <th>Rack</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->sku }}</td>
                    <td>{{ $item->zone }}</td>
                    <td>{{ $item->rack }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
