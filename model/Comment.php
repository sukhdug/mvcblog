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
            $sql = 'SELECT id, body, author FROM comments WHERE article_id=' . $article_id;
            $result = $db->query($sql);

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

    /**
     *
     */
    public static function addCommentForArticle($author, $comment, $article_id){

        if (isset($author) && isset($comment) && isset($article_id)) {

            $db = Database::getConnection();
            $sql = "INSERT INTO comments (body, author, article_id) VALUES ('$comment', '$author', '$article_id')";
            $result = $db->query($sql);

            return $result->execute();
        }
    }
}