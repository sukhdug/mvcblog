<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 22.12.17
 * Time: 23:09
 */
class Article
{

    /**
     * Returns single articles items with specified id
     * @rapam integer &id
     */
    public function getArticlesItemByID($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Database::getConnection();
            $sql = 'SELECT * FROM articles WHERE id = ?';
            $result = $db->prepare($sql);
            $result->bindValue(1, $id, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $articlesItem = $result->fetch();

            return $articlesItem;
        }

    }

    /**
     * Returns an array of articles items
     */
    public function getArticlesList($min, $max)
    {

        $db = Database::getConnection();
        $articlesList = array();
        $sql = 'SELECT * FROM articles ORDER BY id DESC LIMIT ?, ?';
        $result = $db->prepare($sql);
        $result->bindValue(1, $min, PDO::PARAM_INT);
        $result->bindValue(2, $max, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while($row = $result->fetch()) {
            $articlesList[$i]['id'] = $row['id'];
            $articlesList[$i]['title'] = $row['title'];
            $articlesList[$i]['author'] = $row['author'];
            $articlesList[$i]['body'] = $row['body'];
            $articlesList[$i]['short_content'] = $row['short_content'];
            $articlesList[$i]['picture'] = $row['picture'];
            $articlesList[$i]['like_count'] = $row['like_count'];
            $i++;
        }

        return $articlesList;

    }

    /**
     * Add single articles items to database
     */
    public function insertArticle($article)
    {
        if(isset($article)) {

            $errors = $this->validation($article);

            if (empty($errors)) {

                $picture = "template/img/articles/". $article['picture'];
                $file_tmp = $article['file_tmp'];
                $short_content = substr($article['body'], 0, 255);
                $db = Database::getConnection();
                $sql = "INSERT INTO articles (title, author, body, short_content, picture, like_count) VALUES (:title, :author, :body, :short_content, :picture, 0)";
                $result = $db->prepare($sql);
                $result->bindParam(":title", $article['title']);
                $result->bindParam(":author", $article['author']);
                $result->bindParam(":body", $article['body']);
                $result->bindParam(":short_content", $short_content);
                $result->bindParam(":picture", $picture);
                if ($result->execute()) {
                    $errors[] = 'Статья успешно добавлена';
                    move_uploaded_file($file_tmp, $picture);
                }
            }

            return $errors;
        }
    }

    /**
     * Update single articles items to database
     */
    public function updateArticle($article)
    {

        if(isset($article)) {

            $errors = $this->validation($article);

            if (empty($errors)) {

                $short_content = substr($article['body'], 0, 255);
                $db = Database::getConnection();
                $sql = "UPDATE articles SET title = :title, author = :author, body = :body, short_content = :short_content WHERE id = :id";
                $result = $db->prepare($sql);
                $result->bindParam(":id", $article['id'], PDO::PARAM_INT);
                $result->bindParam(":title",$article['title']);
                $result->bindParam(":author",$article['author']);
                $result->bindParam(":body",$article['body']);
                $result->bindParam(":short_content", $short_content);
                if ($result->execute()) $errors[] = 'Статья успешно отредактирована';
            }

            return $errors;
        }
    }

    /**
     * Delete single articles items to database
     */
    public function deleteArticle($id)
    {

        $result = 0;

        if (empty($errors)) {

            $db = Database::getConnection();
            $sql = "DELETE FROM articles WHERE id = ?";
            $result = $db->prepare($sql);
            $result->bindParam(1, $id, PDO::PARAM_INT);
            $result = $result->execute();
        }

        return $result;

    }

    public function countArticles()
    {
        $db = Database::getConnection();
        $sql = "SELECT COUNT(*) FROM articles";
        $sth = $db->prepare($sql);
        $sth->execute();
        $row = $sth->fetch();
        $total = $row[0];
        return $total;

    }

    public function likedArticle($id) {

        $id = intval($id);

        if ($id) {
            $db = Database::getConnection();
            $sql = 'SELECT like_count FROM articles WHERE id = ?';
            $result = $db->prepare($sql);
            $result->bindValue(1, $id, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $like_count = $result->fetch();
            $sql2 = "UPDATE articles SET like_count = :like_count WHERE id = :id";
            $result2 = $db->prepare($sql2);
            $result2->bindParam(":id", $article['id'], PDO::PARAM_INT);
            $result2->bindParam(":like_count", $like_count + 1, PDO::PARAM_INT);
            if ($result->execute())
                return like_count + 1;
            else
                return like_count;
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

        return $errors;
    }
}