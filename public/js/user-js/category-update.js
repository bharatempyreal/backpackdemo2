    $(document).on('ready change', '.select-test', function () {
        alert(789)
        var ele = $(document).find('.attributes');
        conceptName = $(this).find("option:selected").val();
        console.log(conceptName)
        if (conceptName == 1 || conceptName == 2) {
            ele.removeClass('d-none');
        } else {
            ele.addClass('d-none');
        }
    });
