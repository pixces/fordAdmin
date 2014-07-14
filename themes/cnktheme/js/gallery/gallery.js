/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var GALLERY = {
    widget :false,
    previewId :'preview',
    'init' : function(){
      $("#Galleries_gallery_image , .image_upload").live('change',function() {
          if(GALLERY.widget){
             GALLERY.previewId = $(this).attr('preview');
          }
          var gallery_image = this;
          var val = $(this).val();
          var result = GALLERY.checkFileType(val);
          if(result){
              GALLERY.previewImage(gallery_image);
          }
      });  
    },
     checkFileType : function(val){
     switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png': case 'jpeg':
            return true;
            break;
        default:
            $(this).val('');
            // error message here
            alert("not an image");
            return false;
            break;
    }
    },
     previewImage : function(image){
            var $prev = $('#'+GALLERY.previewId);
            if (image.files && image.files[0]) {
                var reader = new FileReader();

                    reader.onload = function (e) {
                        $prev.attr('src', e.target.result);
                    }

                reader.readAsDataURL(image.files[0]);

                $prev.show();
            } else {
                $prev.hide();
            }
     }
};
        
$(document).ready(function(){
        GALLERY.init();
});
