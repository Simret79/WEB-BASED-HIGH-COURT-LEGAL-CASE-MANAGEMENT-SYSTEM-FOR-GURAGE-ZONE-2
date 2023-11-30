"use strict";
var select2Case = $('#select2Case').val();
var date_format_datepiker = $('#date_format_datepiker').val();
var FormControlsClient = {

    init: function () {
        var btn = $("form :submit");
        $('#add_client').validate({
            debug: false,
            ignore: '.select2-search__field,:hidden:not("textarea,.files,select")',
            rules: {
                task_subject: "required",
                start_date: "required",
                end_date: "required",
                project_status_id: "required",
                priority: "required",
                'assigned_to[]': {
                    required: true,
                }

            },
            messages: {
                task_subject: "Please enter subject.",
                start_date: "Please enter start date.",
                end_date: "Please enter deadline.",
                project_status_id: "Please select status.",
                priority: "Please select priority.",
                'assigned_to[]': {
                    required: "Please select employee name.",
                }

            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent()).addClass('text-danger');
            },
            submitHandler: function (e) {
                $('#show_loader').removeClass('fa-save');
                $('#show_loader').addClass('fa-spin fa-spinner');
                $("button[name='btn_add_user']").attr("disabled", "disabled").button('refresh');
                return true;
            }
        })
    }

};
jQuery(document).ready(function () {
    FormControlsClient.init();


    $('#related_id').select2({
        ajax: {
            url: select2Case,
            data: function (params) {
                return {
                    search: params.term,
                    //page: params.page || 1
                };
            },
            dataType: 'json',
            processResults: function (data) {
                console.log(data);
                //data.page = data.page || 1;
                return {
                    results: data.items.map(function (item) {
                        return {
                            id: item.id,
                            text: `${item.first_name}  ${item.middle_name} ${item.last_name}`,
                            otherfield: item,
                        };
                    }),
                    pagination: {
                        more: data.pagination
                    }
                }
            },
            //cache: true,
            delay: 50
        },
        placeholder: 'Search customer',
        // minimumInputLength: 1,
        templateResult: getfName,
    });

    $("#project_status_id").select2({
        allowClear: true,
        placeholder: 'Select status'
    });

    $("#priority").select2({
        allowClear: true,
        placeholder: 'Select priority'
    });

    $("#assigned_to").select2({
        allowClear: true,
        placeholder: 'Select Users',
        multiple: true
    });

    $("#related").select2({
        allowClear: true,
        placeholder: 'Nothing selected',
    });

    $("#project_status_id").select2({
        allowClear: true,
        placeholder: 'Select status'
    });

    $("#priority").select2({
        allowClear: true,
        placeholder: 'Select priority'
    });

    $("#assigned_to").select2({
        allowClear: true,
        placeholder: 'Select Users',
        multiple: true
    });

    $("#related").select2({
        allowClear: true,
        placeholder: 'Nothing selected',
    });


    $(".dateFrom").datepicker({
        format: date_format_datepiker,
        autoclose: true,
        todayHighlight: true,
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('.dateTo').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('.dateTo').datepicker('setStartDate', null);
    });

    $(".dateTo").datepicker({
        format: date_format_datepiker,
        autoclose: true,
        todayHighlight: true,
    }).on('changeDate', function (selected) {
        var endDate = new Date(selected.date.valueOf());
        $('.dateFrom').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
        $('.dateFrom').datepicker('setEndDate', null);
    });

    $('#related').on('change', function () {
        var optionSelected = $(this).find("option:selected");
        var label_name = optionSelected.val();

        if (label_name == "case") {
            $('.task_selection').removeClass('hide');
        } else {
            $('.task_selection').addClass('hide');
        }
    });


});

function getfName(data) {
    if (!data.id) {
        return data.text;
    }
    data = data.otherfield;
    var $html = $("<p style='margin-bottom: 0;'><b>" + data.first_name + ' ' + data.middle_name + ' ' + data.last_name + "</b> <br> " + data.case_number + "</p>");
    return $html;
}
