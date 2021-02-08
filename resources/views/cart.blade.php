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
    @if (Session::has('success-update-cart'))
       <div class="alert alert-success" style="margin-top: 30px;">{{ Session::get('success-update-cart') }}</div>
    @endif
    @if (Session::has('success-remove-cart'))
       <div class="alert alert-success" style="margin-top: 30px;">{{ Session::get('success-remove-cart') }}</div>
    @endif
    @if (Session::has('success-place-order'))
       <div class="alert alert-success" style="margin-top: 30px;">{{ Session::get('success-place-order') }}</div>
    @endif
    @if (Session::has('error-place-order'))
       <div class="alert alert-danger" style="margin-top: 30px;">{{ Session::get('error-place-order') }}</div>
    @endif
    @if (!session('cart') || empty(session('cart')))
       <div class="alert alert-info text-center" style="margin-top: 30px;">Cart is empty</div>
    @endif

    <?php $total = 0 ?>
    @if(session('cart'))
        <table id="products" style="margin-top: 30px; margin-bottom: 30px;">
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price (RM)</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal (RM)</th>
                <th style="width:10%"></th>
            </tr>
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" style="margin-bottom: 5px;" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
            <tr class="visible-xs">
                <td class="text-center"><strong>Total {{ number_format($total, 2) }}</strong></td>
            </tr>
            <tr>
                <td>
                    <a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <a href="{{ url('/place-order') }}" class="btn btn-success">Place Order <i class="fa fa-angle-right"></i></a>
                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total {{ number_format($total, 2) }}</strong></td>
                <td></td>
            </tr>
        </table>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
