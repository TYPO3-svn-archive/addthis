jQuery(function(){
    if($('.socialshareprivacy').length > 0){
        $('.socialshareprivacy').socialSharePrivacy({
            'css_path:' : '',
            services: {
                facebook: {
                    dummy_img: $('#tx_addthis_socialshareprivacy_dummy_facebook').attr('src'),
                    txt_info: ''
                },
                twitter: {
                    dummy_img: $('#tx_addthis_socialshareprivacy_dummy_twitter').attr('src'),
                    txt_info: ''
                },
                gplus: {
                    dummy_img: $('#tx_addthis_socialshareprivacy_dummy_gplus').attr('src'),
                    txt_info: ''
                }
            }
        });
    }

});