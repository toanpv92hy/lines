/*

jQuery(window).load(function() {

    jQuery(function(){

        var width_window = jQuery( window ).width();

        if(width_window > 767 && width_window < 969){

            console.log('ab');

            jQuery('#portfolio').masonry({

                itemSelector: '.item',

                columnWidth: 183

            });

        }

        if(width_window > 960){

            jQuery('#portfolio').masonry({

                itemSelector: '.item',

                columnWidth: 240

            });

        }





    });

});



jQuery(window).resize(function(){

    var width_window = jQuery( window ).width();

    if(width_window > 767 && width_window < 969){

        console.log('x');

        jQuery(window).load(function() {

            jQuery(function(){

                jQuery('#portfolio').masonry({

                    itemSelector: '.item',

                    columnWidth: 183

                });

            });

        });



    }



    if(width_window > 960){

        jQuery(window).load(function() {

            jQuery(function(){

                jQuery('#portfolio').masonry({

                    itemSelector: '.item',

                    columnWidth: 240

                });

            });

        });

    }

});







*/

