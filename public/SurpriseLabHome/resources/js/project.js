$(function() {
    // filter tags
    let $filter_category_items = $('#js-category-menu').find('.js-menu-item');
    
    // works
    let $works = $('#js-works-wrap').find('.js-work-item');
    
    // pagination
    let $pagination_wrap = $('#js-pagination-wrap');
    let $pagination_page_wrap = $pagination_wrap.find('.pagination-page-wrap');
    
    let $pagination_prev = $pagination_wrap.find('.prev-item');
    let $pagination_next = $pagination_wrap.find('.next-item');

    let current_category = 'all'; // default
    let max_works_count = 9; // 1 page


    /* Function */

    // Function - pagination works
    function pagination() {
        let $current_works = $works.filter('.category-show');
        let current_works_count = $current_works.length;
        let total_page_count = Math.ceil(current_works_count / max_works_count);
        let whole_page_count = Math.floor(current_works_count / max_works_count);
        let rest_works_count = current_works_count % max_works_count;

        for (let i=0 ; i < total_page_count ; i++) {
            // include start, not include end
            let start_index = i * max_works_count;
            let end_index = 0;

            if ( i+1 <= whole_page_count ) {
                // whole page
                end_index = start_index + max_works_count;
            } else {
                // rest page
                end_index = start_index + rest_works_count;
            }   
            
            let $this_page_items = $current_works.slice(start_index, end_index);
            $this_page_items.wrapAll('<div class="project-content"></div>');

            if ( i == 0 ) {
                $pagination_page_wrap.append(`<li class="pagination-item active">${i+1}</li>`);
            } else {
                $pagination_page_wrap.append(`<li class="pagination-item">${i+1}</li>`);
            }
        }
    }

    // Function - remove pagination page item
    function removePaginationItem() {
        $works.unwrap('.project-content');
        $pagination_page_wrap.empty();
    }

    // Function - scroll to top
    function scrollToTop() {
        $('html, body').animate({
            'scrollTop': 0
        }, 0);
    }

    // Function - hide paginate when only 1 page
    function hidePagination() {
        if ($pagination_page_wrap.children().length <= 1) {
            $pagination_wrap.addClass('hide');
        } else {
            $pagination_wrap.removeClass('hide');
        }
    }


    /* Event Binding */

    // Event - click category tag -- filter works */
    $filter_category_items.on("click", function(){
        $(this).parents('#js-category-menu').find('.js-menu-item').removeClass('active'); // remove all class
        $(this).addClass('active'); // add this class
        current_category = $(this).attr('data-category');

        // all
        if ( current_category == 'all' ) {
            $works.addClass('category-show');
            $works.fadeIn();
        // filter
        } else {
            $works.each(function(index){
                let item_category = $(this).attr('data-category');
        
                if ( item_category == current_category) {
                    $(this).addClass('category-show');
                } else {
                    $(this).removeClass('category-show');
                }
            });
        }

        // remove pagination page item
        removePaginationItem();

        // pagination works
        pagination();

        // back to the first page
        $pagination_page_wrap.find('.pagination-item').eq(0).click();

        // hide paginate when only 1 page
        hidePagination();
    });


    // Event - click pagination -- switch page
    $pagination_page_wrap.on('click', '.pagination-item', function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        // switch pagination
        $('.project-content').hide();
        $('.project-content').eq($(this).index()).fadeIn();

        // scroll to top
        scrollToTop();
    });


    // Event - click pagination prev -- switch page
    $pagination_prev.on("click", function(){
        let $current_page =  $pagination_page_wrap.find('.pagination-item').filter('.active');

        if ( $current_page.prev().length != 0 ) {
            $current_page.prev().click();

            // scroll to top
            scrollToTop();
        }
    });

    // Event - click pagination next -- switch page
    $pagination_next.on("click", function(){
        let $current_page =  $pagination_page_wrap.find('.pagination-item').filter('.active');
        
        if ( $current_page.next().length != 0 ) {
            $current_page.next().click();

            // scroll to top
            scrollToTop();
        }
    });


    /* init */

    // pagination works
    pagination();

    // back to the first page
    $pagination_page_wrap.find('.pagination-item').eq(0).click();

    // hide paginate when only 1 page
    hidePagination();

});