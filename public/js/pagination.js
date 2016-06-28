$(document).ready(function() {

  var pagination = (function(){

    /*
     * cacheDOM
     */
    var $body = $('body');
    var $pagination_button = '.pagination a';
    var $pagination_area = $('.page');

    /*
     * bind events
     */
    //
    // $body.on('click', $pagination_button, getPage);
    //
    // function getPage(e) {
    //   e.preventDefault();
    //   var $url = $(this).attr('href');
    //
    //   $.get($url, function(data){
    //     $pagination_area.empty().append(data);
    //   });
    //
    // }


  })();
});
