@extends('back-end.layouts.master')
@section('content')
    @yield('book-content')
{{-- @section('left-sidebar') --}}
   <div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">menu</i>
    </a>
    <ul>
      <li class="waves-effect waves-light red"><a href="{{ route('book.create') }}"><i class="material-icons">insert_chart</i>Thêm Sách</a></li>
    </ul>
  </div>
{{-- @stop --}}

@stop
@section('footer')
  {{-- <script src="{{ URL::asset('lib/controller/NewsController.js') }}"></script> --}}
@stop
