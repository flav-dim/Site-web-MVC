$(document).ready(function() {
    $('select').material_select();
     $('.carousel.carousel-slider').carousel({fullWidth: true});

     $(".button-collapse").sideNav({
         menuWidth: 150,
         edge: 'left',
         closeOnClick: true,
     });
     $('.collapsible').collapsible();

    //  add article input image
     $('input[type=file]').change(function(){//lorsquon change/ajoute un fichier
		var files = $(this)[0].files;
        if (files.length > 0) {
            var file = files[0];
			$('.default').attr('src', window.URL.createObjectURL(file));

		}
	});

    // home search by category
    $('li h5 a.showAll').click(function(){
        $('li h5 a.search_cat').css({
            position : "inherit",
            fontWeight : "normal",
            fontStyle : "normal"
        });
        $('.change_title').text('All categories');
        $('.block_article').show();
        $('.block_article').attr('show', '');
        $('input[type=search]').val('');

    });

    $('li h5 a.search_cat').click(function(){
        /*****CSS******/
        $('li h5 a.search_cat').css({
            position : "inherit", fontWeight : "normal", fontStyle : "normal"
        });
        $(this).css({
            position : "relative", left : "20px", fontWeight : "bold", fontStyle : "italic"
        });
        /*****CSS******/


        var idcat = $(this).attr("idcat");
        $('.block_article').hide();//hide all articles
        $('.block_article').attr('show', 'no');//set attribute 'show' to no

        $('.change_title').text("Category "+$(this).text());
        $('.category'+idcat).show();//show only article of this category
        $('.category'+idcat).attr('show', '');//change 'show' to yes
        if($('input[type=search]').val() != ''){
            search();
        }
    });

    // home search by title search bar
    $('input[type=search]').keyup(search);

    function search() {
        $('.block_article').hide();
        var title = $('input[type=search]').val().toLowerCase();
        if(title == ""){
            $('.block_article').show();
            $('td').show();
        } else {
            $('[title*='+title+'][show!="no"]').show();
        }
    }

    $('.author').click(function(){
        console.log($(this).attr('idauthor'));
        $('.block_article').hide();
        $('[author_id="'+$(this).attr('idauthor')+'"]').show();

        if($('input[type=search]').val() != ''){
            search();
        }
    })





  });
