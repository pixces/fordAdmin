/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var WIDGET = {
    partnersCount :'5',
    init: function() {
        GALLERY.widget = true;
        if($("#add-more-count").length)
            WIDGET.partnersCount = $("#add-more-count").val();
        $("#submit-content").live('click', function(event) {
            var widgetTypeId = $("#widget_type_id").val();
            var stat = WIDGET.validateForm(widgetTypeId);
            if (stat) {
                WIDGET.saveContent();
            }

        });
        $(".add-cnt").on('click', function(event) {
            WIDGET.loadContentForm(this);
        });
        $(".add-mre").live('click',function(event){
            var res ='<tr id="row-5">'+
                    '<td><input type="hidden" name="Widget[image'+WIDGET.partnersCount+']" value="" id="ytWidget_image'+WIDGET.partnersCount+'"><input type="file" id="Widget_image'+WIDGET.partnersCount+'" name="Widget[image'+WIDGET.partnersCount+']" class="image_upload" maxlength="255" size="60"  preview ="preview'+WIDGET.partnersCount+'">'+
                    '<img id="preview'+WIDGET.partnersCount+'" src="#" alt="your image" style="display:none;height:150px;width:150px"/></td>'+
                    '<td><input type="text" id="Widget_link_url_'+WIDGET.partnersCount+'" name="Widget[link_url]['+WIDGET.partnersCount+']" class="input-xxlarge" maxlength="250" size="60"></td>'+
                    '<td><span class="add-mre"><i class="icon-plus-sign"></i> </span></td>'
                    '</tr>';
                    $(".add-more-cont").append(res);
                    WIDGET.partnersCount++;
        });
        $(".add-more").live('click',function(event){
           var count = $('.hide-cont #section-counter').attr('data-attr');
           count++;
           $('.hide-cont #section-counter').attr('data-attr',count);
           $('.hide-cont #section-count').html(count);
           $('.hide-cont #hidden-accrodian').clone().appendTo( ".add-more-cont" );
           $('.hide-cont #section-counter').attr('data-attr',count)
        });
        
        $('.hidden-accrodian').hide();

    },
    saveContent: function() {
        // prepare Options Object 
        var options = {
            url: SITE_URL + '/widget/saveContent',
            success: function(data) {
               alert(data);
                window.location = SITE_URL + "/widget/index/";
               return false;
            }
        };
        // pass options to ajaxForm 
        $('#widget-form').ajaxForm(options).submit();
    },
    validateForm: function(widgetTypeId) {
        var widgetName = $.trim($("#Widget_name").val());
        if (widgetName == '' || widgetName == ' ') {
            alert("Please Enter The Widget Name");
            return false;
        }
        return true;
//        switch(widgetTypeId){
//            case '1':
//                
//        }
    },
    loadContentForm: function(e) {
        var name = $(e).attr('name-attr');
        var formName = $(e).attr('form-attr');
        var id = $(e).attr('id-attr');
        $.ajax({
            url: SITE_URL + '/widget/loadContentForm',
            data: {widgetType: name, widgetForm: formName},
            type: 'POST',
            success: function(data) {
                $(".content-form-container").html(data);
                $("#widget_type_id").val(id);
                if ($("#Widget_countdown_time").length){
                    //$('#Widget_countdown_time').datetimepicker();
                }else{
                    $('.xdsoft_datetimepicker').html('');
                }
            },
            error: function() {
                return false;
            }
        });
    },
};
$(document).ready(function() {
    WIDGET.init();
});