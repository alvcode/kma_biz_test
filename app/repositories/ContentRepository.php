<?php

namespace app\repositories;

use app\repositories\BaseRepository;

class ContentRepository extends BaseRepository
{
    public function allSortByMinute()
    {
        $db = $this->getMysqlDatabase();

        $query = "
        SELECT
            DATE_FORMAT(c.request_dt, '%i') AS minute_group,
            COUNT(*) AS row_count,
            AVG(c.content_length) AS avg_content_length,
            MIN(c.request_dt) AS first_message_time,
            MAX(c.request_dt) AS last_message_time
        FROM
            `main`.`content` as c
        GROUP BY
            minute_group
        ORDER BY
            minute_group
        ";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $db->fetchAll($statement);
        return $result;
    }
}