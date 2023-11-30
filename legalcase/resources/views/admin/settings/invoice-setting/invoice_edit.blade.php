@extends('admin.layout.app')
@section('title','Invoice Setting')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Invoice Setting</h3>
        </div>

        <div class="title_right">
            <div class="form-group pull-right top_search">

            </div>
        </div>
    </div>
    <form id="invoice_setting" name="invoice_setting" role="form" method="POST"
          action="{{route('invoice-setting.store')}}" enctype="multipart/form-data" autocomplete="off">
        @csrf()

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @include('admin.settings.setting-header')
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="invoice_prefex">Invoice Prefex </label>
                                <input type="text" placeholder="" class="form-control" id="invoice_prefex"
                                       name="invoice_prefex" value="{{!empty($setting->prefix)?$setting->prefix:''}}">
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="invoice_number">Next Invoice Number </label>
                                <input type="text" placeholder="" class="form-control" id="last_number" readonly=""
                                       name="last_number" value="{{ ($setting->invoice_no + 1 )}}">
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Invoice Formet </label><br>

                                <input type="radio" id="test3" name="forment"
                                       value="1" {{(!empty($setting) && $setting->invoice_formet=='1')?'checked':''}} {{empty($setting)?'checked':''}}>
                                &nbsp;&nbsp;Number Based(00001)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test4" name="forment"
                                       value="2" {{(!empty($setting) && $setting->invoice_formet=='2')?'checked':''}}>&nbsp;&nbsp;Year
                                Based(YYYY/00001)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test5" name="forment"
                                       value="3" {{(!empty($setting) && $setting->invoice_formet=='3')?'checked':''}}>&nbsp;&nbsp;00001-YY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test6" name="forment"
                                       value="4" {{(!empty($setting) && $setting->invoice_formet=='4')?'checked':''}}>&nbsp;&nbsp;00001/MM/YY
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="predefine_clientnote">Predefine Client Note</label>
                                <textarea rows="7" placeholder="" class="form-control" name="predefine_client"
                                          id="predefine_client">{{$setting->client_note ?? ""}}</textarea>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="term_condition">Predefine Terms & Condition</label>
                                <textarea rows="7" placeholder="" class="form-control" id="predefine_term_note"
                                          name="predefine_term_note">{{$setting->term_condition ?? ""}}</textarea>
                                <p class="text-danger">Note:You can separate by ##(Double Hash Sign) (E.X. Terms
                                    1##Terms 2##Terms 3)</p>
                            </div>


                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"
                                                                                     id="show_loader"></i> Save
                                    </button>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
