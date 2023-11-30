@extends('admin.layout.app')
@section('title','Court')
@section('content')
    <div class="">

        @component('component.modal_heading',
             [
             'page_title' => 'Court',
             'action'=>route("court.create"),
             'model_title'=>'Create Court',
             'modal_id'=>'#addtag',
              'permission' => $adminHasPermition->can(['court_add'])
             ] )
            Status
        @endcomponent


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <table id="tagDataTable" class="table" data-url="{{ route('court.list') }}" >
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Court</th>
                                <th>Court Type</th>
                                <th width="5%" data-orderable="false">Status</th>
                                <th width="2%" data-orderable="false" class="text-center">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="load-modal"></div>
@endsection

@push('js')
    <script src="{{asset('assets/js/settings/cort-datatable.js')}}"></script>

@endpush
