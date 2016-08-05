(function ($, $F) {
    "use strict";

    var defaultPerPage = 10;
    var defaultDataSelector = '.datatable';
    var before = 'Page: ';
    var defaultNextPrevCount = 3;
    var randomClassAppender = (function() {
        var length = 4;
        var rand = 'abcdefghijklmnopqrstuvwxyz';
        var className = '';

        for(var i = 0; i < length; i++) {
            var c = Math.random();
            var r = rand[Math.floor(c * rand.length)];
            className += r;
        }

        return className;
    })();

    $F.pagination = function (option) {
        option = option || {};
        option.before = option.before || before;
        option.dataCount = parseInt(option.dataCount || 1);
        option.perPage = parseInt(option.perPage || defaultPerPage);
        option.url = option.url || null;
        option.nextPrevCount = parseInt(option.nextPrevCount || defaultNextPrevCount);
        option.currentPage = parseInt(option.currentPage || 1);
        option.tpe = option.tpe ? option.tpe : 'table';
        var element;
        if (option.element) {
            element = $(option.element);
        } else {
            if ($('.page-' + randomClassAppender).length) {
                element = $('.page-' + randomClassAppender);
                element.empty();
            } else {
                // Attempt to auto generate pagination after a table
                element = $('<div class="pagination"></div >').addClass('page-' + randomClassAppender);

                // Get all table in the default content element
                // var tab = $('#' + defaultRel + ' table');
                var tab = $(option.tpe);
                if (tab.is(defaultDataSelector)) {
                    tab = tab.filter(defaultDataSelector);
                } else {
                    // Only take the first table found
                    tab = tab.eq(0);
                }

                if(tab.length === 0) {
                    var alertMsg = [];
                    alertMsg.push('Not found any table for pagination.');
                    alertMsg.push('Ensure you have at least one table or a table with "datatable" class name.');
                    alertMsg.push('Alternatively, send the element you want to populate with pagination in "element" property.');
                    console.error(alertMsg.join('\n'));
                    return;
                }

                tab.after(element);
            }
        }

        // If the data is sent instead, count the data
        if (option.data && $.isArray(option.data)) {
            option.dataCount = option.data.length;
        }

        var lastPage = Math.ceil(option.dataCount / option.perPage);
        var paggingInfo = $('<span class="page-display"></span>').text("Page " +option.currentPage+ ' of '+ lastPage);
        var paggingNumberElement = $('<span class="page-number">');
        var paggingElement = $('<span class="page-button">');
        element.html('');		
        paggingElement.html('');		
        paggingNumberElement.html('');		
        // element.append($('<span>' + option.before + '</span>'));
        // element.append($('<a  class="paggings"></a >').text('<<').attr('data-page', 1));
		if (lastPage == 1){
			paggingElement.append($('<a class="prev paggings"></a>').attr('data-page', option.currentPage));
		} else if (option.currentPage > 1) {			
            paggingElement.append($('<a class="prev paggings"></a>').attr('data-page', option.currentPage - 1));
        }

        for (var i = option.currentPage - option.nextPrevCount; i <= option.currentPage + option.nextPrevCount; i++) {
            if (i < 1 || i > lastPage) {
                continue;
            }            
            paggingNumberElement.append($('<a class="item paggings"></a>').text(i).attr('data-page', i));
        }
		
		if (lastPage == 1){
			paggingElement.append($('<a class="next paggings"></a>').attr('data-page', option.currentPage));
		} else if (option.currentPage < lastPage) {        
            paggingElement.append($('<a class="next paggings"></a>').attr('data-page', option.currentPage + 1));
        }

        // element.append($('<li class="paggings"></li>').text('>>').attr('data-page', lastPage));
		
		element.append(paggingInfo);
		element.append(paggingNumberElement);
		element.append(paggingElement);
       
    };
    
    $F.pagination.getClass = function () {
        return randomClassAppender;
    };
    
    $F.pagination.getElement = function () {
        return $('.page-' + randomClassAppender);
    };

})(jQuery, $F);
