@extends('admin.layout.app')
@section('title','Client')
@section('content')
    <div class="">
        @component('component.heading' , [
       'page_title' => 'Client',
       'action' => route('clients.create') ,
       'text' => 'Add Client',
       'permission' => $adminHasPermition->can(['client_add'])
        ])
        @endcomponent

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <table id="clientDataTable" class="table" data-url="{{ route('clients.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Client Name</th>
                                <th width="5%">Mobile</th>
                                <th width="5%" data-orderable="false">Case</th>
                                <th width="5%" data-orderable="false">Status</th>
                                <th width="5%" data-orderable="false" class="text-center">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('js')
    <script src="{{asset('assets/js/client/client-datatable.js')}}"></script>
@endpush
