function toggleclassactive(variable1,variable2,variable3) {
    jQuery(variable1).click(function(event) {
        jQuery(variable2).toggleClass(variable3);
    });
}
jQuery().ready(function($) {
    // Main Lien He
    toggleclassactive('.main-lienhe-tt','.custon-footer-lienhe-tt .footer-show-tt','active');
    toggleclassactive('.main-lienhe-tt','.main-lienhe-tt .icon-down-open','ac-hide');
    toggleclassactive('.main-lienhe-tt','.main-lienhe-tt .icon-up-open','ac-block');
    // Main Khieu Nai
    toggleclassactive('.main-khieunai','.custom-footer-khieunai .footer-show-tt','active');
    toggleclassactive('.main-khieunai','.main-khieunai .icon-down-open','ac-hide');
    toggleclassactive('.main-khieunai','.main-khieunai .icon-up-open','ac-block');
    // Main More Info
    toggleclassactive('.main-moreinfo-tt','.custom-footer-moreinfo .footer-show-tt','active');
    toggleclassactive('.main-moreinfo-tt','.main-moreinfo-tt .icon-down-open','ac-hide');
    toggleclassactive('.main-moreinfo-tt','.main-moreinfo-tt .icon-up-open','ac-block');
    // Main Website
    toggleclassactive('.main-websiteht','.custom-footer-websiteht .footer-show-tt','active');
    toggleclassactive('.main-websiteht','.main-websiteht .icon-down-open','ac-hide');
    toggleclassactive('.main-websiteht','.main-websiteht .icon-up-open','ac-block');
    // Main Followme
    toggleclassactive('.main-followme','.custom-footer-followme .footer-show-tt','active');
    toggleclassactive('.main-followme','.main-followme .icon-down-open','ac-hide');
    toggleclassactive('.main-followme','.main-followme .icon-up-open','ac-block');
    // Single Post Target
    $('.single-post a').removeAttr('target'); 
    $('#wp-admin-bar-my-account > .ab-item > img').attr('alt','Noi dung buc anh');
});