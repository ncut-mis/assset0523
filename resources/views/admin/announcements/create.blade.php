@extends('admin.layouts.master')

@section('title', '新增公告')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增公告
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 公告管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/announcements/{{$user->id}}" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="輸入標題">
            </div>

            <div class="form-group">
                <label>內容：</label>
                <textarea name="content" class="form-control" placeholder="輸入內容"> </textarea>
            </div>
            <div class="form-group">
                <label>日期：</label>
                <input name="date" class="form-control" placeholder="請輸入日期與時間" value="{{$today->month}}{{$today->day}}">
            </div>
            <div class="form-group">
                <label>發布者：</label>
                <input name="user_id" class="form-control" value="{{$user->id}}" >
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection