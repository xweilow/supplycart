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
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3 text-right" style="padding-top: 6px;">
            Category
        </div>
        <div class="col-sm-9">
            <select class="form-control" id="category_id">
                <option value="" <?php if($category_id == "") { echo "selected"; } ?>>All</option>
                @foreach ($categories as $c)
                <option value="{{ $c['id'] }}" <?php if($category_id == $c['id']) { echo "selected"; } ?>>{{ $c['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-sm-3 text-right" style="padding-top: 6px;">
            Brand
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="brand" value="{{ $brand }}">
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-sm-12 text-right">
            <button class="btn btn-primary" id="btn-search">Search</button>
        </div>
    </div>
    <div class="row">
        <table id="products" style="margin-top: 30px; margin-bottom: 30px;">
            <tr>
                <th>Category</th>
                <th>Brand</th>
                <th>Product</th>
                <th class="text-center">Price (RM)</th>
                @if(auth()->check())
                <th>Action</th>
                @endif
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $categories[$product->category_id]['name'] }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->name }}</td>
                <td class="text-center">{{ auth()->check() ? (auth()->user()->is_vip == 0 ? $product->price : $product->vip_price) : $product->price }}</td>
                @if(auth()->check())
                <td><a href="/add-to-cart/{{ $product->id }}" class="btn btn-primary">Add to Cart</a></td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#btn-search").click(function (e) {
            e.preventDefault();
            var ele = $(this);

            var urlParam = [];
            if($("#category_id").val() != '') {
                urlParam.push('c='+$('#category_id').val());
            }
            if($("#brand").val() != '') {
                urlParam.push('b='+encodeURI($("#brand").val()));
            }

            location = '/products?'+urlParam.join('&');
        });
    </script>
@endsection
