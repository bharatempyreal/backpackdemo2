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
                $('form').attr('enctype', 'multipart/form-data');
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

                    Dropzone.autoDiscover = false;
                    var uploaded = false;
                    var newValue = [];
                    var oldValue = [];

                    var dropzone = new Dropzone(".dropzone", {
                        url: $('.ajaxUploadImages').data('action'),
                        uploadMultiple: true,
                        parallelUploads: 10,
                        addRemoveLinks: true,
                        sending: function(file, xhr, formData) {
                            formData.append("_token", $('[name=_token').val());
                        },
                        error: function(file, response) {
                            console.log('error');
                            $(file.previewElement).find('.dz-error-message').remove();
                            $(file.previewElement).remove();
                        },removedfile: function(file) {
                            console.log(file.name);
                            $.ajax({
                                url: $('.ajaxremoveImages').data('removeaction'),
                                type: 'POST',
                                data: {
                                    file: file.name,
                                },
                            });

                            var checkimage = $.inArray(file.name, newValue);
                            if (checkimage != -1) {
                                newValue.splice(checkimage, 1);
                                $('.dropzone_hidden').val(newValue);
                                file.previewElement.remove();
                            }
                            // console.log(newValue);
                        },
                        success : function(file, status) {
                            var value  = file.name;
                            if(value != ''){
                                newValue.push(value);
                            }
                            $('.dropzone_hidden').val(newValue);
                            // console.log(newValue);
                        }
                    });
                    // Reorder images
                    $(".dropzone").sortable({
                        items: '.dz-preview',
                        cursor: 'move',
                        opacity: 0.5,
                        containment: '.dropzone',
                        distance: 20,
                        scroll: true,
                        tolerance: 'pointer',
                        stop: function (event, ui) {
                            // console.log('sortable stop');
                            var image_order = [];
                            $('.dz-preview').each(function() {
                                var image_id = $(this).data('id');
                                var image_path = $(this).data('path');
                                image_order.push({ id: image_id, path: image_path});
                            });
                        }
                    });
                    $(document).on('click','.dz-preview a', function (e){
                        alert('delete');
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
                // console.log(data);
                $('form').attr('enctype', 'multipart/form-data');
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
                var hidden = $(document).find('.dropzone_hidden');
                var hidden_val = JSON.parse(hidden.val() || '[]');
                console.log(hidden_val);
                // console.log(hid_arr.pop());
                // $.ajax({
                //     url: $('.ajaxremoveImages').data('removeaction'),
                //     type: 'POST',
                //     data: {
                //         file: file.name,
                //     },
                // });
                $(hidden_val).each(function(key ,image_path) {
                    console.log(image_path);
                    // $('.dropzone').append('<div class="dz-preview" data-id="'+key+'" data-path="'+image_path+'"><img class="dropzone-thumbnail" src="{{ url() }}/'+image_path+'" /><a class="dz-remove" href="javascript:void(0);" data-remove="'+key+'" data-path="'+image_path+'">Remove file</a></div>');
                });

                Dropzone.autoDiscover = false;
                    var uploaded = false;
                    var newValue = [];
                    var oldValue = [];
                    var dropzone = new Dropzone(".dropzone", {
                        url: $('.ajaxUploadImages').data('action'),
                        uploadMultiple: true,
                        parallelUploads: 10,
                        addRemoveLinks: true,
                        sending: function(file, xhr, formData) {
                            formData.append("_token", $('[name=_token').val());
                        },
                        error: function(file, response) {
                            console.log('error');
                            $(file.previewElement).find('.dz-error-message').remove();
                            $(file.previewElement).remove();
                        },removedfile: function(file) {
                            console.log(file.name);
                            $.ajax({
                                url: $('.ajaxremoveImages').data('removeaction'),
                                type: 'POST',
                                data: {
                                    file: file.name,
                                },
                            });
                            var checkimage = $.inArray(file.name, newValue);
                            if (checkimage != -1) {
                                newValue.splice(checkimage, 1);
                                $('.dropzone_hidden').val(newValue);
                                file.previewElement.remove();
                            }
                            // console.log(newValue);
                        },
                        success : function(file, status) {
                            console.log(status);
                            var value  = file.name;
                            if(value != ''){
                                newValue.push(value);
                            }
                            $('.dropzone_hidden').val(newValue);
                            // console.log(newValue);
                            $.each(status.images, function(key, image_path) {

                                $('.dropzone').append();
                            });
                        }
                    });
                    // Reorder images
                    $(".dropzone").sortable({
                        items: '.dz-preview',
                        cursor: 'move',
                        opacity: 0.5,
                        containment: '.dropzone',
                        distance: 20,
                        scroll: true,
                        tolerance: 'pointer',
                        stop: function (event, ui) {
                            // console.log('sortable stop');
                            var image_order = [];
                            $('.dz-preview').each(function() {
                                var image_id = $(this).data('id');
                                var image_path = $(this).data('path');
                                image_order.push({ id: image_id, path: image_path});
                            });
                        }
                    });
            }
        });
    });

});






