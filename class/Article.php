<?php

class Article
{

    private $_pdo;

    private $_id;

    private $_title;

    private $_content;

    public function __construct($id = null, $title = '', $content = '')
    {
        $this->_pdo = new DbConnection();
        $this->_id = $id;
        $this->_title = $title;
        $this->_content = $content;
    }

    public function create()
    {
        $sql = 'INSERT INTO articles (title, content) VALUES (:title, :content)';

        $insert = $this->_pdo->prepare($sql);

        $insert->bindParam(':title', $this->_title);
        $insert->bindParam(':content', $this->_content);

        $insert->execute();
    }

    public function get($id)
    {
        $sql = 'SELECT id, title, content FROM articles WHERE id = :id';

        $select = $this->_pdo->prepare($sql);

        $select->bindParam(':id', $id);

        if ($select->execute()) {
            $article = $select->fetch(PDO::FETCH_ASSOC);
    
            $this->_id = $id;
    
            $this->_title = $article['title'];
    
            $this->_content = $article['content'];
        }
    }

    public function getAll()
    {
        $sql = 'SELECT id, title, content FROM articles';

        $select = $this->_pdo->prepare($sql);

        if ($select->execute()) {
            return $select->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getId()
    {

    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getContent()
    {
        return $this->_content;
    }
    
    public function setTitle($title) {
        $this->_title = $title;
        return $this;
    }
    
    public function setContent($content) {
        $this->_content = $content;
        return $this;
    }

}

