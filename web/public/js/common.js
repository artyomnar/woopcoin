$(function() {

	// Custom JS

    $('.search-block__icon').on('click', function (e) {
        e.preventDefault();
        var link = $(this),
            linkSvg = link.find('svg'),
            searchBlockCnt = $('.search-block__cnt'),
            searchBlockButton = searchBlockCnt.find('button'),
            searchBlockInput = searchBlockCnt.find('input');
        searchBlockCnt.show();
        searchBlockInput.focus();
        searchBlockButton.html(linkSvg);
        link.hide();
    });

    $('.currency-list__icon').on('click', function (e) {
        e.preventDefault();
        var link = $(this),
            currencyList = link.parent('.currency-list'),
            quotationsItem = link.parents('.quotations__item'),
            currencyListDropdown = currencyList.find('.currency-list__dropdown');

        currencyListDropdown.show();
        quotationsItem.css({'z-index': 4});
        var getLow = function () {
            quotationsItem.css({'z-index': 1});
        };

        hideClickedOut(currencyListDropdown, getLow)
    });

    $('#subscribeLink').on('click', function (e) {
        e.preventDefault();
        var subscribePopup = $('#subscribePopup'),
            closeLink = subscribePopup.find('.close-link');

        subscribePopup.show();

        closeLink.on('click', function (e) {
            e.preventDefault();
            subscribePopup.hide();
        });

        hideClickedOut(subscribePopup)
    });
});

var t;
function up() {
    var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
    if(top > 0) {
        window.scrollBy(0,-100);
        t = setTimeout('up()',20);
    } else clearTimeout(t);
    return false;
}

function hideClickedOut(selector, callback) {
    $(document).mouseup(function (e) {
        var container = $(selector);
        if (container.has(e.target).length === 0){
            container.hide();
            if(callback !== undefined) {
                callback();
            }
        }
    });
}
