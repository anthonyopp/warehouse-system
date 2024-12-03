
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        nav {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            color: #4CAF50;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .form-container label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <!-- 导航栏 -->
    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('user.items') }}">User Items</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- 显示成功消息 -->
        @if(session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        <!-- 添加新项的表单 -->
        <div class="form-container">
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <label for="sku">SKU:</label>
                <input type="text" id="sku" name="sku" required>

                <label for="zone">Zone:</label>
                <input type="text" id="zone" name="zone" required>

                <label for="rack">Rack:</label>
                <input type="text" id="rack" name="rack" required>

                <button type="submit">Add Item</button>
            </form>
        </div>

        <!-- 显示所有项 -->
        <h1>Items List</h1>
        <table>
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Zone</th>
                    <th>Rack</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->zone }}</td>
                        <td>{{ $item->rack }}</td>

                        <td>
                            <!-- 编辑按钮 -->
                            <a href="{{ route('items.edit', $item->id) }}" style="margin-right: 10px;">Edit</a>
                            <!-- 删除按钮 -->
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color:red;color:white;border:none;padding:5px 10px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
