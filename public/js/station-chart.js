$(document).ready(function() {

  var Report = (function(){

    /*
     * Settings
     */
     var $options = {
       scaleBeginAtZero : true,
       scaleShowGridLines : true,
       scaleGridLineColor : "rgba(0,0,0,.05)",
       scaleGridLineWidth : 1,
       scaleShowHorizontalLines: true,
       scaleShowVerticalLines: true,
       barShowStroke : true,
       barStrokeWidth : 2,
       barValueSpacing : 5,
       barDatasetSpacing : 1,
       legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
     };
     var $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    /*
     * cache DOM
     */
    var $modal_button = $('.modal');
    var $year_select = $('.year-select');

    /*
     * bind events
     */
    $modal_button.on('shown.bs.modal', getData);
    $year_select.on('change', getData);


    function getData(e) {
      e.preventDefault();
      /*
       * Find data area for this modal
       */
      if($(this).hasClass('modal')) {
        var $modal = $(this);
      } else {
        var $modal = $(this).parentsUntil('div .modal');
      }
    	var $canvas = $modal.find('.modal-body canvas');
      var $context = $canvas[0].getContext("2d");

      /*
       * Cache form Data
       */
      var $form = $modal.find('form');
      var $form_data = $form.serializeArray();
      var $id = $form_data[1].value;
      var $year = $form_data[2].value;

      renderTitle($id, $year);
      /*
       * render spinner
       */

      renderSpinner($id);

      $data = ajaxRequest($id, $year, $context);

    }

    function ajaxRequest($id, $year, $ctx) {
      $.ajax({
        url: '/station-report/' + $id + '/' + $year,
        type: 'get',
        dataType: 'json',
        success: function(data) {
          $set_data = setData(data, $labels);
          removeSpinner($id);
          renderData($set_data, $options, $ctx);
        }
      });
    }

    function setData($data, $labels) {
      return {
        labels: $labels,
        datasets: [
          datasetForWeighed($data.weighed),
          datasetForOverloaded($data.overloaded)
        ]
      };
    }
    function renderSpinner($id) {
      var $wait_area = $('#wait-'+$id);
      $wait_area.empty().append('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
    }

    function removeSpinner($id) {
      var $wait_area = $('#wait-'+$id);
      $wait_area.empty();
    }

    function renderTitle($id, $year) {
      var $year_id = $('#year-' + $id);
      $year_id.empty().append($year);
    }

    function renderData($data, $options, $ctx) {

      var $stationBar = new Chart($ctx).Bar($data, $options);
    }

    function datasetForWeighed($data) {
      return {
            label: "Vehicle Weighed",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: $data
            }
    }

    function datasetForOverloaded($data) {
      return {
            label: "Vehicle Overloaded",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: $data
            }
    }

  })();
});
