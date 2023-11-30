@extends('admin.layout.app')
@section('title','Client View')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h4>Client Name : {{$name}} </h4>
        </div>
        <div class="pull-right">
            <h4> Total Case : {{$totalCourtCase ?? ''}} </h4>
        </div>

    </div>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <table id="client_case_listDatatable" class="table"
                           data-url="{{ route('client.case_view.list') }}">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th data-orderable="false">Case Detail</th>
                            <th data-orderable="false">Court Detail</th>
                            <th data-orderable="false">Petitioner vs Respondent</th>
                            <th data-orderable="false">Next Date</th>
                            <th data-orderable="false">Status</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>



                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal-case-priority" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal">

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-change-court" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_transfer">

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-next-date" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_next_date">

            </div>
        </div>
    </div>
    <input type="hidden" name="get_case_important_modal"
           id="get_case_important_modal"
           value="{{url('admin/getCaseImportantModal')}}">

    <input type="hidden" name="get_case_next_modal"
           id="get_case_next_modal"
           value="{{url('admin/getNextDateModal')}}">

    <input type="hidden" name="get_case_cort_modal"
           id="get_case_cort_modal"
           value="{{url('admin/getChangeCourtModal')}}">

    <input type="hidden" name="advo_client_id"
           id="advo_client_id"
           value="{{$advo_client_id}}">

@endsection
@push('js')
    <script src="{{asset('assets/js/case/case-client-datatable.js')}}"></script>

@endpush
