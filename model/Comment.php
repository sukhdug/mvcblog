<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 02.01.18
 * Time: 16:35
 */
class Comment
{
    /**
     * Returns an array of comments items
     */
    public static function getCommentsList($article_id) {

        $article_id = intval($article_id);
        if ($article_id) {

            $db = Database::getConnection();
            $commentsList = array();
            $result = $db->query('SELECT id, body, author FROM comments WHERE article_id=' . $article_id);

            $i = 0;
            while($row = $result->fetch()) {
                $commentsList[$i]['id'] = $row['id'];
                $commentsList[$i]['body'] = $row['body'];
                $commentsList[$i]['author'] = $row['author'];
                $i++;
            }
            return $commentsList;
        }
    }
}