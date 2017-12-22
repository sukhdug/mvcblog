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
     * @param integer &id
     */
    public static function getNewsItemByID($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);

            /*$result->setFetchMode(PDO::FETCH_NUM);*/
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList() {

        $db = Database::getConnection();
        $newsList = array();

        $result = $db->query('SELECT id, title, date, author_name, short_content FROM news ORDER BY id ASC LIMIT 10');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;

    }
}