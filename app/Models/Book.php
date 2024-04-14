<?php

namespace App\Models;

use App\Providers\Services\ApiService;
use Illuminate\Support\Facades\Http;

class Book
{
    public $id;
    public $title;
    public $release_date;
    public $description;
    public $isbn;
    public $format;
    public $number_of_pages;

    public function __construct($attributes = [])
    {
        $this->id = $attributes['id'] ?? null;
        $this->title = $attributes['title'] ?? null;
        $this->release_date = $attributes['release_date'] ?? null;
        $this->description = $attributes['description'] ?? null;
        $this->isbn = $attributes['isbn'] ?? null;
        $this->format = $attributes['format'] ?? null;
        $this->number_of_pages = $attributes['number_of_pages'] ?? null;
    }

    public static function create($title, $authorId, $description, $isbn, $releaseDate, $format, $numberOfPages)
    {
        $url = config('api.base_uri') . config('api.books.create');
        $response = ApiService::sendAuthorizedRequest($url, [
            'title' => $title,
            'author' => ['id' => $authorId],
            'description' => $description,
            'isbn' => $isbn,
            'release_date' => $releaseDate,
            'format' => $format,
            'number_of_pages' => $numberOfPages
        ], 'post');

        return new Book($response);
    }


    public static function delete($id) {

        $url = config('api.base_uri') . config('api.books.delete');
        ApiService::sendAuthorizedRequest($url . $id, [], 'delete');
    }
}
