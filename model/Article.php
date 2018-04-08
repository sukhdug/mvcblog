<?php

require_once "Model.php";

class Article extends Model {

    /**
     * Returns single articles items with specified id
     * @rapam integer &id
     */
    public function getArticlesItemByID($id)
    {
        try {
            $id = intval($id);
            if (isset($id)) {
                $sql = 'SELECT * FROM articles WHERE id = ?';
                $result = $this->db->prepare($sql);
                $result->bindValue(1, $id, PDO::PARAM_INT);
                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $articlesItem = $result->fetch();
                return $articlesItem;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Returns an array of articles items
     */
    public function getArticlesList($min, $max)
    {
        try {
            $sql = 'SELECT * FROM articles ORDER BY id DESC LIMIT ?, ?';
            $result = $this->db->prepare($sql);
            $result->bindValue(1, $min, PDO::PARAM_INT);
            $result->bindValue(2, $max, PDO::PARAM_INT);
            $result->execute();
            $articlesList = $result->fetchAll();
            return $articlesList;

        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Add single articles items to database
     */
    public function insertArticle($article)
    {
        try {
            if(isset($article)) {
                $resultMessage = $this->validation($article);
                if (empty($resultMessage)) {
                    if (!empty($article['picture'])) {
                        $picture = "template/img/articles/". $article['picture'];
                        $file_tmp = $article['file_tmp'];
                    }
                    $short_content = substr($article['body'], 0, 255);
                    $sql = "INSERT INTO articles (title, author, body, short_content, picture, like_count) VALUES (:title, :author, :body, :short_content, :picture, 0)";
                    $result = $this->db->prepare($sql);
                    $result->bindParam(":title", $article['title']);
                    $result->bindParam(":author", $article['author']);
                    $result->bindParam(":body", $article['body']);
                    $result->bindParam(":short_content", $short_content);
                    $result->bindParam(":picture", $picture);
                    if ($result->execute()) {
                        $resultMessage[] = 'Статья успешно добавлена';
                        if(isset($file_tmp)) {
                            move_uploaded_file($file_tmp, $picture);
                        }
                    }
                }
                return $resultMessage;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Update single articles items to database
     */
    public function updateArticle($article)
    {
        try {
            if(isset($article)) {
                $resultMessage = $this->validation($article);
                if (empty($resultMessage)) {
                    if (!empty($article['picture'])) {
                        $picture = "template/img/articles/". $article['picture'];
                        $file_tmp = $article['file_tmp'];
                    }
                    $short_content = substr($article['body'], 0, 255);
                    $sql = "UPDATE articles SET title = :title, author = :author, body = :body, short_content = :short_content, picture = :picture WHERE id = :id";
                    $result = $this->db->prepare($sql);
                    $result->bindParam(":id", $article['id'], PDO::PARAM_INT);
                    $result->bindParam(":title",$article['title']);
                    $result->bindParam(":author",$article['author']);
                    $result->bindParam(":body",$article['body']);
                    $result->bindParam(":short_content", $short_content);
                    $result->bindParam(":picture", $picture);
                    if ($result->execute()) {
                        $resultMessage[] = 'Статья успешно отредактирована';
                        if(isset($file_tmp)) {
                            move_uploaded_file($file_tmp, $picture);
                        }
                    }
                }
                return $resultMessage;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Delete single articles items to database
     */
    public function deleteArticle($id)
    {
        try {
            $sql = "DELETE FROM articles WHERE id = ?";
            $result = $this->db->prepare($sql);
            $result->bindParam(1, $id, PDO::PARAM_INT);
            $result = $result->execute();
            return $result;
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function countArticles()
    {
        try {
            $sql = "SELECT COUNT(*) FROM articles";
            $sth = $this->db->prepare($sql);
            $sth->execute();
            $row = $sth->fetch();
            $total = $row[0];
            return $total;
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    private function validation($article)
    {
        $errors = array();
        if (empty($article['title'])) $errors[] = 'Заголовок не заполнен';
        if (empty($article['author'])) $errors[] = 'Имя автора не заполнено';
        if (strlen($article['author']) < 1 && strlen($article['author']) > 255) $errors[] = 'Имя автора слишком длинное или короткое';
        if (!preg_match('/^[a-zA-Zа-яА-Я]{4,20}$/u', $article['author'])) $errors[] = 'Имя автора неопределенное';
        if (empty($article['body'])) $errors[] = 'Статья пустая';
        if (strlen($article['body']) < 100 && strlen($article['body']) > 10000) $errors[] = 'Статья слишком короткое или длинное';
        if (!empty($article['file_type']))
            if(($article['file_type'] != 'image/jpeg') && ($article['file_type'] != 'image/jpg') && ($article['file_type'] != 'image/png')) $errors[] = 'Недопустимый тип файла';
        return $errors;
    }
}