<table>
    <tr>
       <th colspan="2">
           <b>Форма "Обратная связь"</b>
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
            <?php echo $contact_name; ?>
        </td>
    </tr>
    <tr>
        <td>
            Телефон:
        </td>
        <td>
            <?php echo $contact_phone; ?>
        </td>
    </tr>
    <tr>
        <td>
            Email:
        </td>
        <td>
            <?php echo $contact_email; ?>
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
            Сообщение:
        </td>
        <td>
            <?php echo $contact_message; ?>
        </td>
    </tr>
</table>
