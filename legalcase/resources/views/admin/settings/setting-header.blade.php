<br>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li class="{{ Request::segment(2)=='general-setting' ? 'active' :'' }}" role="presentation"><a
                href="{{ url('admin/general-setting') }}">Company details</a>
        </li>
        <li class="{{ Request::segment(2)=='date-timezone' ? 'active' :'' }}"
            role="presentation" class=""><a href="{{ url('admin/date-timezone') }}">Date & Time Zone</a>

        </li>
        <li class="{{ Request::segment(2)=='invoice-setting' ? 'active' :'' }}" role="presentation" class=""><a
                href="{{ url('admin/invoice-setting') }}">Invoice Setting</a>
        </li>
    </ul>

</div>
