function startDiv(classes='', html=''){
    var html='<div class="'+classes+'" '+html+'>';
    return html;
}

function inputtext(label = '', name=''){
    var html='<div class="col-md-4">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<input type="text" class="input-text" name="'+name+'" placeholder="Enter '+label+'">';
        html+='</div>';
        html+='</div>';
    return html;
}

function inputemail(label = '', name=''){
    var html='<div class="col-md-4">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<input type="email" class="input-text" name="'+name+'" placeholder="Enter '+label+'">';
        html+='</div>';
        html+='</div>';
  return html;
}

function inputdate(label = '',name=''){
    var html='<div class="col-lg-4 col-md-6">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<input type="date" class="input-text" name="'+name+'" placeholder="Select '+label+'">';
        html+='</div>';
        html+='</div>';
        return html;
}

function textarea(label = '',name=''){
    var html='<div class="col-md-12">';
        html+='<div class="form-group mb-0">';
        html+='<label>'+label+'</label>';
        html+='<textarea class="input-text" name="'+name+'" placeholder="'+label+'"></textarea>';
        html+='</div>';
        html+='</div>';
    return html;
}

function dropzone(label = '',name=''){
    var html='<h3 class="heading-2">'+label+'</h3>';
        html+='<div id="myDropZone" class="dropzone dropzone-design mb-50">';
        html+='<div class="dz-default dz-message"><span>Drop files here to upload</span></div>';
        html+='</div>';
    return html;
}

function chekboxes(){
    var html=''
        html +='<div class="col-md-12">';
        html +='<label class="margin-t-10">Features</label>';
        html +='<div class="row">';
        html +='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        html +='<div class="checkbox checkbox-theme checkbox-circle">';
        html +='<input id="checkbox1" type="checkbox">';
        html +='<label for="checkbox1">Free Parking</label>';
        html +='</div>';
        html +='<div class="checkbox checkbox-theme checkbox-circle">';
        html +='<input id="checkbox2" type="checkbox">';
        html +='<label for="checkbox2">Air Condition</label>';
        html +='</div>';
        html +='<div class="checkbox checkbox-theme checkbox-circle">';
        html +='<input id="checkbox3" type="checkbox">';
        html +='<label for="checkbox3">Places to seat</label>';
        html +='</div>';
        html +='<div class="checkbox checkbox-theme checkbox-circle">';
        html +='<input id="checkbox4" type="checkbox">';
        html +='<label for="checkbox4">Swimming Pool</label>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
    return html;
}

function select(label='', name='',options=[]){
    var html='<div class="col-lg-4 col-md-6">';
        html+='<div class="form-group">';
        html+='<label>'+label+'</label>';
        html+='<select class="selectpicker search-fields" name="'+name+'" placeholder="Select '+label+'">';
        if(options.length>0){
            $.each(options, function( index, value ) {
                html+='<option value="'+index+'">'+value+'</option>';
              });
        }else{
            html+='<option value="1">Select '+label+'</option>';
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
