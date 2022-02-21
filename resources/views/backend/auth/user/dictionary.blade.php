@extends('backend.layouts.app')

@section('content')

<form action="{{ url('admin/scan') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-ghost-primary" id="scanner">Scan Device</button><br><br>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">MAC ADDRESS</th>
            <th scope="col">RSSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->mac}}</td>
            <td>{{$item->rssi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}

@endsection
