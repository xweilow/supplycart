@extends('layouts.master')

@section('content')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    @if (sizeof($orders) == 0)
       <div class="alert alert-info text-center" style="margin-top: 30px;">You have no order yet.</div>
    @endif

    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-sm-12" style="overflow: auto; margin-right: 15px;">
            @if(!empty($orders))
                @foreach($orders as $order)
                    <div style="margin-top: 40px;">
                        <span style="font-size: 20px;"><b>Order #<?= $order['id'] ?></b></span>
                    </div>
                    <table>
                        <tr>
                            <th style="min-width: 200px;">Product</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price (RM)</th>
                            <th class="text-center">Amount (RM)</th>
                        </tr>
                        @foreach($order['items'] as $item)
                        <tr>
                            <td>{{ $products[$item['product_id']]['name'] }}</td>
                            <td class="text-center">{{ $item['quantity'] }}</td>
                            <td class="text-right">{{ number_format($item['price'], 2) }}</td>
                            <td class="text-right">{{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right"><b>Subtotal</b></td>
                            <td class="text-right">{{ number_format($order['amount'], 2) }}</td>
                        </tr>
                    </table>
                    <hr style="height:1px;border:none;color:#333;background-color:#333;">
                @endforeach
            @endif
        </div>
    </div>
@endsection
