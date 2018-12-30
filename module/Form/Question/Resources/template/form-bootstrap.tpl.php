<form action=""
       method="POST"
       id="question_form"
       class="astute-form has-block-loader"
       data-astute-form
       data-url="<?php echo THEME_URI; ?>/module/Form/listener.php">
    <?php if ($form['msg']) : ?>
        <div class="form-group">
            <div class="alert <?php echo ('success' == $form['status']) ? 'alert-success' : 'alert-warning'; ?>" role="alert">
                <?php echo $form['msg']; ?>
            </div>
        </div>
    <?php endif; ?>


    <input type="hidden" name="form-name" value="<?php echo $form['form-name']; ?>">
    <input type="hidden" name="page_request" value="<?php echo $form['fields']['page_request']; ?>">

    <div class="form-group">
        <?php if (!empty($form['errors']['question_name'])) : ?>
            <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_name'] ?></p>
        <?php endif; ?>
        <input type="text" class="form-control" id="question_name"
               name="question_name"
               value="<?php echo isset($form['fields']['question_name']) ? $form['fields']['question_name'] : ''; ?>"
               placeholder="Имя"
               required >
    </div>

     <div class="form-group">
         <?php if (!empty($form['errors']['question_phone'])) : ?>
             <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_phone'] ?></p>
         <?php endif; ?>
         <input type="text" class="form-control" id="question_phone"
                name="question_phone"
                value="<?php echo isset($form['fields']['question_phone']) ? $form['fields']['question_phone'] : ''; ?>"
                placeholder="Телефон"
                required >
     </div>

    <div class="form-group">
        <?php if (!empty($form['errors']['question_email'])) : ?>
        <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_email'] ?></p>
        <?php endif; ?>
        <input type="email" class="form-control" id="question_email"
               name="question_email"
               value="<?php echo isset($form['fields']['question_email']) ? $form['fields']['question_email'] : ''; ?>"
               placeholder="Email"
               required >
    </div>

    <div class="form-group">
        <?php if (!empty($form['errors']['question_message'])) : ?>
        <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_message'] ?></p>
        <?php endif; ?>
        <textarea class="form-control" id="question_message"
               name="question_message"
               placeholder="Вопрос"
               required
        ><?php echo isset($form['fields']['question_message']) ? $form['fields']['question_message'] : ''; ?></textarea>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
