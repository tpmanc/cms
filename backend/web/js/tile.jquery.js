(function($) {
    var addSeparatorBtn = $('#addSeparator');
    var addLinkBtn = $("#addLink");
    var saveBtn = $('#tileSave');
    var cancelBtn = $('#tileCancel');

    var methods = {
        init: function(options) {

        },
        addSeparator : function(options) { 
            var str = '<div class="group-separator preview">\
                        <input type="text" class="title" value="Новая группа">\
                        <i class="material-icons change-block">clear_all</i>\
                    </div>';
            // tileSort.append(str);
            // tileSort.sortable("refresh");
            cancelBtn.removeClass('disabled');
            saveBtn.removeClass('disabled');
            addSeparatorBtn.addClass('disabled');
            addLinkBtn.addClass('disabled');
        },
    };

    $.fn.tilePlugin = function(method) {
        if ( methods[method] ) {
            return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Метод с именем ' +  method + ' не существует' );
        }
    };
})(jQuery);