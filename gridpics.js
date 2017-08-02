jQuery(document).ready(function(){
    gridpics_imagesize();
    jQuery(window).on('resize',function(){ gridpics_imagesize()});
    function gridpics_imagesize(){
        var gp = jQuery('.gridpics');
        gp.each(function(index,pic){
            var gridpic = jQuery(pic);
            var gp_width = gridpic.width();
            var sug_img_width = gp_width / gridpic.data('columns');
            var img = jQuery('img',gridpic);
            img.each(function(index,element){
                var e = jQuery(element);
                var i_w = sug_img_width - parseInt(e.css('marginLeft'))*2;
                if(i_w%2){
                    i_w = i_w - 1;
                }
                var p = e.parent();
                if(p.hasClass('caption-left') || p.hasClass('caption-right')){
                    var c = jQuery('.caption',p)
                    c.width(sug_img_width/2 - parseInt(c.css('paddingLeft')) *2 );
                    i_w = i_w/2 - 2;
                    if(i_w%2){
                        i_w = i_w - 1;
                    }
                    if(e.width() != i_w){
                        e.width(i_w);
                    }
                }else if(p.hasClass('caption-inner-top') || p.hasClass('caption-inner-bottom')){
                    var c = jQuery('.caption',p);
                    c.width(i_w - parseInt(c.css('paddingLeft')) *2);
                }
                if(e.width() != i_w){
                    e.width(i_w);
                }
            });
        });
    }
});

