@extends('installer.app')
@section('title','Thank you')
@section('content')
    <section class="login_content">

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="float: none;">Thank you for purchase</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                            {{ csrf_field() }}

                            <h2> Welcome to setup wizard </h2>
                            <p class="text-left">Thanks you for purchasing Legal Case Management System, Legal Case Management System (LCMS) is a web based application for advocates and law firm to maintain their office. This software is very easy to operate and light on system tool To maintain information about clients, cases, hearings Etc.</p>
                            <div>
                                <a href="{{route('check.requirements')}}" class="btn btn-default pull-right">
                                    Next
                                </a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">

                                <div class="clearfix"></div>
                                <br/>

                                <div>

                                    <p>©2023 All Rights Reserved. IS students</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection