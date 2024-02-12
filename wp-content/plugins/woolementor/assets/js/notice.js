jQuery(function ($) { 

    if (typeof CODESIGNER_NOTICE  == 'undefined') {
        return;
      }

    $.each(CODESIGNER_NOTICE, function(index, pointer) {
    
    $(pointer.target).pointer({
        content: '<h3>Introducing CoDesigner Modules 🎉</h3><p>' + pointer.content + '</p>',
        pointerWidth: 380,
        position: {
            edge: pointer.edge,
            align: pointer.align
        },
        close: function() {
                $.post(ajaxurl, {
                    notice_name: index,
                    _ajax_nonce: CODESIGNER_NOTICE._wpnonce,
                    action: 'codesigner_admin_notice'
                });

            console.log( 'test' );
        }
      }).pointer('open');

    // console.log( index );

  });
});