<form action=""
       method="POST"
       id="contact_form"
       class="astute-form has-block-loader"
       data-astute-form
       data-url="<?php echo THEME_URI; ?>/module/Form/listener.php">
    <input type="hidden" name="form-name" value="<?php echo $form['form-name']; ?>">
    <input type="hidden" name="page_request" value="<?php echo $form['fields']['page_request']; ?>">

    <div class="form-title">
        Обратная связь
    </div>

    <?php if ($form['msg']) : ?>
        <div class="form-group">
            <div class="alert <?php echo ('success' == $form['status']) ? 'alert-success' : 'alert-warning'; ?>" role="alert">
                <?php echo $form['msg']; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <?php if (!empty($form['errors']['contact_name'])) : ?>
                    <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['contact_name'] ?></p>
                <?php endif; ?>
                <input type="text" class="form-control" id="contact_name"
                       placeholder="Имя"
                       name="contact_name"
                       value="<?php echo isset($form['fields']['contact_name']) ? $form['fields']['contact_name'] : ''; ?>"
                       required >
            </div>

            <div class="form-group">
                <?php if (!empty($form['errors']['contact_phone'])) : ?>
                    <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['contact_phone'] ?></p>
                <?php endif; ?>
                <input type="text" class="form-control" id="contact_phone"
                       placeholder="Телефон"
                       name="contact_phone"
                       value="<?php echo isset($form['fields']['contact_phone']) ? $form['fields']['contact_phone'] : ''; ?>"
                       required >
            </div>

            <div class="form-group">
                <?php if (!empty($form['errors']['contact_email'])) : ?>
                    <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['contact_email'] ?></p>
                <?php endif; ?>
                <input type="email" class="form-control" id="contact_email"
                       placeholder="Email"
                       name="contact_email"
                       value="<?php echo isset($form['fields']['contact_email']) ? $form['fields']['contact_email'] : ''; ?>"
                       required >
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
             <?php if (!empty($form['errors']['contact_message'])) : ?>
                 <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['contact_message'] ?></p>
             <?php endif; ?>
             <textarea class="form-control" id="contact_message"
                       placeholder="Сообщение"
                       name="contact_message"
                       required
             ><?php echo isset($form['fields']['contact_message']) ? $form['fields']['contact_message'] : ''; ?></textarea>
            </div>
        </div>
     </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-success">Отправить</button>
    </div>
</form>
