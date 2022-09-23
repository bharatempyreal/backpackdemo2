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
});
