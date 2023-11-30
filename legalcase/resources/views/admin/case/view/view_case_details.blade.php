@extends('admin.layout.app')
@section('title','Case List')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    @include('admin.case.view.card_header')
                    <div class="dashboard-widget-content">
                        <h2 class="line_30 case_detail-m-f-10">Case Detail</h2>
                        <div class="col-md-6 hidden-small">


                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td>Case Type</td>
                                    <td class="fs15 fw700 text-right">{{$case->caseType}}</td>
                                </tr>
                                <tr>
                                    <td>Filling No</td>
                                    <td class="fs15 fw700 text-right">{{$case->filing_number}}</td>
                                </tr>
                                <tr>
                                    <td>Filling Date</td>
                                    <td class="fs15 fw700 text-right">{{date($date_format_laravel,strtotime($case->filing_date))}}</td>
                                </tr>
                                <tr>
                                    <td>Registration No</td>
                                    <td class="fs15 fw700 text-right">{{$case->registration_number}}</td>
                                </tr>
                                <tr>
                                    <td>Registration Date</td>
                                    <td class="fs15 fw700 text-right">{{date($date_format_laravel,strtotime($case->registration_date))}}</td>
                                </tr>
                                <tr>
                                    <td>CNR Number</td>
                                    <td class="fs15 fw700 text-right"> {{$case->cnr_number}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 hidden-small">

                            <table class="countries_list">
                                <tbody>

                                <tr>
                                    <td>First Hearing Date</td>
                                    <td class="fs15 fw700 text-right s">
                                        {{date($date_format_laravel,strtotime($case->first_hearing_date))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Next Hearing Date</td>

                                    @if($adminHasPermition->can(['case_edit']) =="1")
                                        <td class="fs15 fw700 text-right">

                                            {{date($date_format_laravel,strtotime($case->next_date))}}
                                            &nbsp;<a href="javascript:void(0);"
                                                     onClick="nextDateAdd({{$case->case_id}});">
                                                <i class="fa fa-calendar"></i></a>
                                        </td>
                                    @else
                                        <td class="fs15 fw700 text-right">
                                            {{date($date_format_laravel,strtotime($case->next_date))}}

                                            &nbsp;<a href="javascript:void(0);">
                                                <i class="fa fa-calendar"></i></a>
                                        </td>



                                    @endif
                                </tr>
                                <tr>
                                    <td>Case Status</td>
                                    <td class="fs15 fw700 text-right">{{$case->case_status_name}}</td>
                                </tr>
                                <tr>
                                    <td>Court No.</td>
                                    <td class="fs15 fw700 text-right">{{$case->court_no}}</td>
                                </tr>
                                <tr>
                                    <td>Judge</td>
                                    <td class="fs15 fw700 text-right">{{$case->judge_name}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <div class="col-md-6 hidden-small">
                            <h4 class="line_30">Petitioner and Advocate</h4>


                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td> @if(count($petitioner_and_advocate)>0 && !empty($petitioner_and_advocate)) @php $i=1; @endphp @foreach($petitioner_and_advocate as $value)
                                            <p class="subscri-ti-das"> {{ $i.') '.$value['party_name'] }}</p>
                                            <p class="subscri-ti-das"> Advocate - {{$value['party_advocate'] }} </p>
                                            @php $i++; @endphp @endforeach @endif</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 hidden-small">
                            <h4 class="line_30">Respondent and Advocate</h4>

                            <table class="countries_list">
                                <tbody>

                                <tr>
                                    <td>
                                        @if(count($respondent_and_advocate)>0 && !empty($respondent_and_advocate)) @php $i=1; @endphp @foreach($respondent_and_advocate as $value)
                                            <p class="subscri-ti-das"> {{ $i.') '.$value['party_name'] }}</p>
                                            <p class="subscri-ti-das"> Advocate - {{$value['party_advocate'] }} </p>
                                            @php $i++; @endphp @endforeach @endif
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="load-modal"></div>


    <div class="modal fade" id="modal-next-date" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_next_date">

            </div>
        </div>
    </div>

    <input type="hidden" name="getNextDateModals"
           id="getNextDateModals"
           value="{{url('admin/getNextDateModal')}}">
@endsection

@push('js')
    <script src="{{asset('assets/js/case/case_view_detail.js')}}"></script>
@endpush





