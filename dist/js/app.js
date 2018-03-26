//@format
(function($) {
    /*
 *Intialize Foundation JS components
 */
    //main menu
    $('.menu--main > ul')
        .addClass('dropdown')
        .attr('data-dropdown-menu', '');

    //test
    $('.book-grid').masonry({
        itemSelector: '.book-grid__book',
        columnWidth: '.grid-spacer',
        percentPosition: true,
        gutter: 10
    });
})(jQuery);
