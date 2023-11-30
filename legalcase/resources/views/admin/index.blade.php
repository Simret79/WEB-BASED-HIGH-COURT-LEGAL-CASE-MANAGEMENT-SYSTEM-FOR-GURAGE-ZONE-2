@extends('admin.layout.app')
@section('title','Dashboard')
@section('content')

    @if($adminHasPermition->can(['dashboard_list']))

        <link href="{{ asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.css') }} " rel="stylesheet">
        <form method="POST" action="{{url('admin/dashboard')}}" id="case_board_form">
        {{ csrf_field() }}
        <!-- top tiles -->
            <div class="page-title">
                <div class="title_left">
                    <h3>Dashboard</h3>
                </div>


            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Appointment</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="appoint_range" id="appoint_range" class="form-control"
                                           value="{{date($date_format_laravel)}}" readonly="">
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if(count($appoint_calander)>0)
                                <table id="appointment_list" class="table row-border" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Client Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                </table>
                            @elseif($appointmentCount>0 && count($appoint_calander)==0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="customers-space">
                                            <p class="customers-tittle text-center">Today you have no Appointment.</p>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="customers-space">
                                                <h4 class="customers-heading">Manage your Appointment</h4>
                                                <p class="customers-tittle">Schedule your appointment <br><em>
                                                    You will remind and notify as and when your appointment is
                                                    due.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="customers-img">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>


            </div>

            <br>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Calendar</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group">

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="calendar_dashbors_case"></div>


                        </div>
                    </div>
                </div>


            </div>


            <div id="load-modal"></div>
            <!-- /top tiles -->
        </form>



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

        <input type="hidden" name="token-value"
               id="token-value"
               value="{{csrf_token()}}">

        <input type="hidden" name="case-running"
               id="case-running"
               value="{{url('admin/case-running')}}">

        <input type="hidden" name="appointment"
               id="appointment"
               value="{{url('admin/appointment')}}">
        <input type="hidden" name="ajaxCalander"
               id="ajaxCalander"
               value="{{ url('admin/ajaxCalander') }}">

        <input type="hidden" name="date_format_datepiker"
               id="date_format_datepiker"
               value="{{$date_format_datepiker}}">
        <input type="hidden" name="dashboard_appointment_list"
               id="dashboard_appointment_list"
               value="{{ url('admin/dashboard-appointment-list') }}">

        <input type="hidden" name="getNextDateModal"
               id="getNextDateModal"
               value="{{url('admin/getNextDateModal')}}">

        <input type="hidden" name="getChangeCourtModal"
               id="getChangeCourtModal"
               value="{{url('admin/getChangeCourtModal')}}">

        <input type="hidden" name="getCaseImportantModal"
               id="getCaseImportantModal"
               value="{{url('admin/getCaseImportantModal')}}">
        <input type="hidden" name="getCourt"
               id="getCourt"
               value="{{url('getCourt')}}">
        <input type="hidden" name="downloadCaseBoard"
               id="downloadCaseBoard"
               value="{{url('admin/downloadCaseBoard')}}">
        <input type="hidden" name="printCaseBoard"
               id="printCaseBoard"
               value="{{url('admin/printCaseBoard')}}">

    @endif
@endsection
@push('js')
    <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
    <script src="{{ asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{asset('assets/js/dashbord/dashbord-datatable.js')}}"></script>
@endpush
