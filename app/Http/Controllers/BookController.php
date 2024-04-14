<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Providers\Services\AuthorService;
use App\Providers\Services\BookService;

class BookController extends Controller {
    public static function destroy($id) {
        BookService::deleteBook($id);
        return redirect()->route('books');
    }

    public function create()
    {
        $authors = AuthorService::getAuthors(); // returns only 12 authors because of pagination should be fixed
        return view('books', ['authors' => $authors]);
    }


    public static function store(StoreBookRequest $request) {
        $title = $request->input('title');
        $authorId = $request->input('author_id');
        $description = $request->input('description');
        $isbn = $request->input('isbn');
        $releaseDate = $request->input('release_date');
        $format = $request->input('format');
        $numberOfPages = $request->input('number_of_pages');
        BookService::createBook($title, $authorId, $description, $isbn, $releaseDate, $format, $numberOfPages);
        return redirect()->route('books.create');
    }
}