<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 18cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>
<body>
 @foreach($orders as $order)
    <header class="clearfix">
        <h1>INVOICE {{ $order->id }}</h1>
        <div  class="clearfix" style="float: right; overflow: hidden">
            <div>{{ $configuration->company_name }}</div>
            <div>{{ $configuration->company_head_number }}</div>
            <div>{{ $configuration->company_address }}</div>
            <div>{{ $configuration->company_email }}</div>
        </div>
        <div id="project">
            <div><span>Name</span> {{ $order->customers->name }}</div>
            <div><span>Area</span> {{ $order->customers->area }}</div>
            <div><span>ADDRESS</span> {{ $order->customers->address }}</div>
            <div><span>Phone</span> {{ $order->customers->phone }}</div>
            <div><span>Order Place</span> {{ $order->billinginfo->created_at }}</div>
            <div><span>DUE DATE</span>{{ $order->billinginfo->dr_time }} - hours {{ $order->billinginfo->dr_date }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
            <tr>
                <th class="service">Product</th>
                <th class="desc">Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="service">{{ $order->orderhistory->product_name }}</td>
                <td class="desc">{{ $order->orderhistory->product_name }}</td>
                <td class="unit">{{ $order->orderhistory->product_price }}</td>
                <td class="qty">{{ $order->orderhistory->product_quantity }}</td>
                <td class="total">{{ $order->orderhistory->total_price }}</td>
            </tr>
            <tr>
                <td colspan="4">SUBTOTAL</td>
                <td class="total">{{ $order->total_amount }}</td>
            </tr>
            <tr>
                <td colspan="4">Delivery Charge</td>
                <td class="total">20</td>
            </tr>
            <tr>
                <td colspan="4" class="grand total">GRAND TOTAL</td>
                <td class="grand total">{{ $order->final_total_amount }}</td>
            </tr>
            </tbody>
        </table>
        <div id="notices">
            <div style="width: 20%; margin-top: 30px">
                <hr>
            </div>
            <div class="notice">Customer Signature</div>
        </div>me
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
 @endforeach
</body>
</html>
