/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CONTENT = {
    'contentType': '',
    'youtubeUrl': '',
    'videoId': '',
    'gallery_id': '',
    'youtubeApiUrl': $('youtubeApiUrl').attr('href'),
    'createUrl' :'saveContent',
    init: function() {
        $("#submit-content").live('click', function(event) {
            CONTENT.contentType = $("#Content_type").val();
            var stat = CONTENT.validateForm();
            if (stat) {
                CONTENT.saveContent();
            }
        });
        $(".add-cnt").on('click', function(event) {
            CONTENT.loadContentForm(this);
        });
    },
    saveContent: function() {
        // prepare Options Object 
        //
        if($("#is_new").val() == 0){
            //edit content
            CONTENT.gallery_id = $('#Content_gallery_id').val();
        }
        var options = {
            url: SITE_URL+'/content/saveContent?gallery='+ CONTENT.gallery_id,
            success: function(data) {
                window.location = SITE_URL+"/gallery/view/"+CONTENT.gallery_id;
                return false;
            }
        };
        // pass options to ajaxForm 
        $('#content-form').ajaxForm(options).submit();
    },

    loadContentForm: function(e) {
        var type = $(e).attr('data-attr');
        CONTENT.gallery_id = $(e).attr('gallery');
        var url =SITE_URL+'/content/loadContentForm';
        $.ajax({
            url: url,
            data: {contentType: type, gallery:CONTENT.gallery_id},
            type: 'POST',
            success: function(data) {
                $(".content-form-container").html(data);
                $("#Content_gallery_id").val(CONTENT.gallery_id);
            },
            error: function() {
                return false;
            }
        });
    },
    validateForm: function() {
        switch (CONTENT.contentType) {
            case 'image':
                
                var imageVal = $.trim($(".image_upload").val());
                if (imageVal == '' || imageVal == ' ') {
                    if($("#is_new").val() == 0)
                       return true;
                    
                    $(".errorMessage").html('Please Upload an Image');
                    return false;
                } else {
                    var rs = GALLERY.checkFileType(imageVal);
                    if(rs)
                        return CONTENT.formValidate();
                    return rs;
                }
                break;
            case 'video':
               var media_url = $.trim($("#Content_media_url").val());
               if($("#is_new").val() == 0){
                        //edit content
                        if(media_url != $.trim($("#hidden-url").val())){
                            //change
                            if($("#submit-content").val()=='Save Text Content')
                            $("#submit-content").val('Fetch Video Content');
                        }
                }
               var text =  $("#submit-content").val();
               if(text == 'Fetch Video Content'){
                 if (this.youtubeApiUrl != media_url){
                    this.youtubeUrl = $("#Content_media_url").val();
                    var test = this.getYoutubeVideoId();
                    return false;
                 }
             }else{
                return CONTENT.formValidate();
             }
           
            default :

                return CONTENT.formValidate();
                break;
        }
    },
    formValidate : function(){
        
        var title = $.trim($("#Content_title").val());
        var desc = $.trim($("#Content_description").val());
        if (title == '' || title == ' ') {
            alert('Title Canot be blank...');
            return false;
        }
        if (desc == '' || desc == ' ') {
            alert('Description Canot be blank...');
            return false;
        }        
        return true;
    },
    getYoutubeVideoId: function() {
        if (this.youtubeUrl != '' && this.youtubeUrl != ' ') {
            var videoid = this.youtubeUrl.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
            if (videoid != null) {
                this.videoId = videoid[1];
                var rs = this.getYoutubeVideoDetails();
                return rs;

            }
        } else {
            alert("The youtube url is not valid.");
            return false;
        }
    },
    getYoutubeVideoDetails: function() {
        var youtubeApiUrl = this.youtubeApiUrl+this.videoId + '?v=2&alt=json';
        var flag = false;
        $.ajax({
            async: false,
            url: youtubeApiUrl,
            dataType: 'json',
            //async :false,
            success: function(data) {
                var rs = CONTENT.parseYoutubeData(data);
                flag = true;

            },
            error: function() {
                alert("Enter a Valid Youtube Url####");
                flag = false;

            }
        });
        return flag;
    },
    parseYoutubeData: function(data) {
        
        var videoId = data.entry.media$group.yt$videoid.$t;
        var author = data.entry.author[0].name.$t;
        var thumb_image = data.entry.media$group.media$thumbnail[0].url;
        var alternate_image = data.entry.media$group.media$thumbnail[2].url;
        var view = data.entry.yt$statistics.viewCount;
        var title = data.entry.title.$t;
        var description = data.entry.media$group.media$description.$t;
        
        $("#author").val(author);
        $("#thumb_image").val(thumb_image);
        $("#alternate_image").val(alternate_image);
        $("#view").val(view);
        $("#Content_title").val(title);
        $("#Content_description").val(description);
        $("#submit-content").val('Add Video Content');
        $("#media_id").val(videoId);
        alert("Video Details Fetched");
        return true;
    }
};
$(document).ready(function() {
    CONTENT.init();
});
