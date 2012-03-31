/**
* @author Andy Sharman
* @copyright Andy Sharman (www.udjamaflip.com)
* @link http://www.udjamaflip.com
* @license GNU/GPL V2+
* @version 1.0
* @package mod_udjacomments
**/

jQuery.noConflict();

jQuery(document).ready(function ($) {

    $('.commentReplyLink').click(function () {
        var id = $(this).attr('id');
        $('#hdnIsReply').val(id);
        $('form#frmCommentPost h3.commentsTitle').text($.TEXT.REPLY_TO_COMMENT);

        var theQuote = $(this).parent('p').parent('div').children('.commentContent').html()
        theQuote = '[quote]' + theQuote.replace(/\<code\>/g, '').replace(/\<\/code\>/g, '').replace(/\<cite\>/g, '').replace(/\<\/cite\>/g, '') + '[/quote]';
        $('textarea#txtUdjaComment').text(theQuote);

        document.location.href = '#frmCommentPost';
        $('#txtUdjaName').focus();
        return false;
    });

});