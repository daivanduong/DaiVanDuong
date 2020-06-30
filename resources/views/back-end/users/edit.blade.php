@extends('back-end.layouts.usermaster')
@section('user-content')
    @php
    if(Auth::id()==$user->id || Auth::user()->level<=$user->level)
      $disabled="disabled='disabled'";
    else
      $disabled='';
    @endphp
    <form class="col s12 l6"  method="POST" action="{{ route('user.update',$user->id) }}">
     {{ csrf_field() }}
        {{ method_field('PUT') }}
      <div class="row">
          <div class="input-field col s12">
            <input disabled value="{{$user->id}}" id="disabled" name="id" type="text" class="validate">
            <label for="disabled">ID</label>
          </div>
      </div>

      <div class="row">
          <div class="input-field col s12">
            <input disabled value="{{$user->email}}" id="disabled" type="text" class="validate">
            <label for="disabled">Email</label>
          </div>
      </div>
      <div class="row">
          <div class="input-field col s12">
            <input disabled value="{{$user->phone}}" id="disabled" type="text" class="validate">
            <label for="disabled">Số điện thoại</label>
          </div>
      </div>

      <div class="row">
          <div class="input-field col s12">
          @php
            $arrayName = array('0' => 'Memmber','1' => 'Mod','2' =>  'Admin');
          @endphp
            @foreach ($arrayName as $key => $element)
                <p>
                  <input name="rdo_level" @if ($key==$user->level){{'checked'}} @endif type="radio" id="{{$element}}" value="{{$key}}" {{$disabled}} @if ($key==2){{"disabled='disabled'"}} @endif />
                  <label for="{{$element}}">{{$element}}</label>
                </p>
            @endforeach
            <label>Phân quyền</label>
          </div>
      </div>
      <p>Khóa người dùng</p>
      <div class="row">
          <div class="input-field col s6">
            <div class="switch">
              <label>
                Mở
                <input type="checkbox" @if ($user->block==true){{ 'checked' }} @endif {{$disabled}} name="rdo_block" value="1" >
                <span class="lever"></span>
                Khóa
              </label>
            </div>
          </div>
      </div><br>
      <div class="row">
        <div class="input-field col s6">
          <textarea name="rdo_address" id="rdo_address" class="materialize-textarea">{{$user->address}}</textarea>
          <label for="rdo_address">Địa chỉ</label>
        </div>
      </div>
        @if(Auth::user()->level == 1 || Auth::user()->level == 0 )
      <div class="row">
        <div class="input-field col s6">
          <button class="btn waves-effect waves-light" type="submit" value="update" name="btn_update" disabled>Sửa
              <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
          @else
              <div class="row">
                  <div class="input-field col s6">
                      <button class="btn waves-effect waves-light" type="submit" value="update" name="btn_update" >Sửa
                          <i class="material-icons right">send</i>
                      </button>
                  </div>
             </div>
        @endif
    </form>

    <form class="col s12 fmtDelete" method="POST" action="{{ route('user.destroy',$user->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    @if(Auth::user()->level == 1 || Auth::user()->level == 0 )
        <div class="row">
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red" data-target="modalConfirmDelete" type="submit"   value="delete" name="btn_delete" disabled >Xóa người dùng
                    <i class="material-icons right">delete</i>
                </button>
            </div>
        </div>
        @else
        <div class="row">
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red" data-target="modalConfirmDelete" type="submit"   value="delete" name="btn_delete"  >Xóa người dùng
                    <i class="material-icons right">delete</i>
                </button>
            </div>
        </div>

    @endif
    <!-- Modal Structure -->
    <div id="modalConfirmDelete" class="modal sm-modal">
        <div class="modal-content">
            <h4 class="red-text ">Bạn có thực sự muốn xóa</h4>
        </div>
        <div class="modal-footer">
            <a href="" class="modal-action modal-close waves-effect waves-light btn-flat ">Đóng</a>
            <a href="" class="btnDelete modal-action modal-close waves-effect waves-light btn-flat ">Xóa</a>
        </div>
    </div>

@stop
