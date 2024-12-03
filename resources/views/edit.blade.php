<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            max-width: 500px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }

        .form-container a:hover {
            color: #4CAF50;
        }
    </style>
</head>
<body>

    <h1>Edit Item</h1>

    <div class="form-container">
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" value="{{ $item->sku }}" required>

            <label for="zone">Zone:</label>
            <input type="text" id="zone" name="zone" value="{{ $item->zone }}" required>

            <label for="rack">Rack:</label>
            <input type="text" id="rack" name="rack" value="{{ $item->rack }}" required>

            <button type="submit">Update Item</button>
        </form>

        <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
    </div>

</body>
</html>
