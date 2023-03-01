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
        <a href="{{Route('admin-products')}}">Product</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Add </span>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Add Product</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" action="{{route('admin-addproduct')}}" class="form-horizontal" enctype="multipart/form-data" id="add-product-form">
                    {{csrf_field()}}
                    <div class="form-body">
                        
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Product Name<span class="required">*</span></label>
                            <div class="col-md-10">
                                <input type="name" class="form-control" placeholder="Product Name" name="name" value="{{ (old('name')!="") ? old('name') : ''}}"/>
                                @if ($errors->has('name'))
                                <span class="help-block"> {{ $errors->first('name') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">{{ __('Current Featured Image') }}</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control"  name="photo" onchange="readURL(this);">
                                @if ($errors->has('photo'))
                                <span class="help-block"> {{ $errors->first('photo') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <img id="blah" src="" style="max-width: 400;max-height: 200px">
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Price</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" placeholder="price" name="price" value="{{ (old('price')!="") ? old('price') : ''}}"/>
                                @if ($errors->has('price'))
                                <span class="help-block"> {{ $errors->first('price') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('addon_categories') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Choose Addons <span class="required">*</span></label>
                            <div class="col-md-10">
                              	
                              	<div id="list1" class="dropdown-check-list" tabindex="100">
                                  <span class="anchor">{{ __("Select Addons") }}</span>
                                  <ul class="items">
                                    
                                    <li><label><input type="checkbox"  id="all" /> All</label> </li>
                                    @foreach($addonCategories as $ac)
                                    <li><label><input type="checkbox" name="addon_categories[]" class="check" value="{{ $ac->id }}" {{ (old('addon_categories')!="") ? ($ac->id==old('addon_categories'))?'checked':'' : ''}} /> {{ $ac->name }}</label> </li>
                                    @endforeach
                                    
                                  </ul>
                                </div>
                              
                              
                              
                              
                                @if ($errors->has('addon_categories'))
                                <span class="help-block"> {{ $errors->first('addon_categories') }} </span>
                                @endif
                            </div>
                        </div>
                        



                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Status <span class="required">*</span></label>
                            <div class="col-md-10">
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1"> Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="0"> Inactive
                                    </label>
                                    @if ($errors->has('status'))
                                    <div class="help-block">{{ $errors->first('status') }}</div>
                                    @endif
                                    
                                </div>
                                <span class="help-block"></span> 
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="offset-md-3 col-md-9">
                                <a href="{{Route('admin-products')}}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn green">Submit</button>
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