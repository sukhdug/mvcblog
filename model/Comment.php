<?php

require_once "Model.php";

class Comment extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns an array of comments items
     */
    public function getCommentsList($article_id)
    {
        try {
            $article_id = intval($article_id);
            if (isset($article_id)) {
                $sql = 'SELECT id, body, author FROM comments WHERE article_id = ' . $article_id;
                $result = $this->db->prepare($sql);
                $result->execute();
                $commentsList = $result->fetchAll();
                return $commentsList;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Add single comment for article
     */
    public function addCommentForArticle($comment)
    {
        try {
            if (isset($comment)) {
                $resultMessage = $this->validation($comment);
                if(empty($resultMessage)) {
                    $sql = "INSERT INTO comments (body, author, article_id) VALUES (:comment, :author, :article_id)";
                    $result = $this->db->prepare($sql);
                    $result->bindParam(":comment", $comment['comment']);
                    $result->bindParam(":author", $comment['author']);
                    $result->bindParam(":article_id", $comment['id']);
                    if($result->execute()) $resultMessage[] = 'Комментарий добавлен!';
                }
                return $resultMessage;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public static function validation($comment)
    {
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