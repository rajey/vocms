$.ajaxSetup({
   	headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


$(document).ready(function() {

   var CreateOrUpdate = (function() {
     /*
      * cacheDOM
      */
     var $company_create = $('#create-company');
     var $company_edit = $('.edit-company');
     var $station_create = $('#create-station');
     var $station_edit = $('.edit-station');
     var $config_create = $('#create-configuration');
     var $config_edit = $('.edit-configuration');
     var $truck_create = $('#create-truck');
     var $truck_edit = $('.edit-truck');
     var $message_area = $('#message');
     var $modal = $('.modal');
     /*
      * bindEvents
      */
    $company_create.on('submit', create);
    $station_create.on('submit', create);
    $config_create.on('submit', create);
    $truck_create.on('submit', create);
    $config_edit.on('submit', update);
    $company_edit.on('submit', update);
    $station_edit.on('submit', update);
    $truck_edit.on('submit', update);

    function create(e) {
      e.preventDefault();
      var $id = $(this).attr('id');
      var $name = $id.slice(7);
      var $url = '/' + $name;
      var $type = 'post';
      /*
       * Get all form fields
       */
      $fields = cacheFormFields($(this));
      /*
       * Serialize form data
       */
      var $data = $(this).serialize();

      ajaxRequest($url, $type, $data, $name, $fields);

    }

    function update(e) {
      e.preventDefault();
      var $class_name = $(this).attr('class');
      var $name = $class_name.slice(5);
      var $id = $(this).find('input[name=id]').val();
      var $url = '/' + $name + '/' + $id;
      var $type = 'put';
      /*
       * Get all form fields
       */
      $fields = cacheFormFields($(this));
      /*
       * Serialize form data
       */
      var $data = $(this).serialize();


      ajaxRequest($url, $type, $data, $name, $fields, $id);

    }

    function ajaxRequest($url, $type, $data, $name, $fields, $id = 0) {
      $.ajax({
        url: $url,
        type: $type,
        data: $data,
        dataType: 'json',
        success: function(data) {
          if(data.success == false) {
            var $errors = data.errors;
            //Check if validation are of update request
            if($id > 0) {
              showValidationErrors($errors, $fields, $id);
            } else showValidationErrors($errors, $fields);
          } else {
            var $message = data.message;
            showSuccess($message, $name);

            setTimeout(function() {
              reloadPage();
            }, 1000);
          }
        }
      });
    }

    function cacheFormFields($form) {
      var $buffer = {};
      $.each($form.find(':input'), function(index, value) {
        $input = $(value);
        if($input.attr('name')) {
          $buffer[$input.attr('name')] = null;
        }
      });
      return $buffer;
    }

    function recompileFields($received, $original) {
      var $fields = $original;
      $.each($received, function(name, error){
        $fields[name] = error
      });
      return $fields;
    }

    function showValidationErrors($errors, $fields, $id = null) {
      $.each(recompileFields($errors,$fields), function(index, value) {
        if($id == null) {
          var $field = '#' + index;
          var $error_field = $field + '-error';
        } else {
          var $field = '#' + index + '-' + $id;
          var $error_field = '#' + index  + '-error-' + $id;
        }

        var $error_message = value;

        if(value == null){
          $($error_field).empty().removeClass('has-error');
          $($field).removeClass('has-error');

        } else {
          $($field).addClass('has-error');
          $($error_field).addClass('has-error');
          $($error_field).empty().append('<span class="help-block app-help-block">' + $error_message + '</span>');
        }
      });
    }

    function reloadPage() {
      var $time = 3;

      setInterval(function() {
        $message_area.empty().fadeIn(3000).append(reloadTemplate($time));
        $time--;
        if($time == 0) {
          location.reload();
        }
      }, 1000);
    }

    function showSuccess($message, $name) {
      var $trigger_id = $('#create-' + $name);
      $trigger_id.trigger('reset');
      $modal.modal('hide');
      $message_area.empty().fadeIn(3000).append(messageTemplate($message));
    }

    function messageTemplate($message) {
      return '<div class="alert alert-success">' +
             '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + $message +
             '</div>';
    }

    function reloadTemplate($time) {
      return '<div class="alert alert-success">' +
             '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Reloading in '+ $time +
             'sec...</div>';
    }

   })();
});
