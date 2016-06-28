$(document).ready(function() {
  /*
  * Get district list on region change
  */
  var district =(function(){
    /*
     * cacheDOM
     */
     var $region = $('.region_select');
     var $default_option = '<option value="" selected="selected" disabled="disabled">--select--</option>';

     /*
      * bindEvents
      */
     $region.on('change',getDistrict);


     function render($data, $district) {
        $district.empty().append($default_option);
        $.each($data, function(index, value) {
          $district.append('<option value="' + value.id + '">' + value.name + '</option>');
        });
      }


     function getDistrict() {
       /*
        * get district area
        */
       var $parent = $(this).parentsUntil('form');
       var $select = $parent.find('.district select');
       var $district_id = $select.attr('id');
       console.log($district_id);
       var $district_show = $('#' + $district_id);
       $data = $(this).serializeArray();
       var $region_id = $data[0].value;
       var $url = '/get-district/'+ $region_id;
        $.get($url, function(data) {
          var $data = data;
          render($data, $district_show);
        });
      }
  })();
});
