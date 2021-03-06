function in_array(needle, haystack, argStrict) {
    var key = '',
        strict = !! argStrict;

    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;
            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {
                return true;
            }
        }
    }

    return false;
}

$(function() {
    foursquareTips = new foursquareTips();
    foursquareTips.init();
    foursquareImages = new foursquareImages();
    foursquareImages.init();
    instagramImages = new instagramImages();
    instagramImages.init();
    $('#loadFsTips').click(function(){
        foursquareTips.load();
    });
    $('#loadFsImages').click(function(){
        foursquareImages.load();
    });
    $('#loadInstagramImages').click(function(){
        instagramImages.load();
    });
});
function foursquareTips() {
    var foursquareTips = this;
    var options  = {};

    foursquareTips.init = function() {
        foursquareTips.tabs();
        foursquareTips.add();
        $('.loader').hide();
    }

    foursquareTips.tabs = function() {
        $('a[data-toggle="tab"]').on('shown', function (e) {
            var elementId = e.target.toString().match(/#.+/gi)[0];
            var content = $(elementId).find(".content_tips");
            if (content.find('.fstip').length < 1) {
                foursquareTips.load(elementId.substring(1), content);
            };

        })
    }

    foursquareTips.add = function() {
        $(document).on('click', '.fstip .add', function(){
            var loader = $(this).parent('.mt_footer').find('.loader');
            var container = $(this).parents('.fstip');

            var hash = container.attr('id');
            var type = 'fstips';
            var act = 'wbb_bar_feed_add';

            loader.show();
            //feed/remove/{type}/{hash}/{bar}
            if($(this).is(':checked')){
                act = 'wbb_bar_feed_remove';
            }else{
                act = 'wbb_bar_feed_add';
            }
            $.ajax({
                type: "GET",
                url: Routing.generate(
                    act,
                    { type: type, hash: hash, bar: barId}
                ),
                dataType: "json",
                success: function(msg) {
                    loader.hide();
                },
                error: function(e) {
                    console.log('Error : ' + e);
                }
            });
        });
    }

    foursquareTips.load = function() {
        var offset = $('.fstip').length;
        var container = $('.content_tips');
        var type = "fstips";
        var loader = $(container).parent('.tips').find('.tips_action .loader');
        loader.show();
        $('.btload').hide();
        var url;
        if(typeof offset != 'undefined' && offset!= null && offset!=""){
            url = Routing.generate('wbb_bar_feeds_find', { type: "fstips", id: venue, offset: offset});
        }else{
            url = Routing.generate('wbb_bar_feeds_find', { type: "fstips", id: venue, offset: 0})
        }
        $.ajax({
            type: "POST",
            url:  Routing.generate('wbb_bar_feeds_list',
                { type: "fstips", bar: barId}),
            dataType: 'json',
            success: function(r) {

                $.ajax({
                    type: "POST",
                    url:  url,
                    dataType: 'json',
                    success: function(response) {
                        loader.hide();
                        $('.btload').show();
                        var template = null;

                        //// TODO COUNT THE POST GETED AND COMPARE WITH THE TOTAL ////

                        //////////////////////////////////////////////////////////////
                        $.each(response.data, function(key, feed){
                            var tipsHtml = $("#tips").html();
                            var checked = "checked";
                            if(in_array(feed.id, r)) {
                                checked = "";
                            }
                            template = tipsHtml.format(
                                feed.id, feed.text, feed.likes.count, feed.user.firstName, feed.user.photo.prefix+'40x40'+feed.user.photo.suffix, checked
                            );

                            container.append(template);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                        loader.hide();
                    }
                });
            },
            error: function(e) {
                console.log(e);
            }
        });
    }
}

function foursquareImages() {
    var foursquareImages = this;
    var options  = {};

    foursquareImages.init = function() {
        foursquareImages.tabs();
        foursquareImages.add();
        $('.loader').hide();
    }

    foursquareImages.tabs = function() {
        $('a[data-toggle="tab"]').on('shown', function (e) {
            var elementId = e.target.toString().match(/#.+/gi)[0];
            var content = $(elementId).find(".content_imgs");

            if (content.find('.fsimg').length < 1) {
                foursquareImages.load(elementId.substring(1), content);
            };

        })
    }

    foursquareImages.add = function() {
        $(document).on('click', '.fsimg .add', function(){
            var loader = $(this).parent('.mt_footer').find('.loader');
            var container = $(this).parents('.fsimg');

            var hash = container.attr('id');
            var type = 'fsimgs';
            var act = 'wbb_bar_feed_add';

            loader.show();
            //feed/remove/{type}/{hash}/{bar}
            if($(this).is(':checked')){
                act = 'wbb_bar_feed_add';
            }else{
                act = 'wbb_bar_feed_remove';
            }
            $.ajax({
                type: "GET",
                url: Routing.generate(
                    act,
                    { type: type, hash: hash, bar: barId}
                ),
                dataType: "json",
                success: function(msg) {
                    loader.hide();
                },
                error: function(e) {
                    console.log('Error : ' + e);
                }
            });
        });
    }

    foursquareImages.load = function() {
        var offset = $('.fsimg').length;
        var type = "fsimgs";
        var container = $('.content_imgs');
        var loader = $(container).parent('.imgs').find('.imgs_action .loader');
        loader.show();
        $('.btload').hide();
        var url;
        if(typeof offset != 'undefined' && offset!= null && offset!=""){
            url = Routing.generate('wbb_bar_feeds_find', { type: "fsimgs", id: venue, offset: offset});
        }else{
            url = Routing.generate('wbb_bar_feeds_find', { type: "fsimgs", id: venue, offset: 0})
        }
        $.ajax({
            type: "POST",
            url:  Routing.generate('wbb_bar_feeds_list',
                { type: "fsimgs", bar: barId}),
            dataType: 'json',
            success: function(r) {
                $.ajax({
                    type: "POST",
                    url:  url,
                    dataType: 'json',
                    success: function(response) {
                        loader.hide();
                        $('.btload').show();
                        var template = null;
                        $.each(response.data, function(key, feed){
                            //console.log(feed);
                            var imgsHtml = $("#imgs").html();
                            var checked = "";
                            if(in_array(feed.id, r)) {
                                checked = "checked";
                            }
                            template = imgsHtml.format(
                                feed.id, feed.prefix+"200x200"+feed.suffix, checked
                            );

                            container.append(template);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                        loader.hide();
                    }
                });
            },
            error: function(e) {
                console.log(e);
            }
        });



    }
}

function instagramImages() {
    var instagramImages = this;
    var options  = {};

    instagramImages.init = function() {
        instagramImages.tabs();
        instagramImages.add();
        $('.loader').hide();
    }

    instagramImages.tabs = function() {
        $('a[data-toggle="tab"]').on('shown', function (e) {
            var elementId = e.target.toString().match(/#.+/gi)[0];
            var content = $(elementId).find(".content_instimgs");

            if (content.find('.instimg').length < 1) {
                instagramImages.load(elementId.substring(1), content);
            };

        })
    }

    instagramImages.add = function() {
        $(document).on('click', '.instimg .add', function(){
            var loader = $(this).parent('.mt_footer').find('.loader');
            var container = $(this).parents('.instimg');

            var hash = container.attr('id');
            var type = 'instagram';
            var act = 'wbb_bar_feed_add';

            loader.show();
            //feed/remove/{type}/{hash}/{bar}
            if($(this).is(':checked')){
                act = 'wbb_bar_feed_remove';
            }else{
                act = 'wbb_bar_feed_add';
            }
            $.ajax({
                type: "GET",
                url: Routing.generate(
                    act,
                    { type: type, hash: hash, bar: barId}
                ),
                dataType: "json",
                success: function(msg) {
                    $('.btload').show();
                },
                error: function(e) {
                    console.log('Error : ' + e);
                }
            });
        });
    }

    instagramImages.load = function() {
        if($('.instimg').length>0){
            var offset = $('.instimg:last-child').attr('id');
        }else{
            var offset = 0;
        }
        var type = "instagram";
        var container = $('.content_instimgs');
        var loader = $(container).parent('.instimgs').find('.instimgs_action .loader');
        loader.show();
        $('.btload').hide();
        var url;
        if(typeof offset != 'undefined' && offset!= null && offset!=""){
            url = Routing.generate('wbb_bar_feeds_find', { type: "instagram", id: insta, offset: offset});
        }else{
            url = Routing.generate('wbb_bar_feeds_find', { type: "instagram", id: insta, offset: 0})
        }

        $.ajax({
            type: "POST",
            url:  Routing.generate('wbb_bar_feeds_list',
                { type: "instagram", bar: barId}),
            dataType: 'json',
            success: function(r) {
                $.ajax({
                    type: "POST",
                    url:  url,
                    dataType: 'json',
                    success: function(response) {
                        loader.hide();
                        $('.btload').show();
                        var template = null;
                        $.each(response.data.data, function(key, feed){
                            var imgsHtml = $("#instimgs").html();
                            var checked = "checked";
                            if(in_array(feed.id, r)) {
                                checked = "";
                            }
                            template = imgsHtml.format(
                                feed.id, feed.images.low_resolution.url, checked
                            );

                            container.append(template);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                        $('.btload').show();
                    }
                });
            },
            error: function(e) {
                console.log(e);
            }
        });



    }
}

String.prototype.format = function() {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function(match, number) {
        return typeof args[number] != 'undefined'
            ? args[number]
            : match
            ;
    });
};
