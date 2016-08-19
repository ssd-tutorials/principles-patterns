<?php

require_once "vendor/autoload.php";

use App\Book\Book;
use App\Notification\Mail;
use App\Filesystem\Filesystem;

use SSD\DotEnv\DotEnv;
use Illuminate\Http\Request;

(new DotEnv(__DIR__ . '/.env'))
    ->overload()
    ->required([
        'MAIL_HOST',
        'MAIL_PORT',
        'MAIL_USERNAME',
        'MAIL_PASSWORD'
    ]);

$book = new Book(
    Request::capture(),
    new Filesystem
);
$book->title('Room with a view');
$book->content('Book content goes here');
$book->saveToFile();
$book->sendNotification(
    new Mail,
    ['your-email-goes-here' => 'Your Name Goes Here'],
    'your-other-email-goes-here'
);










