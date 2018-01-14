<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 22.12.17
 * Time: 23:09
 */
class Article
{

    /** Returns single articles items with specified id
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
    public function getArticlesList() {

        $db = Database::getConnection();
        $articlesList = array();
        $sql = 'SELECT id, title, author, body, short_content, like_count  FROM articles ORDER BY id ASC LIMIT 10';
        $result = $db->prepare($sql);
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
}