function startDiv(classes='', html=''){
    var html='<div class="'+classes+'" '+html+'>';
    return html;
}

function inputtext(label = '', name='',classname="",attr=''){
    var html='<div class="col-md-4">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<input type="text" class="input-text '+classname+'" name="'+name+'" placeholder="Enter '+label+'" '+attr+'>';
        html+='</div>';
        html+='</div>';
    return html;
}

function inputemail(label = '', name='',classname="",attr=''){
    var html='<div class="col-md-4">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<input type="email" class="input-text" name="'+name+'" placeholder="Enter '+label+'" '+attr+'>';
        html+='</div>';
        html+='</div>';
  return html;
}

function inputdate(label = '',name='',classname="",attr=''){
    var html='<div class="col-lg-4 col-md-6">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<input type="date" class="input-text" name="'+name+'" placeholder="Select '+label+'" '+attr+'>';
        html+='</div>';
        html+='</div>';
        return html;
}

function textarea(label = '',name='',classname="",attr=''){
    var html='<div class="col-md-12">';
        html+='<div class="form-group mb-0">';
        html+='<label>'+label+'</label>';
        html+='<textarea class="input-text" name="'+name+'" placeholder="'+label+'" '+attr+'></textarea>';
        html+='</div>';
        html+='</div>';
    return html;
}

function adddropzone(label = '',name='',classname="",attr=''){
    var html="";
        // html='<h3 class="heading-2">'+label+'</h3>';
        html+='<div class="col-md-12 dropzone_box">';
        html+='<div id="" class="dropzone dropzone-design mb-50" '+attr+'>';
        html+='<div class="dz-default dz-message"><span>Drop files here to upload</span></div>';
        html+='</div>';
        html+='</div>';
    return html;
}

function chekboxes(label = '',name='',value=[],attr=''){
    var html=''
        html +='<div class="col-md-12">';
        html +='<label class="margin-t-10">'+label+'</label>';
        html +='<div class="row">';
        html +='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        if(value.length>0){
            $.each(value, function( i, v ) {
                if(v.status){
                    html +='<div class="checkbox checkbox-theme checkbox-circle">';
                    html +='<input id="'+v.attribute_name+'" type="checkbox" name="'+v.attribute_name+'" value="1" '+attr+'>';
                    html +='<label for="'+v.attribute_name+'">'+v.attribute_name+'</label>';
                    html +='</div>';
                }
            });
        }
        html +='</div>';
        html +='</div>';
        html +='</div>';
    return html;
}

function select(label='', name='',options=[],attr=''){
    var html='<div class="col-lg-4 col-md-6">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<select class="selectpicker search-fields" name="'+name+'" placeholder="Select '+label+'" '+attr+'>';
        if(options.length>0){
            html+='<option value="">Select '+label+'</option>';
            $.each(options, function( index, value ) {
                if(value.status){
                    html+='<option value="'+value.attribute_name+'">'+value.attribute_name+'</option>';
                }
              });
        }
        html+='</select>';
        html+='</div>';
        html+='</div>';

        return html;
}

function closeDiv(){
    var html='</div>';
    return html;
}

function inputhidden(name='',value='', classname='',attr=''){
    var html="";
        html += '<input type="hidden" class="'+classname+'" name="'+name+'_id" value="'+value+'" '+attr+'>';
    return html;
}

function inputhiddenfordropzone(name='',value='', classname='',attr=''){
    var html="";
        html += '<input type="hidden" class="'+classname+'" name="'+name+'" '+attr+'>';
    return html;
}
