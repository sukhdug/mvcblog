<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 22.12.17
 * Time: 23:09
 */
class Article
{

    /** Returns single news items with specified id
     * @rapam integer &id
     */
    public static function getArticlesItemByID($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM articles WHERE id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $articlesItem = $result->fetch();

            return $articlesItem;
        }

    }

    /**
     * Returns an array of news items
     */
    public static function getArticlesList() {

        $db = Database::getConnection();
        $articlesList = array();

        $result = $db->query('SELECT id, title, body, author_id, like_count  FROM articles ORDER BY id ASC LIMIT 10');

        $i = 0;
        while($row = $result->fetch()) {
            $articlesList[$i]['id'] = $row['id'];
            $articlesList[$i]['title'] = $row['title'];
            $articlesList[$i]['body'] = $row['body'];
            $articlesList[$i]['author_id'] = $row['author_id'];
            $articlesList[$i]['like_count'] = $row['like_count'];
            $i++;
        }

        return $articlesList;

    }
}