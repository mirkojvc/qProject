<?php

namespace App\Providers\Services;

use App\Models\Book;

class BookService {
    public static function deleteBook(int $id) {
        try {
            Book::delete($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public static function createBook(string $title, int $authorId, string $description, string $isbn, string $releaseDate, string $format, int $numberOfPages) {
        try {
            $book = Book::create($title, $authorId, $description, $isbn, $releaseDate, $format, $numberOfPages);

            return $book;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}