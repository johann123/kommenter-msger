<?php
require_once __DIR__ . './../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use App\PostsDealer;

define('POSTS', 'posts');

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');

$channel = $connection->channel();
$channel->queue_declare(POSTS, false, false, false, false);

$i = 0;
try {
    foreach (PostsDealer::getPosts() as $post) {
        $msg = new AMQPMessage(json_encode($post, JSON_THROW_ON_ERROR));
        $channel->basic_publish($msg, '', POSTS);
        $i++;
    }
} catch (JsonException $e) {
    $channel->close();
}

try {
    $connection->close();
} catch (Exception $e) {
    die($e->getMessage());
}

echo "[${i}] Sent into queue: " . POSTS;

