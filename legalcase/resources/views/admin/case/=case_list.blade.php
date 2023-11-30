@extends('admin.layout.app')
@section('title','Case List')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>Case List : MILIND RASHMIBHAI DAVE </h4>
            </div>

            <div class="pull-right">
                <h4>Total Case : 1 </h4>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <table id="datatable" class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Client & Case Detail</th>
                                <th>Court Detail</th>
                                <th>Petitioner vs Respondent</th>
                                <th>Next Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>1</td>
                                <td><i class="fa fa-star-half-o"></i> <a href="{{ url('admin/case/view/detail') }}"
                                                                        >1089/2016</a><br>
                                    Case: CRMA S – Criminal Misc. Application – Sessions
                                </td>
                                <td>Court : District & Sessions Court<br>
                                    No : 5<br>
                                    Magistrate : 5th ADDL District Judge
                                </td>
                                <td>MILIND RASHMIBHAI DAVE<br>
                                    VS<br>
                                    GOVERNMENT OF GUJARAT
                                </td>
                                <td>23-06-2016<br>
                                    Darshan Tank
                                </td>

                                <td>Hearing</td>
                                <td>
                                    <ul class="nav navbar-right panel_toolbox">


                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="true"><i class="fa fa-ellipsis-h"
                                                                     ></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ url('admin/case/view/detail') }}"><i
                                                            class="fa fa-eye"></i>&nbsp;&nbsp;View</a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                </li>
                                                <li><a class="call-model" data-url="{{ url('admin/detail/modal') }}"
                                                       data-target-modal="#Detailmodal"><i
                                                            class="fa fa-calendar-plus-o"></i>&nbsp;&nbsp;Next Date</a>
                                                </li>
                                                <li><a class="call-model"
                                                       data-url="{{ url('admin/casetransfer/modal') }}"
                                                       data-target-modal="#Casetransfermodal"><i
                                                            class="fa fa-gavel"></i>&nbsp;&nbsp;Case Transfer</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div id="load-modal"></div>
@endsection
