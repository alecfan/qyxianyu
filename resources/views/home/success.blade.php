@extends('layouts.home')
@section('title','交易成功')

@section('header')
    <link href="{{ url('home/css/sustyle.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ url('home/js/jquery-1.7.min.js') }}"></script>
@endsection

@section('content')
<div class="take-delivery">
    <div class="status">
        <h2>您已成功付款</h2>
        <div class="successInfo">
            <ul>
                <li>付款金额<em>{{$sum}}</em></li>
                <div class="user-info">
                    <p>收货人：艾迪</p>
                    <p>联系电话：15871145629</p>
                    <p>收货地址：湖北省 武汉市 武昌区 东湖路75号众环大厦</p>
                </div>
                请认真核对您的收货信息，如有错误请联系客服

            </ul>
            <div class="option">
                <span class="info">您可以</span>
                <a href="#" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
                <a href="#" class="J_MakePoint">查看<span>交易详情</span></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
