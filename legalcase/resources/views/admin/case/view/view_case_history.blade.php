@extends('admin.layout.app')
@section('title','Case History')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <div class="x_title">
                        <h2> Case</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>

                                <a class="card-header-color "
                                   href="{{url('admin/case-running-download/'.$case_id.'/download')}}"
                                   title="Download case file"><i class="fa fa-download fa-2x"></i></a>
                            </li>
                            <li>
                                <a class="card-header-color  "
                                   href="{{url('admin/case-running-download/'.$case_id.'/print')}}"
                                   title="Print case file" target="_blank"><i class="fa fa-print fa-2x"></i></a>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <br>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation"
                                class="@if(Request::segment(2)=='case-running')active @ else @endif"><a
                                    href="{{route('case-running.show',$case_id)}}">Detail</a>
                            </li>
                            <li role="presentation"
                                class="@if(Request::segment(2)=='case-history')active @ else @endif"><a
                                    href="{{url( 'admin/case-history/'.$case_id)}}">History</a>

                            </li>
                            <li role="presentation" class="@if(Request::segment(4)=='transfer')active @ else @endif"><a
                                    href="{{url('admin/case-transfer/'.$case_id)}}">Transfer</a>
                            </li>
                        </ul>

                    </div>
                    <table id="case_history_list" class="table row-border" >
                        <thead>
                        <tr>

                            <th width="16%">Registration No.</th>
                            <th width="23%">Judge</th>
                            <th width="15%">Business on Date</th>
                            <th width="14%">Hearing Date</th>
                            <th width="35%">Purpose of Hearing</th>
                            <th width="2%" class="text-center">Remarks</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>


    </div>

    <div id="load-modal"></div>

    <div id="remarkModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">

                </div>
            </div>

        </div>
    </div>
    <input type="hidden" name="token-value"
           id="token-value"
           value="{{csrf_token()}}">
    <input type="hidden" name="case_ids"
           id="case_ids"
           value="{{$case_id}}">
    <input type="hidden" name="allCaseHistoryList"
           id="allCaseHistoryList"
           value="{{ url('admin/allCaseHistoryList') }}">

@endsection
@push('js')
    <script src="{{asset('assets/js/case/case-history-datatable.js')}}"></script>
@endpush
