@extends('back-end.layouts.master')
@section('content')
        <div class="col l12  m12  s12">
            @yield('user-content')
        </div>
           <div class="fixed-action-btn toolbar">

  </div>
@stop
@section('footer')
  {{-- <script src="{{ URL::asset('lib/controller/CategoryController.js') }}"></script> --}}
  <script src="{{ URL::asset('back-end/js/sortable-admin.js') }}"></script>
@stop
