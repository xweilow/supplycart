@extends('layouts.master')

@section('content')
    <style>
        #products {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #products td, #products th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #products tr:nth-child(even){background-color: #f2f2f2;}

        #products tr:hover {background-color: #ddd;}

        #products th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: dodgerblue;
          color: white;
        }
    </style>
    @if (Session::has('success-add-cart'))
       <div class="alert alert-success" style="margin-top: 30px;">{{ Session::get('success-add-cart') }}</div>
    @endif
    <table id="products" style="margin-top: 30px; margin-bottom: 30px;">
        <tr>
            <th>Product</th>
            <th class="text-center">Price (RM)</th>
            @if(auth()->check())
            <th>Action</th>
            @endif
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td class="text-center">{{ $product->price }}</td>
            @if(auth()->check())
            <td><a href="/add-to-cart/{{ $product->id }}" class="btn btn-primary">Add to Cart</a></td>
            @endif
        </tr>
        @endforeach
    </table>
@endsection
