$(document).ready(function(){

  var Statistics = (function() {
    /*
     * cacheDOM
     */
     var $body = $('#statistics-body');
     var $search = $('#search-statistics');
     var $button = $('#statistics-button');
     var $year = $('#year');
     var $month = $('#month');

     /*
      * bindEvents
      */
      $search.on('submit', getStatistics);

      function getStatistics(e) {
        e.preventDefault();
        $data = $(this).serialize();
        waitTemplate();
        ajaxRequest($data);
      }

      function ajaxRequest($data) {
        $.ajax({
          url: '/company-statistics',
          type: 'post',
          data: $data,
          dataType: 'json',
          success: function(data) {
            var $data = data.data;
            var $period = data.time;
            renderTitle($period);
            if($data.length > 0) {
              render($data);
            } notFound();
          }
        });
      }

      function waitTemplate() {
        $body.empty().append('<td colspan="5" class="text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></td>');
      }

      function notFound() {
        $body.empty().append('<td colspan="5" class="text-center"><h4 class="text-danger">Data cannot be found!!</h4></td>');
      }

      function render($data) {
        $body.empty();
        $.each($data, function(index, value){
          $body.append('<tr><td>'+(index+1)+'</td><td>'+value.name+'</td><td>'+value.weighed+'</td><td>'+value.overloaded+'</td><td>'+value.percentOverload+'%</td></tr>');
        });
      }

      function renderTitle($period) {
        $year.empty().append($period.year);
        var $name = monthName($period.month);
        $month.empty().append($name);
      }

      function monthName($id) {
        var $list = {
          1: 'January',
          2: 'February',
          3: 'March',
          4: 'April',
          5: 'May',
          6: 'June',
          7: 'July',
          8: 'August',
          9: 'September',
          10: 'October',
          11: 'November',
          12: 'December'
        };

        $.each($list, function(index, value) {
          if($id == index) {
            $name = value;
          }
        });
        return $name;

      }
  })();
})
