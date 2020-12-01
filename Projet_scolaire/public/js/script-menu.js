$(document).ready(function () {
    var data = {
        menu: [{
            name: 'Home',
            link: 'home'
        }, {
            name: 'News',
            link: 'news'
            }, {
                name: '',
                link: 'home'
            }, {
            name: 'Road Map',
            link: 'road_map'
            },  {
            name: 'FAQ',
            link: 'faq'
            }]
    };
    var getMenuItem = function (itemData) {
        var item = $("<li>")
            .append(
        $("<a>", {
            href: 'index.php?page=' + itemData.link,
            html: itemData.name
        }));
        return item;
    };
    
    var menu = $("#menu");
    $.each(data.menu, function () {
        menu.append(
            getMenuItem(this)
        );
    });
});

