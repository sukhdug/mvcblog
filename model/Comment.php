<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 02.01.18
 * Time: 16:35
 */
class Comment
{
    public static function validation($body, $author, $article_id) {
        if (empty($body) || empty($author) || empty($article_id)) return false;
        if (strlen($author) < 1 && strlen($author) > 255) return false;
        if (strlen($body) < 1 && strlen($body) > 1000) return false;
        if (!preg_match('/^[a-zA-Zа-яА-Я]{4,20}$/u', $author)) return false;
        if (!is_int($article_id)) return false;

        return true;

    }

    /**
     * Returns an array of comments items
     */
    public function getCommentsList($article_id) {

        $article_id = intval($article_id);
        if ($article_id) {

            $db = Database::getConnection();
            $commentsList = array();
            $sql = 'SELECT id, body, author FROM comments WHERE article_id=' . $article_id;
            $result = $db->prepare($sql);
            $result->execute();

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
    public function addCommentForArticle($author, $comment, $article_id){

        if (isset($author) && isset($comment) && isset($article_id)) {

            $validation = $this->validation($comment, $author, $article_id);
            $db = Database::getConnection();
            $sql = "INSERT INTO comments (body, author, article_id) VALUES ('$comment', '$author', '$article_id')";

            if($validation) {
                $result = $db->prepare($sql);
                $result = $result->execute();
            } else {
                $result = false;
            }

            return $result;
        }
    }
}