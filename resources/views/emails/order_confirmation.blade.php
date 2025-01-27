<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        h1,
        h2 {
            color: #0056b3;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Congratulation you have New order!</h1>
        <p> order has been successfully placed. Below are the details of your order:</p>

        <h2>Order Details:</h2>
        <ul>
            <li><strong>Order ID:</strong> {{ $order->id }}</li>
            <li><strong>Order Date:</strong> {{ $order->created_at }}</li>
            <li><strong>Status:</strong> {{ $order->status ?? 'Pending' }}</li>
            <li><strong>Customer Name:</strong> {{ $order->customer->name }}</li>
            <li><strong>Customer Phone:</strong> {{ $order->customer->phone }}</li>
            <li><strong>Customer Email:</strong> {{ $order->customer->email }}</li>
        </ul>

        <h2> Address Details:</h2>
        <ul>
            <li><strong>Address:</strong> {{ $order->address }}</li>
            <li><strong>City:</strong> {{ $order->city->name ?? $order->city_id }}</li>
        </ul>

        <h2>Order Items:</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Service</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>{{ $order->addon_service_id }}</td>
                    <td>{{ $order->addon_service->name }}</td>
                    <td>{{ $order->addon_service->price }}</td>
                </tr> --}}
            </tbody>
        </table>

        <h2>More Details:</h2>
        <p>
            {{ $order->description }}
        </p>


    </div>
</body>

</html>
