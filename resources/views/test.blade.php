@extends('layouts.app')

@section('content')
<h1>Test Excel Data</h1>
@if (count($data) > 0)
<table>
    <thead>
        <tr>
            @foreach ($data[0] as $key => $value)
                <th>{{ $key }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No data found in the Excel file.</p>
@endif
@endsection
