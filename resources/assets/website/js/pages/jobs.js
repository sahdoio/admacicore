(function () {
    $(window).on('load',function() {
        setupMansoryGrid('.grid','.grid-item');

        $(window).on('resize',function(e) {
            setupMansoryGrid('.home-jobs-grid','.home-jobs-grid-item');
        });
        console.log("WORKS");
    });

    function setupMansoryGrid(grid, item) {
        var _grid = jQuery(grid);
        var _item = jQuery(item);
        var winWidth = _grid.width();

        if (screenMatch(401, 800)) {
            width = winWidth/3;
            _item.css('width','48%');
        }
        else if (screenMatch(0, 400)) {
            width = winWidth/2;
            _item.css('width','48%');
        }
        else {
            var width = winWidth/4;
            _item.css('width','48%');
        }

        _grid.masonry({
            itemSelector: item,
            columnWidth: width,
            percentPosition: true
        })
            .masonry();
    }

    function screenMatch(min_width, max_width) {
        var max_width = max_width || 100000;
        var min_width = min_width || 0;
        var max_check = window.matchMedia("(max-width: "+max_width+"px)").matches;
        var min_check = window.matchMedia("(min-width: "+min_width+"px)").matches;

        return max_check && min_check;
    }
})();
