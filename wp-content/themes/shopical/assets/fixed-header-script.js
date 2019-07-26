jQuery(document).ready(function($){

    // Here You can type your custom JavaScript...

    window.onscroll = function() {myFunction()};
    var prevScrollPos = window.pageYOffset;
    var aboveHeader = document.getElementById("masthead");
    var aboveHeaderHeight = 0;
    if (typeof(aboveHeader) != 'undefined' && aboveHeader != null)
    {
        aboveHeaderHeight = aboveHeader.offsetHeight;
    }
    var header = document.getElementById("site-primary-navigation");
    var sticky = 0;
    if (typeof(header) != 'undefined' && header != null) {
         sticky = header.offsetTop + aboveHeaderHeight + 75;
    }
    function myFunction() {
        var currentScrollPos = window.pageYOffset;
        //console.log(currentScrollPos);
        // console.log(prevScrollPos);
        if ( prevScrollPos > currentScrollPos ) {
            if (sticky > currentScrollPos) {
                //console.log('here we go');
                if (typeof(header) != 'undefined' && header != null) {
                    header.classList.remove("aft-sticky-navigation");
                }
            } else {
                if (typeof(header) != 'undefined' && header != null) {
                    header.classList.add("aft-sticky-navigation");
                }
            }
        }else{
            if (typeof(header) != 'undefined' && header != null) {
                header.classList.remove("aft-sticky-navigation");
            }
        }
        prevScrollPos = currentScrollPos;
    }
});