jQuery(function(){
    if($('.socialshareprivacy').length > 0){
        $('.socialshareprivacy').socialSharePrivacy({
            'css_path:' : '',
            services: {
                facebook: {
                    dummy_img: 'typo3conf/ext/addthis/Resources/Public/Images/2Click/dummy_facebook.png',
                    txt_info: ''
                },
                twitter: {
                    dummy_img: 'typo3conf/ext/addthis/Resources/Public/Images/2Click/dummy_twitter.png',
                    txt_info: ''
                },
                gplus: {
                    dummy_img: 'typo3conf/ext/addthis/Resources/Public/Images/2Click/dummy_gplus.png',
                    txt_info: ''
                }
            }
        });
    }

});