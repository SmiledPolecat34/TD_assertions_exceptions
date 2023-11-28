<?php

class BookManager {
    private $books = [];

    public function addBook($title, $author, $price) {
        $this->books[] = [
            'title' => $title,
            'author' => $author,
            'price' => $price
        ];
    }

    public function removeBook($title) {
        foreach ($this->books as $key => $book) {
            if ($book['title'] === $title) {
                unset($this->books[$key]);
                $this->books = array_values($this->books); // Réindexe le tableau après suppression
                break;
            }
        }
    }

    public function getBooks() {
        return $this->books;
    }
}

?>