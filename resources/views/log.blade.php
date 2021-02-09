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

    <table id="products" style="margin-top: 30px; margin-bottom: 30px;">
        <tr>
            <th>Datetime</th>
            <th>Activity</th>
        </tr>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->created_at }}</td>
            <td>{{ $log->activity }}</td>
        </tr>
        @endforeach
    </table>
@endsection
