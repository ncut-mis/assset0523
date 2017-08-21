@extends('admin.layouts.master')

@section('title', '資產資料')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            資產 <small>資產資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 資產管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
            <div class="form-group">
                <label width="80">資產名稱：</label>
                <label name="name">{{$asset->name}}</label>
            </div>

        <div class="form-group">
            <label width="80">資產類別：</label>
                    <label name="category">{{$category->name}}</label>
        </div>

            <div class="form-group">
                <label width="80">購置日期：</label>
                <label name="date">{{$asset->date}}</label>
            </div>

        @if(Auth::user()->previlege_id==4)
            <div class="form-group">
                <label width="80">成本：</label>
                <label name="cost">{{$asset->cost}}</label>
            </div>
        @endif

            <div class="form-group">
                <label width="80">資產狀態：</label>
                <label name="status">{{$asset->status}}</label>
            </div>

            <div class="form-group">
                <label width="80">保管人：</label>
                <label name="keeper">{{$user->name}}</label>
            </div>

            <div class="form-group">
                <label width="80">可否租借：</label>
                    <label name="lendable">
                        @if($asset->lendable)
                        是
                        @else
                            <lable name="lendable">否</lable>
                        @endif
                    </label>
            </div>

            <div class="form-group">
                <label width="80">放置地點：</label>
                <label name="location">{{$asset->location}}</label>
            </div>

            <div class="form-group">
                <label width="80">供應商：</label>
                <label name="vendor">{{$vendor->name}}</label>
            </div>

            <div class="form-group">
                <label width="80">耐用年限：</label>
                <label name="warranty">{{$asset->warranty}}</label>
            </div>

            <div class="form-group">
                <label width="80">備註：</label>
                <lable name="warranty">{{$asset->remark}}</lable>
            </div>




        <div>
            <a href="{{ route('admin.assets.index') }}" class="btn btn-success">返回</a>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
