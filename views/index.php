<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <style>
            body{
                margin: 0;
                padding: 0;
            }
            .content{
                width: 1200px;
                margin: 0 auto;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>минута группировки</th>
                        <th>количество строк за минуту</th>
                        <th>средняя длина контента</th>
                        <th>время первого сообщения в минуте</th>
                        <th>время последнего сообщения в минуте</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $key => $val): ?>
                    <tr>
                        <td><?php echo $val['minute_group'] ?></td>
                        <td><?php echo $val['row_count'] ?></td>
                        <td><?php echo $val['avg_content_length'] ?></td>
                        <td><?php echo $val['first_message_time'] ?></td>
                        <td><?php echo $val['last_message_time'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>