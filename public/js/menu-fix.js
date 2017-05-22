jQuery(document).ready(function() {

    jQuery('#nav-menu-wrapper-sm li a:not(:only-child)').each(function() {

        jQuery(this).on({
            click: function() {
                jQuery(this).preventDefault();
                toggleMenu(this);
            }
        });
    });
});

function toggleMenu( elem ) {

    jQuery( elem + ' ul').toggle();
}
