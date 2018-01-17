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
            $sql = 'SELECT * FROM articles WHERE id=' . $id;
            $result = $db->prepare($sql);
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
        $sql = 'SELECT * FROM articles ORDER BY id ASC LIMIT ?, ?';
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
            $articlesList[$i]['like_count'] = $row['like_count'];
            $i++;
        }

        return $articlesList;

    }

    /**
     * Add single articles items to database
     */
    public function addArticle($article)
    {
        if(isset($article['author']) && isset($article['title']) && isset($article['body'])) {

            $short_content = substr($article['body'], 0, 255);
            $db = Database::getConnection();
            $sql = "INSERT INTO articles (title, author, body, short_content, like_count) VALUES (:title, :author, :body, :short_content, 0)";
            $result = $db->prepare($sql);
            $result->bindParam(":title", $article['title']);
            $result->bindParam(":author", $article['author']);
            $result->bindParam(":body", $article['body']);
            $result->bindParam(":short_content", $short_content);
            $result = $result->execute();

            return $result;
        }
    }

    /**
     * Update single articles items to database
     */
    public function updateArticle($article)
    {

        if(isset($article['author']) && isset($article['title']) && isset($article['body'])) {

            $short_content = substr($article['body'], 0, 255);
            $db = Database::getConnection();
            $sql = "UPDATE articles SET title = :title, author = :author, body = :body, short_content = :short_content WHERE id = :id";
            $result = $db->prepare($sql);
            $result->bindParam(":id", intval($article['id']));
            $result->bindParam(":title",$article['title']);
            $result->bindParam(":author",$article['author']);
            $result->bindParam(":body",$article['body']);
            $result->bindParam(":short_content", $short_content);
            $result = $result->execute();

            return $result;
        }
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
}