$(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var body = $('body');
    var tileSettings = $('#tileSettings');
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
            tileSettings.find('.tile-properties').hide();
            tileSettings.find('.elem .btn').removeClass('disabled');
            // ajax
            var arr = {};
            var elements = $("#tile-sort").children(':not(#tileSettings)');
            $(elements).each(function(i, e){
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
                        'url': url
                    };
                } else {
                    arr[i] = {
                        "type": 'separator',
                        "title": $e.find('.title').text()
                    };
                }
            });
            $.ajax({
                type: "POST",
                url: "http://cms/backend/web/index.php?r=ajax/save-dashboard",
                data: {"info": JSON.stringify(arr), "_csrf": csrfToken},
                dataType: 'json',
                beforeSend: function(){
                    NProgress.start();
                },
                success: function(){
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
        var color = colors[Math.floor(Math.random() * ((colors.length - 1) + 1))];
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
        tileSettings.find('.colors .selected').removeClass('selected');
        tileSettings.find('.tile-properties').hide();
        var $this;
        if (tileSort.hasClass('editable')) {
            $this = $(this);
            $this.addClass('preview');
            tileSettings.find('.tile-properties.links').show();
            if ($this.hasClass('medium')) {
                $('input[name="tileSize"][value="medium"]').prop('checked', true);
            } else if ($this.hasClass('big')) {
                $('input[name="tileSize"][value="big"]').prop('checked', true);
            } else {
                $('input[name="tileSize"][value="small"]').prop('checked', true);
            }
            $('#tileTitle').val($this.find('.title').text());
            $('#tileLink').val($this.attr('href'));
            $('#tileImage').val($this.find('img').attr('src'));
            var colorClass = getColorClass($this.attr('class'));
            tileSettings.find('.colors .' + colorClass).addClass('selected');
            return false;
        }
    });

    body.on('click', '.group-separator', function(){
        tileSort.find('.preview').removeClass('preview');
        tileSettings.find('.tile-properties').hide();
        if (tileSort.hasClass('editable')) {
            var $this = $(this);
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

    $('#colorsList').find('.color').on('click', function(){
        $('#colorsList').find('.color.selected').removeClass('selected');
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


    // menu builder
    var menuBuilder = $('#menuBuilder');
    var elementModal = $('#elementModal');
    var allCategories = $('#allCategories');
    var elementLink = $('#elementLink');

    menuBuilder.on('click', '.expand', function(){
        var ul = $(this).closest('ul');
        var li = $(this).closest('li.root');
        li.toggleClass('active');
        if (li.hasClass('active')) {
            ul.find('li.node[data-tree="' + li.data('tree') + '"]').removeClass('hidden');
        } else {
            ul.find('li.node[data-tree="' + li.data('tree') + '"]').addClass('hidden');
        }
    });

    menuBuilder.on('click', '.settings', function(){
        alert('TODO: изменение параметров элемента');
    });

    elementModal.find('input[name="isCategory"]').on('change', function(){
        var isCategory = this.value;
        resetMenuFields();
        elementModal.find('.has-error').removeClass('has-error');
        if (isCategory == 1) {
            allCategories.show();
            elementLink.closest('.input-group').hide();
        } else {
            allCategories.hide();
            elementLink.closest('.input-group').show();
        }
    });

    allCategories.on('change', function(){
        var optionSelected = $("option:selected", this);
        $("#elementTitle").val(optionSelected.data('title'));
    });

    $('#addRootElement').on('click', function(){
        resetMenuFields();
        elementModal.find('.has-error').removeClass('has-error');
        $.ajax({
            type: 'POST',
            url: 'http://cms/backend/web/index.php?r=menu/get-all-elements',
            data: {"_csrf": csrfToken},
            dataType: 'json',
            beforeSend: function () {
                NProgress.start();
            },
            success: function(data) {
                NProgress.done();
                $('#allMenuNodes').html(data.menuItems);
                elementModal.arcticmodal();
            }
        });
    });
    $('#saveRootElement').on('click', function(){
        var elemTitle = $('#elementTitle');
        elementModal.find('.has-error').removeClass('has-error');
        var error = false;
        var parentId = $('#allMenuNodes').val();
        var name = elemTitle.val().trim();
        var categoryId = allCategories.val();
        var isCategory = elementModal.find('input[name="isCategory"]:checked').val();
        if (name.length == 0) {
            error = true;
            elemTitle.closest('.input-group').addClass('has-error');
        }
        if ((elementLink.val().trim().length == 0) && isCategory == 0) {
            error = true;
            elementLink.closest('.input-group').addClass('has-error');
        }
        if ((categoryId == 0 || categoryId == null) && isCategory == 1) {
            error = true;
            console.log(3);
            allCategories.addClass('has-error');
        }
        if (!error) {
            $.ajax({
                type: "POST",
                url: "http://cms/backend/web/index.php?r=menu/add-element",
                data: {
                    "name": name,
                    "link": elementLink.val().trim(),
                    "parentId": parentId,
                    "isCategory": isCategory,
                    "categoryId": categoryId,
                    "_csrf": csrfToken
                },
                dataType: 'json',
                beforeSend: function () {
                    NProgress.start();
                },
                success: function (data) {
                    NProgress.done();
                    menuBuilder.append(data.html);
                    // TODO: обновление меню после добавления элемента
                },
                complete: function () {
                    elementModal.removeClass('has-error');
                    elementModal.arcticmodal('close');
                }
            });
        }
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
           return false;
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
           return false;
        }
    });
    return tileSize;
}

function resetMenuFields(){
    $("#elementTitle").val('');
    $('#elementLink').val('');
    $('#allCategories').val(0);
}