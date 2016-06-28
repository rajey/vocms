

$(document).ready(function() {

    $('.add-phone').on('click', function() {
      $('.add-phone').toggle('fast');
      $('.phone-hide').toggle(500);
    });

    $('.close-phone').on('click', function() {
      $('input[name=phone_number_alt]').prop('value', '');
      $('.phone-hide').toggle('fast');
      $('.add-phone').toggle(500);
    });

		$('#nav-button').off('click').on('click', function() {

			if($('#sidebar').hasClass('out')) {

				$('#sidebar').removeClass('out');
				$('#sidebar').addClass('in');
				$('.nav-text').hide();
				$('#sidebar').animate({width: "4%"});
				$('.content-area').animate({"margin-left": "4%"});

			} else if($('#sidebar').hasClass('in')) {

				$('#sidebar').removeClass('in');
				$('#sidebar').addClass('out');
        setTimeout(function() {
          $('.nav-text').show();
        }, 500);
				$('#sidebar').animate({width: "12%"});
				$('.content-area').animate({"margin-left": "12%"});

			}

		});

});
