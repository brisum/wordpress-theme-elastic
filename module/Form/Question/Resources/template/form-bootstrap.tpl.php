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
        <?php else: ?>
        <label for="question_name">
            Имя:
        </label>
        <?php endif; ?>
        <input type="text" class="form-control" id="question_name"
               name="question_name"
               value="<?php echo isset($form['fields']['question_name']) ? $form['fields']['question_name'] : ''; ?>"
               required >
    </div>

     <div class="form-group">
         <?php if (!empty($form['errors']['question_phone'])) : ?>
             <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_phone'] ?></p>
         <?php else: ?>
             <label for="question_phone">
                 Телефон:
             </label>
         <?php endif; ?>
         <input type="text" class="form-control" id="question_phone"
                name="question_phone"
                value="<?php echo isset($form['fields']['question_phone']) ? $form['fields']['question_phone'] : ''; ?>"
                required >
     </div>

    <div class="form-group">
        <?php if (!empty($form['errors']['question_email'])) : ?>
        <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_email'] ?></p>
        <?php else: ?>
        <label for="question_email">
            Email:
        </label>
        <?php endif; ?>
        <input type="email" class="form-control" id="question_email"
               name="question_email"
               value="<?php echo isset($form['fields']['question_email']) ? $form['fields']['question_email'] : ''; ?>"
               required >
    </div>

    <div class="form-group">
        <?php if (!empty($form['errors']['question_message'])) : ?>
        <p class="error-message" style="color:#d30808;"><?php echo $form['errors']['question_message'] ?></p>
        <?php else: ?>
        <label for="question_message">
            Вопрос:
        </label>
        <?php endif; ?>
        <textarea class="form-control" id="question_message"
               name="question_message"
               required
        ><?php echo isset($form['fields']['question_message']) ? $form['fields']['question_message'] : ''; ?></textarea>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-success">Отправить</button>
    </div>
</form>
