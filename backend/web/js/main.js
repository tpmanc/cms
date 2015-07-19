$(function(){
    var body = $('body');
    var tileSort = $("#tile-sort");
    var colors = ['blue', 'lightblue', 
                    'aqua', 'green', 'lightgreen', 
                    'yellow', 'darkyellow',  
                    'orange', 'brown', 'darkorange', 
                    'red', 'pink', 'purple', 'ligthpurple'];

    // block tile
    $('#tileChangeBlock').on('click', function(){
        if (tileSort.hasClass('editable')) {
            tileSort.removeClass('editable').sortable("disable");
            $(this).html('settings');
            body.find('h1').removeClass('done');
            tileSort.find('.preview').removeClass('preview');
            $('#tileSettings .tile-properties').hide();
            $('#tileSettings .elem .btn').removeClass('disabled');
            // ajax
            var arr = {};
            var elemets = $("#tile-sort").children(':not(#tileSettings)');
            $(elemets).each(function(i, e){
                var $e = $(e);
                if ($e.hasClass('tile')) {
                    var url;
                    var img;
                    if ($e.attr('href') != undefined && $e.attr('href').trim() != '') {
                        url = $e.attr('href');
                    } else {
                        url = '';
                    }
                    if ($e.find('img').length == 1) {
                        img = $e.find('img').attr('src');
                    } else {
                        img = '';
                    }
                    arr[i] = {
                        'type': 'tile',
                        'title': $e.find('.title').text(),
                        'color': getColorClass($e.attr('class')),
                        'size': getTileSize($e.attr('class'), colors),
                        'img': img,
                        'url': url,
                    };
                } else {
                    type = 'separator';
                    arr[i] = {
                        "type": 'separator',
                        "title": $e.find('.title').text(),
                    };
                }
            });
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                type: "POST",
                url: "http://cms/backend/web/index.php?r=ajax/save-dashboard",
                data: {"info": JSON.stringify(arr), _csrf: csrfToken},
                dataType: 'json',
                beforeSend: function(){
                    NProgress.start();
                },
                success: function(msg){
                    NProgress.done();
                }
             });
        } else {
            tileSort.addClass('editable').sortable("enable");
            $(this).html('done');
            body.find('h1').addClass('done');
        }
    });

    //
    $('#addSeparator').on('click', function(){
        var str = '<div class="group-separator">\
                        <div class="title">Новая группа</div>\
                    </div>';
        tileSort.append(str);
        tileSort.sortable("refresh");
    });

    $('#addLink').on('click', function(){
        var title = '';
        var color = colors[Math.floor(Math.random() * ((colors.length - 1) - 0 + 1)) + 0];
        var str = '<a href="#" class="tile ' + color + '">\
                        <div class="tile-content"></div>\
                        <div class="title">' + title + '</div>\
                    </a>';
        tileSort.append(str);
        tileSort.sortable("refresh");
    });

    $('#tileTitle').on('keyup', function(){
        var title = $(this).val();
        $('.tile.preview .title').text(title);
    });

    $('#tileLink').on('keyup', function(){
        var link = $(this).val();
        $('.tile.preview').attr('href', link);
    });

    $('#tileImage').on('keyup', function(){
        var img = $(this).val();
        if ( img.trim().length > 0 ) {
            $('.tile.preview .tile-content').empty().html('<img src="' + img + '" alt="">');
        } else {
            $('.tile.preview .tile-content').empty();
        }
    });

    body.on('click', '.tile', function(){
        tileSort.find('.preview').removeClass('preview');
        $('#tileSettings').find('.colors .selected').removeClass('selected');
        $('#tileSettings').find('.tile-properties').hide();
        if (tileSort.hasClass('editable')) {
            $this = $(this);
            $this.addClass('preview');
            $('#tileSettings').find('.tile-properties.links').show();
            if ($this.hasClass('medium')) {
                $('input[name="tileSize"][value="medium"]').prop('checked', true);
            } else if ($this.hasClass('big')) {
                $('input[name="tileSize"][value="big"]').prop('checked', true);
            } else {
                $('input[name="tileSize"][value="small"]').prop('checked', true);
            }
            $('#tileTitle').val( $this.find('.title').text() );
            $('#tileLink').val( $this.attr('href') );
            $('#tileImage').val( $this.find('img').attr('src') );
            var colorClass = getColorClass($this.attr('class'));
            $('#tileSettings').find('.colors .' + colorClass).addClass('selected');
            return false;
        }
    });

    body.on('click', '.group-separator', function(){
        tileSort.find('.preview').removeClass('preview');
        $('#tileSettings').find('.tile-properties').hide();
        if (tileSort.hasClass('editable')) {
            $this = $(this);
            $this.addClass('preview');
            $('#tileSettings').find('.tile-properties.groups').show();
            $('#groupTitle').val( $this.find('.title').text() );
        }
    });

    $('#groupTitle').on('keyup', function(){
        var title = $(this).val();
        $('.group-separator.preview .title').text(title);
    });

    $('input[name="tileSize"]').on('change', function(){
        var size = $(this).val();
        var tile = $('.tile.preview');
        tile.removeClass('medium').removeClass('big');
        if (size != 'small') {
            tile.addClass(size);
        }
    });

    $('#colorsList .color').on('click', function(){
        $('#colorsList .color.selected').removeClass('selected');
        var $this = $(this);
        var colorClass = getColorClass(tileSort.find('.preview').attr('class'));
        tileSort.find('.preview').removeClass(colorClass);

        colorClass = getColorClass($this.addClass('selected').attr('class'));
        tileSort.find('.preview').addClass(colorClass);
    });


    tileSort.sortable({
        items: '.group-separator, .tile',
        disabled: true
    });
});

function getColorClass(classesString) {
    var classes = classesString.split(/\s+/);
    var colorClass = '';
    $.each(classes, function(i, e){
        if (e != 'tile' && 
            e != 'middle' && 
            e != 'ui-sortable-handle' && 
            e != 'preview' && 
            e != 'color' && 
            e != 'medium' && 
            e != 'big' && 
            e != 'selected') {
           colorClass = e;
           return;
        }
    });
    return colorClass;
}

function getTileSize(classesString, colors) {
    var classes = classesString.split(/\s+/);
    var tileSize = '';
    $.each(classes, function(i, e){
        if (e != 'tile' && 
            e != 'middle' && 
            e != 'ui-sortable-handle' && 
            e != 'preview' && 
            e != 'color' && 
            e != 'selected' &&
            jQuery.inArray(e, colors) === -1) {
           tileSize = e;
           return;
        }
    });
    return tileSize;
}