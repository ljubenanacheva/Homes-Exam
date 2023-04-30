jQuery(document).ready(function($) {
    $('.button-wide').on('click', function(e){
        e.preventDefault();

        let home_id = jQuery(this).attr('id') // we'll need this later

        // AJAX Magic
        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action:'softuni_home_like', // PHP function
                home_id: home_id // we need to make this dynamic
            },
            success: function(msg){
                console.log(msg);
            }
        });
    });
});