'use strict';

import $ from 'jquery';
import Widget from 'lib-widget';

class ProductReviewWidget extends Widget {
    _init() {
        super._init();

        var self = this,
            productId = self.$element.attr('data-product-id'),
            $review = $('#review');

        $review.load('index.php?route=product/product/review&product_id=' + productId);
        $review.on('click', '.pagination a', function() {
            $review.fadeOut('slow');
            $review.load(this.href);
            $review.fadeIn('slow');

            return false;
        });

        $('#button-review').on('click', function() {
            $.ajax({
                url: 'index.php?route=product/product/write&product_id=' + productId,
                type: 'post',
                dataType: 'json',
                data: 'name=' + encodeURIComponent($('input[name=\'name\']').val())
                    + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val())
                    + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '')
                    + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
                beforeSend: function() {
                    $('.success, .warning').remove();
                    $('#button-review').attr('disabled', true);
                    $('#button-review').before('<div class="attention"><img src="catalog/view/theme/hyla/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
                },
                complete: function() {
                    $('#button-review').attr('disabled', false);
                    $('.attention').remove();
                },
                success: function(data) {
                    if (data['error']) {
                        $('#button-review').before('<div class="warning">' + data['error'] + '</div>');
                    }

                    if (data['success']) {
                        $('#button-review').before('<div class="success">' + data['success'] + '</div>');

                        $('input[name=\'name\']').val('');
                        $('textarea[name=\'text\']').val('');
                        $('input[name=\'rating\']:checked').attr('checked', '');
                        $('input[name=\'captcha\']').val('');
                    }
                }
            });
        });
    }
}

export default ProductReviewWidget;
