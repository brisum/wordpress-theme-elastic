<table>
    <tr>
       <th colspan="2">
           <b>Форма "Задать вопрос"</b>
       </th>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            Имя:
        </td>
        <td>
            <?php echo $question_name; ?>
        </td>
    </tr>
    <tr>
        <td>
            Телефон:
        </td>
        <td>
            <?php echo $question_phone; ?>
        </td>
    </tr>
    <tr>
        <td>
            Email:
        </td>
        <td>
            <?php echo $question_email; ?>
        </td>
    </tr>
    <tr>
        <td>
            Страница:
        </td>
        <td>
            <?php echo HOME_URL . $page_request; ?>
        </td>
    </tr>
    <tr>
        <td>
            Вопрос:
        </td>
        <td>
            <?php echo $question_message; ?>
        </td>
    </tr>
</table>
