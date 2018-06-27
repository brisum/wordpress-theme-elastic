<form method="post" action="" id="checkout-one-click" class="astute-form has-block-loader"
      data-astute-form
      data-redirect="<?php echo !empty($form['redirect']) ? $form['redirect'] : '' ?>"
>
    <?php if ($form['msg'] && 'success' == $form['status']) : ?>
         <div class="alert <?php echo ('success' == $form['status']) ? 'alert-success' : 'alert-warning'; ?>" role="alert">
             <?php echo $form['msg']; ?>
         </div>
    <?php else: ?>
        <input type="hidden" name="form-name" value="<?php echo $form['form-name']; ?>">
        <input type="hidden" name="checkout1click[page_request]" value="<?php echo $form['fields']['page_request']; ?>">
        <input type="hidden"
               name="checkout1click[product_id]"
               value="<?php echo isset($form['fields']['product_id']) ? $form['fields']['product_id'] : ''; ?>">
        <input type="hidden"
               name="checkout1click[payment_method]"
               value="<?php echo isset($form['fields']['payment_method']) ? $form['fields']['payment_method'] : ''; ?>">
        <input type="hidden"
               name="checkout1click[payment_type]"
               value="<?php echo isset($form['fields']['payment_type']) ? $form['fields']['payment_type'] : ''; ?>">
        <input type="hidden"
               name="checkout1click[payment_term]"
               value="<?php echo isset($form['fields']['payment_term']) ? $form['fields']['payment_term'] : ''; ?>">

        <div class="popup-title">Оформление заказа</div>
        <div class="detail">
            Пожалуйста, укажите Ваше имя, номер телефона и email, менеджер свяжется с вами в ближайшее время для уточнения деталей.
        </div>

        <div class="message-viewport">
            <?php if ($form['msg']) : ?>
                <div id="msg-main" class="alert <?php echo ('success' == $form['status']) ? 'alert-success' : 'alert-warning'; ?>" role="alert">
                    <?php echo $form['msg']; ?>
                </div>
            <?php endif ?>
        </div>

        <div class="form-group">
            <?php if (!empty($form['errors']['name'])) : ?>
            <p class="error-message" style="color:#ff0033;"><?php echo $form['errors']['name'] ?></p>
            <?php else: ?>
            <label for="checkout1click_name">
                Имя
            </label>
            <?php endif; ?>
            <input type="text" class="form-control" id="checkout1click_name"
                   name="checkout1click[name]"
                   value="<?php echo isset($form['fields']['name']) ? $form['fields']['name'] : ''; ?>">
        </div>

        <div class="form-group">
            <?php if (!empty($form['errors']['email'])) : ?>
            <p class="error-message" style="color: #ff0033;"><?php echo $form['errors']['email'] ?></p>
            <?php else: ?>
            <label for="checkout1click_email">Email</label>
            <?php endif; ?>
            <input type="text" class="form-control" id="checkout1click_email"
                   name="checkout1click[email]"
                   value="<?php echo isset($form['fields']['email']) ? $form['fields']['email'] : ''; ?>">
        </div>

        <div class="form-group">
            <?php if (!empty($form['errors']['phone'])) : ?>
            <p class="error-message" style="color: #ff0033;"><?php echo $form['errors']['phone'] ?></p>
            <?php else: ?>
            <label for="checkout1click_phone">
                Телефон
            </label>
            <?php endif; ?>
            <input type="text" class="form-control" id="checkout1click_phone"
                   name="checkout1click[phone]"
                   value="<?php echo isset($form['fields']['phone']) ? $form['fields']['phone'] : ''; ?>">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">
                Оформить заказ
            </button>
        </div>
    <?php endif ?>
</form>
