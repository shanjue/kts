@extends('layouts/ControlpanelApp')

@section('content-header')
<section class="content-header">
  <h1>
    Categories Control Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/catandtag')}}"><i class="fa fa-dashboard"></i>Categories Control Page </a></li>
  </ol>
</section>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Categories</h3>
      </div>
      <div class="box-body">
        <div class="panel panel-default">
          <div class="panel-heading">Categories <a href="" id="addnewButton" data-target="#myModal" data-toggle="modal" class="pull-right"><i class="fa fa-plus"></i></a></div>
          <div class="panel-body">
            <ul class="list-group"  id="refresh">
              @foreach($categories as $category)
                <li class="list-group-item ourCategory" data-target="#myModal" data-toggle="modal">{{ $category->name}}
                  <input type="hidden" id="ourCategoryId" value="{{ $category->id }}">
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <!-- Start model box ျဖစ္သည္ -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title">Add New Category</h4>
              </div>
              <div class="modal-body">
                {{csrf_field()}}
                <input type="hidden" id="id">
                <p><input type="text" id="addCategory" class="form-control" placeholder="Write Something Here."></p>
              </div>
              <div class="modal-footer">
                <button type="button" id="savechangesButton" class="btn btn-primary" data-dismiss="modal" style="display:none;">Save changes</button>
                <button type="button" id="deleteButton" class="btn btn-danger" data-dismiss="modal" style="display:none;">Delete</button>
                <button type="button" id="addButton" class="btn btn-primary" data-dismiss="modal">Add Category</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End model box ျဖစ္သည္ -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-6">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">other</h3>
      </div>
      <div class="box-body">
        Start creating your amazing application!
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        other Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    // <li>ကို click ႏွိပ္ေသာအခါ................................
    // class ourItem တစ္ခုစီ(each loop)ကို click ႏွိပ္ေသာအခါ
    // variable ေၾကျငာေစခ်င္ရင္ var နဲ႔ စသည္
    // variable ကို single code မထည့္ရပါ
    // #addItem input value ကို ရလာတဲ့ text ထည့္ထားသည္
    // show()၄၀၀ မွာ singlecode ပါရမယ္
    $(document).on('click' , '.ourCategory' , function(event){
        var id = $(this).find('#ourCategoryId').val();/*.ourCategory <li> ထဲက #ourCategoryId ရဲ႕ val() ကို ယူပါ */
        var text = $(this).text();
        var text = $.trim(text);/*input ထဲက text မွာ ပိုေနေသာspace မ်ားကို $.trim နဲ့ ဖ်က္သည္*/
        $('#addCategory').val(text);
        $('#id').val(id);
        $('#title').text('Edit Category');
        $('#deleteButton').show('400');
        $('#savechangesButton').show('400');
        $('#addButton').hide();
        console.log(id);

    });

    // fa fa-plus ကို click ႏွိပ္ေသာအခါ.............................
    $(document).on('click' , '#addnewButton' , function(){
      $('#title').text('Add New Category');
      $('#deleteButton').hide();
      $('#savechangesButton').hide();
      $('#addButton').show('400');
      $('#addCategory').val('');/*input id=addCategory ထဲက text ကို clear လုပ္ပစ္လုိက္သည္*/
    });

    //model ထဲက Add item ကို ႏွိပ္ေသာအခါ...............................
      $(document).on('click' , '#addButton' , function(event){
        // $.post('list')မွာ list မွာ / မပါရပါ
        // php artisan make:migration CreateCategoryTable --create=items
        // php artisan make:model Category
        var text = $('#addCategory').val();
        if (text == "") {
          alert('Type something here!');
        } else {
          $.post('/addcat' , {'text' : text, '_token':$('input[name=_token]' ).val() }, function(data){
            console.log(data);
            $('#refresh').load(location.href + '  #refresh');
          });
        }

      });

      //<li> ကို ႏွိပ္ပီး delete button ကို ႏွိပ္ပီး ဖ်က္ေသာအခါ..........................
      $(document).on('click' , '#deleteButton' , function(event){
        var id = $('#id').val();
        $.post('catdel' , { 'id':id, '_token':$('input[name=_token]').val() } , function(data){
          console.log(data);
          $('#refresh').load(location.href + '  #refresh');
        });
      });

      //<li> ကို ႏွိပ္ပီး savechanges button ကို ႏွိပ္ပီး data itemကို update လုပ္ေသာအခါ..........................
      $(document).on('click' , '#savechangesButton' , function(event){
        var text = $('#addCategory').val();
        var id = $('#id').val();
        $.post('catupdate' , { 'text':text, 'id':id, '_token':$('input[name=_token]').val() } , function(data){
          console.log(data);
          $('#refresh').load(location.href + '  #refresh');
        });
      });


  });

</script>
@endsection
