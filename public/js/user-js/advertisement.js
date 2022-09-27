$(document).ready(function () {

    $(document).on('change', '.select_category', function () {
        selected = $(this).find("option:selected").val();
        var ele = $(document).find('.htmlview');
        $.ajax({
            url: $(this).data('action'),
            type: "GET",
            data: {selected},
            dataType: 'json',
            success: function (data) {
                ele.add('.htmlview').html(data.view);
                ele.removeClass('d-none');
                // var hidden_input_val = ['test','good'];
                $('.checklist input[type="checkbox"]').on('change',function () {
                    var el = $(this);
                    var element = el.closest('.checklist');
                    var hidden_input = el.closest('.checklist').find('input[type=hidden]');
                    var checkboxes = element.find('input[type=checkbox]');
                    var newValue = [];
                    checkboxes.each(function() {
                      if ($(this).is(':checked')) {
                        var id = $(this).val();
                        newValue.push(id);
                      }
                    });
                    hidden_input.val(JSON.stringify(newValue));
                });
            }
        });
    });
    $(window).on("load", function () {
        var action = $('#action').data('action');
        var id = $('input[name=id]').val();
        selected = $(document).find("option:selected").val();
        var ele = $(document).find('.htmlview');
        $.ajax({
            url: action,
            type: "GET",
            data: {selected,id},
            dataType: 'json',
            success: function (data) {
                ele.add('.htmlview').html(data.view);
                ele.removeClass('d-none');

                $(".checklist").each(function(index) {
                    var el = $(this);
                    var checkboxes = el.find('input[type=checkbox]');
                    var hidden_input = el.find('input[type=hidden]');
                    var selected_options = JSON.parse(hidden_input.val() || '[]');
                    checkboxes.each(function(key, option) {
                        var id = $(this).val();
                        if (selected_options.map(String).includes(id)) {
                          $(this).prop('checked', 'checked');
                        } else {
                          $(this).prop('checked', false);
                        }
                    });
                });

                $('.checklist input[type="checkbox"]').on('change',function () {
                    // alert('abc');
                    var el = $(this);
                    var element = el.closest('.checklist');
                    var hidden_input = el.closest('.checklist').find('input[type=hidden]');
                    var checkboxes = element.find('input[type=checkbox]');
                    console.log(checkboxes);
                    var newValue = [];
                    checkboxes.each(function() {
                      if ($(this).is(':checked')) {
                        var id = $(this).val();
                        newValue.push(id);
                      }
                    });
                    hidden_input.val(JSON.stringify(newValue));
                });
            }
        });
    });

});


