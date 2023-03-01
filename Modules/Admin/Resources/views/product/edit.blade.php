@extends('admin::layouts.main')
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
        <span class="active">Update</span>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Update Product of {{$data->title}}</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" action="{{route('admin-updateproduct',$data->id)}}" class="form-horizontal" enctype="multipart/form-data" id="add-product-form">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-body">
                        


                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Product Name<span class="required">*</span></label>
                            <div class="col-md-10">
                                <input type="name" class="form-control" placeholder="Product Name" name="name" value="{{ (old('name')!="") ? old('name') : $data->name}}"/>
                                @if ($errors->has('name'))
                                <span class="help-block"> {{ $errors->first('name') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Current Featured Image</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control"  name="photo" onchange="readURL(this);">
                                @if ($errors->has('photo'))
                                <span class="help-block"> {{ $errors->first('photo') }} </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <img id="blah" src="{{isset($data->photo)?URL::asset('public/uploads/product/'.$data->photo):''}}" style="max-width: 400;max-height: 200px">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">File</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control"  name="file">
                                @if ($errors->has('file'))
                                <span class="help-block"> {{ $errors->first('file') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">View File</label>
                            <div class="col-md-10">
                                        <a href="{{URL::asset('public/uploads/product/'.$data->file) }}" target="_blank"><button class="btn btn-outline btn-circle btn-sm" type="button"><i class="fa fa-eye"></i> View file</button> </a>
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Price</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" placeholder="price" name="price" value="{{ (old('price')!="") ? old('price') : $data->price}}"/>
                                @if ($errors->has('price'))
                                <span class="help-block"> {{ $errors->first('price') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('strike_price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Strike Price</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" placeholder="price" name="strike_price" value="{{ (old('strike_price')!="") ? old('strike_price') : $data->strike_price}}"/>
                                @if ($errors->has('strike_price'))
                                <span class="help-block"> {{ $errors->first('strike_price') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('highlights') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Highlights<span class="required">*</span></label>
                            <div class="col-md-10">
                                <textarea class="form-control" placeholder="Highlights" name="highlights"  id="body">{{ (old('highlights')!="") ? old('highlights') : $data->highlights }}</textarea>
                                @if ($errors->has('description'))
                                <span class="help-block"> {{ $errors->first('highlights') }} </span>
                                @endif
                                <span class="help-block"></span> 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3">Description<span class="required">*</span></label>
                            <div class="col-md-10">
                                <textarea class="form-control ckeditor" placeholder="Description" name="description"  id="body">{{ (old('description')!="") ? old('description') : $data->description }}</textarea>
                                @if ($errors->has('description'))
                                <span class="help-block"> {{ $errors->first('description') }} </span>
                                @endif
                                <span class="help-block"></span> 
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
                                <a href="{{Route('admin-products')}}" class="btn btn-primary">Cancel</a>
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