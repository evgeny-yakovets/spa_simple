$(document).ready(function(){
    $(document.body).on("click", '.add-text .button', function (event) {
        if($('.add-text .area').val() != '')
        jQuery.ajax({
            type: "POST",
            url: '/php/addArticle.php',
            dataType: 'json',
            data: {functionname: 'add', text: $('.add-text .area').val()},

            success: function (obj, textstatus) {
                console.log(obj.result);
                if( !('error' in obj) ) {
                    $('.articles-container').append('' +
                    '<div  class="article-container hide-text">' +
                        '<div class="article-title">Article №'+obj.result.id+'</div>'+
                        '<div class="article-text">'+obj.result.text+'</div>'+
                    '</div>'
                    );
                    $('.add-text .area').val('');
                }
                else {
                    console.log(obj.error);
                    alert(obj.error);
                }
            },
            error:function(result){
                console.log(result);
                alert(result);
            }
        });
    });

    $(document.body).on("click", '.article-container.show-text', function (event) {
        var titleText = $(event.target).parent();
        titleText.removeClass('show-text');
        titleText.addClass('hide-text');
    });

    $(document.body).on("click", '.article-container.hide-text', function (event) {
        var titleText = $(event.target).parent();
        titleText.removeClass('hide-text');
        titleText.addClass('show-text');
    });
    return false;
});