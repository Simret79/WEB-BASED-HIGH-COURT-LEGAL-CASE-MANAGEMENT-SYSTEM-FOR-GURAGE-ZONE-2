@extends('admin.layout.app')
@section('title','Role')
@section('content')
    <div class="">

        @component('component.modal_heading',
             [
             'page_title' => 'Role',
             'action'=>route("role.create"),
             'model_title'=>'Create Role',
             'modal_id'=>'#addtag',
              'permission' => '1'
             ] )
            Role
        @endcomponent


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <table id="roleDataTable" class="table" data-url="{{ route('role.list') }}" >
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Role</th>
                                <th width="2%" data-orderable="false">Action</th>
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
    <script src="{{asset('assets/js/role/role-datatable.js')}}"></script>
@endpush
