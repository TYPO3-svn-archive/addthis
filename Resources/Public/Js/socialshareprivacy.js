jQuery(function(){
    if($('.socialshareprivacy').length > 0){
		var imgFacebook = $('#tx_addthis_socialshareprivacy_dummy_facebook');
		var imgTwitter = $('#tx_addthis_socialshareprivacy_dummy_twitter');
		var imgGplus = $('#tx_addthis_socialshareprivacy_dummy_gplus');

        $('.socialshareprivacy').socialSharePrivacy({
            'css_path:' : '',
            services: {
                facebook: {
                    dummy_img: imgFacebook.attr('src'),
					dummy_img_width: imgFacebook.attr('width'),
					dummy_img_height: imgFacebook.attr('height'),
                    txt_info: ''
                },
                twitter: {
                    dummy_img: imgTwitter.attr('src'),
					dummy_img_width: imgTwitter.attr('width'),
					dummy_img_height: imgTwitter.attr('height'),
                    txt_info: ''
                },
                gplus: {
                    dummy_img: imgGplus.attr('src'),
					dummy_img_width: imgGplus.attr('width'),
					dummy_img_height: imgGplus.attr('height'),
                    txt_info: ''
                }
            }
        });
    }
});