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
            }
        });
    });
    $(window).on("load", function () {
        var action = $('#action').data('action');
        var id = $('input[name=id]').val();
        selected = $(document).find("option:selected").val();
        // console.log(selected);
        var ele = $(document).find('.htmlview');

        $.ajax({
            url: action,
            type: "GET",
            data: {selected,id},
            dataType: 'json',
            success: function (data) {
                ele.add('.htmlview').html(data.view);
                ele.removeClass('d-none');
            }
        });
    });
});
