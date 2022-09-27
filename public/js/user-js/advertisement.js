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

    function bpFieldInitCropperImageElement(element) {
            // Find DOM elements under this form-group element
            var $mainImage = element.find('[data-handle=mainImage]');
            var $uploadImage = element.find("[data-handle=uploadImage]");
            var $hiddenImage = element.find("[data-handle=hiddenImage]");
            var $rotateLeft = element.find("[data-handle=rotateLeft]");
            var $rotateRight = element.find("[data-handle=rotateRight]");
            var $zoomIn = element.find("[data-handle=zoomIn]");
            var $zoomOut = element.find("[data-handle=zoomOut]");
            var $reset = element.find("[data-handle=reset]");
            var $remove = element.find("[data-handle=remove]");
            var $previews = element.find("[data-handle=previewArea]");
            // Options either global for all image type fields, or use 'data-*' elements for options passed in via the CRUD controller
            var options = {
                viewMode: 2,
                checkOrientation: false,
                autoCropArea: 1,
                responsive: true,
                preview : element.find('.img-preview'),
                aspectRatio : element.attr('data-aspectRatio')
            };
            var crop = element.attr('data-crop');

            // Hide 'Remove' button if there is no image saved
            if (!$hiddenImage.val()){
                $previews.hide();
                $remove.hide();
            }
            // Make the main image show the image in the hidden input
            $mainImage.attr('src', $hiddenImage.val());


            // Only initialize cropper plugin if crop is set to true
            if(crop){

                $remove.click(function() {
                    $mainImage.cropper("destroy");
                    $mainImage.attr('src','');
                    $hiddenImage.val('');
                    $rotateLeft.hide();
                    $rotateRight.hide();
                    $zoomIn.hide();
                    $zoomOut.hide();
                    $reset.hide();
                    $remove.hide();
                    $previews.hide();
                });
            } else {

                $remove.click(function() {
                    $mainImage.attr('src','');
                    $hiddenImage.val('');
                    $remove.hide();
                    $previews.hide();
                });
            }

            $uploadImage.change(function() {
                var fileReader = new FileReader(),
                        files = this.files,
                        file;

                if (!files.length) {
                    return;
                }
                file = files[0];

                const maxImageSize = {{ $max_image_size_in_bytes }};
                if(maxImageSize > 0 && file.size > maxImageSize) {

                    alert('Please pick an image smaller than '+maxImageSize+'  bytes.');
                } else if (/^image\/\w+$/.test(file.type)) {

                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {

                        $uploadImage.val("");
                        $previews.show();
                        if(crop){
                            $mainImage.cropper(options).cropper("reset", true).cropper("replace", this.result);
                            // Override form submit to copy canvas to hidden input before submitting
                            // update the hidden input after selecting a new item or cropping
                            $mainImage.on('ready cropstart cropend', function() {
                                var imageURL = $mainImage.cropper('getCroppedCanvas').toDataURL(file.type);
                                $hiddenImage.val(imageURL);
                                return true;
                            });


                            $rotateLeft.show();
                            $rotateRight.show();
                            $zoomIn.show();
                            $zoomOut.show();
                            $reset.show();
                            $remove.show();

                        } else {
                            $mainImage.attr('src',this.result);
                            $hiddenImage.val(this.result);
                            $remove.show();
                        }
                    };
                } else {
                    new Noty({
                        type: "error",
                        text: "<strong>Please choose an image file</strong><br>The file you've chosen does not look like an image."
                    }).show();
                }
            });

            //moved the click binds outside change event, or we would register as many click events for the same amout of times
            //we triggered the image change
            if(crop) {
                $rotateLeft.click(function() {
                    $mainImage.cropper("rotate", 90);
                    $mainImage.trigger('cropend');
                });

                $rotateRight.click(function() {
                    $mainImage.cropper("rotate", -90);
                    $mainImage.trigger('cropend');
                });

                $zoomIn.click(function() {
                    $mainImage.cropper("zoom", 0.1);
                    $mainImage.trigger('cropend');
                });

                $zoomOut.click(function() {
                    $mainImage.cropper("zoom", -0.1);
                    $mainImage.trigger('cropend');
                });

                $reset.click(function() {
                    $mainImage.cropper("reset");
                    $mainImage.trigger('cropend');
                });
            }
    }



