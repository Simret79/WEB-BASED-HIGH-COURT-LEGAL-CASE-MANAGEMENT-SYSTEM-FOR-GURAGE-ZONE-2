<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="{{ route('clients.show', $client->id) }}">Client Detail</a>
        </li>
        <li role="presentation" class="@if(Request::segment(4)=='cases')active @ else @endif"><a
                href="{{ url('admin/client/view/cases') }}">Cases</a>

        </li>
        <li role="presentation" class="@if(Request::segment(4)=='account')active @ else @endif"><a
                href="{{ url('admin/client/view/account') }}">Account</a>
        </li>
    </ul>

</div>
