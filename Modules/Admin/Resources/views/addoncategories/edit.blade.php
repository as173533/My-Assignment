@extends('admin::layouts.main')
@section('page_css')
<style>
  .dropdown-check-list {
  display: inline-block;
    width:100%;
}

.dropdown-check-list .anchor {
  position: relative;
  cursor: pointer;
  display: inline-block;
  padding: 5px 50px 5px 10px;
  border: 1px solid #ccc;
  width:100%;
}

.dropdown-check-list .anchor:after {
  position: absolute;
  content: "";
  border-left: 2px solid black;
  border-top: 2px solid black;
  padding: 5px;
  right: 10px;
  top: 20%;
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}

.dropdown-check-list .anchor:active:after {
  right: 8px;
  top: 21%;
}

.dropdown-check-list ul.items {
  padding: 2px;
  display: none;
  margin: 0;
  border: 1px solid #ccc;
  border-top: none;
  position: absolute;
  width: 96.5%;
  z-index: 9;
  background-color: #fff;
}

.dropdown-check-list ul.items li {
  list-style: none;
  padding-left: 10px;
}

.dropdown-check-list.visible .items {
  display: block;
}
  
  @media only screen and (max-width: 768px) {
    .dropdown-check-list ul.items {
      padding: 2px;
      display: none;
      margin: 0;
      border: 1px solid #ccc;
      border-top: none;
      position: absolute;
      width: 90.5%;
      z-index: 9;
      background-color: #fff;
    }
  }
</style>
@endsection
@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{route('admin-dashboard')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{Route('admin-addon-cat-index')}}">Addon Category</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Update</span>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Update Addon Category of {{$data->name}}</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" action="{{route('admin-addon-cat-update',$data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-body">
                        
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Name<span class="required">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ (old('name')!="") ? old('name') : $data->name}}"/>
                                @if ($errors->has('name'))
                                <span class="help-block"> {{ $errors->first('name') }} </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('addons') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Choose Addons <span class="required">*</span></label>
                            <div class="col-md-10">
                              	
                              	<div id="list1" class="dropdown-check-list" tabindex="100">
                                  <span class="anchor">{{ __("Select Addons") }}</span>
                                  <ul class="items">
                                    
                                    <li><label><input type="checkbox"  id="all" /> All</label> </li>
                                    @foreach($addons as $addon)
                                    <?php
                                        $values=explode(",",$data->addons);

                                        $check=App\Models\AddonCategory::where('id',$data->id)->whereRaw("find_in_set($addon->id,addons)")->count();
                                        if($check>0){
                                            $checked=1;
                                        }else{
                                            $checked=0;
                                        }
                                        // print_r($check);
                                        // exit;

                                    ?>
                                    <li><label><input type="checkbox" name="addons[]" class="check" value="{{ $addon->id }}" {{ ((old('addons')!="") ? ($addon->name==old('addons'))?'checked':'' : (($checked=='1')?'checked':''))}} /> {{ $addon->name }}</label> </li>
                                    @endforeach
                                    
                                  </ul>
                                </div>
                              
                              
                              
                              
                                @if ($errors->has('addons'))
                                <span class="help-block"> {{ $errors->first('addons') }} </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        

                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Status <span class="required">*</span></label>
                            <div class="col-md-10">
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" {{ ($data->status == '1') ? 'checked' : '' }}> Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="0" {{ ($data->status == '0') ? 'checked' : '' }}> Inactive
                                    </label>
                                    @if ($errors->has('status'))
                                    <div class="help-block">{{ $errors->first('status') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{Route('admin-addon-cat-index')}}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn green"> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_js')

<script>
	var checkList = document.getElementById('list1');
    checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
      if (checkList.classList.contains('visible'))
        checkList.classList.remove('visible');
      else
        checkList.classList.add('visible');
    }
    
    $('#all').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $('input.check:checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $('input.check:checkbox').each(function() {
                this.checked = false;                       
            });
        }
    });
  
  	$('.check').click(function(event) {   
        if(!this.checked) {
            // Iterate each checkbox
            $('input#all:checkbox').each(function() {
                this.checked = false;                        
            });
        }/* else {
            $('input#all:checkbox').each(function() {
                this.checked = false;                       
            });
        }*/
    });
</script>



@endsection