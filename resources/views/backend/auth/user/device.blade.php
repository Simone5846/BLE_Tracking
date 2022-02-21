@extends('backend.layouts.app')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">username</th>
      <th scope="col">MAC ADDRESS</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->username}}</td>
      <td>{{$item->mac_addr}}</td>
      <td>
         <a href="{{ url('admin/singleDevice/'.$item->id) }}" class="btn btn-primary">Select</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
