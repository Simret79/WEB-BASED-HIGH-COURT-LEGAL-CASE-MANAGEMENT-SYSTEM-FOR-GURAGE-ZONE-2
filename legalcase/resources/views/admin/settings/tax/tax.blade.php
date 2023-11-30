@extends('admin.layout.app')
@section('title','Tax')
@section('content')
   <div class="">

      @component('component.modal_heading',
           [
           'page_title' => 'Tax',
           'action'=>route("tax.create"),
           'model_title'=>'Create Tax',
           'modal_id'=>'#addtag',
            'permission' => $adminHasPermition->can(['tax_add'])
           ] )
           Status
           @endcomponent



            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">

                    <table id="tagDataTable" class="table" data-url="{{ route('tax.list') }}">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Name</th>

                          <th  width="5%">Percentage</th>
                          <th  width="5%" data-orderable="false">Status</th>
                          <th  width="2%" data-orderable="false" class="text-center">Action</th>
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
    <script src="{{asset('assets/js/settings/tax-datatable.js')}}"></script>

@endpush
