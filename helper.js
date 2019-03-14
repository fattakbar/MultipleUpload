function preview_images() {
    var total_file=document.getElementById("images").files.length;
    for(var i=0;i<total_file;i++) {
        $('#images').parents('.uploadWrap').append("<div class='span3'>\
            <div class='image_preview' style='background: url("+URL.createObjectURL(event.target.files[i])+");'></div>\
        </div>");
    }
    $('.uploadBtnWrap').show();
}