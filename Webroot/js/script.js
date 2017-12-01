$(document).ready(function() {
    $('select').material_select();
     $('.carousel.carousel-slider').carousel({fullWidth: true});

     $(".button-collapse").sideNav({
         menuWidth: 150,
         edge: 'left',
         closeOnClick: true,
     });

     $('input[type=file]').change(function(){//lorsquon change/ajoute un fichier
		var files = $(this)[0].files;
        if (files.length > 0) {
            var file = files[0];
			$('.default').attr('src', window.URL.createObjectURL(file));
			
		}
	});




  });
