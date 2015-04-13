$(document).ready(function() {
    $('input').keyup(function(){
        var str = this.value;
        if(str.length!=0) {
            $.getJSON('api/search/' + str, function(data) {
                var myArticles  = '',
                    tab         = [];
                for (var i = 0; i < data.length; i++) {
                    var id = data[i].external_id;
                    if ($('#' + id).size()==0) {
                        tab[i] = id;
//                        myArticles += '<article id="' + id + '">'+
//                            '<img alt="' + data[i].title +'" src="' + data[i].image + '" />' +
//                            '<h2>'+ data[i].title + '</h2>' +
//                        '</article>';
                    }
                    $('article').each(function(){
                        if($.inArray($(this).attr('id'), tab)) {
                            $(this).remove();
                        }
                    });
                }
                $('#films').append(myArticles);
                $('article').on('click',showPopup($(this).attr('id')));
            });
        }
        else {
            $('article').remove();
        }
    });
    
    function showPopup(id){
        $.getJSON('api/films/' + id, function(data) {
            console.log('mabite');
        });
    }
});