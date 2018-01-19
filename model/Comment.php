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
    public function addCommentForArticle($comment){

        if (isset($comment)) {

            $errors = $this->validation($comment);

            if(empty($errors)) {
                $db = Database::getConnection();
                $sql = "INSERT INTO comments (body, author, article_id) VALUES (:comment, :author, :article_id)";
                $result = $db->prepare($sql);
                $result->bindParam(":comment", $comment['comment']);
                $result->bindParam(":author", $comment['author']);
                $result->bindParam(":article_id", $comment['id']);
                if($result->execute()) $errors[] = 'Комментарий добавлен!';
            }

            return $errors;
        }
    }

    public static function validation($comment) {

        $errors = array();

        if(empty($comment['author'])) $errors[] = 'Напишите автора комментария';
        if(empty($comment['comment'])) $errors[] = 'Комментарий не написан';
        if (strlen($comment['author']) < 1 && strlen($comment['author']) > 255) $errors[] = 'Имя автора слишком длинное или короткое';
        if (strlen($comment['comment']) < 1 && strlen($comment['comment']) > 1000) $errors[] = 'Слишком длинный или короткий комментарий';
        if (empty($comment['id'])) $errors[] = 'Статья неопределена';
        if (!is_int($comment['id'])) $errors[] = 'Статья неопределена';
        if (!preg_match('/^[a-zA-Zа-яА-Я]{4,20}$/u', $comment['author'])) $errors[] = 'Имя автора неопределенное';

        return $errors;

    }
}