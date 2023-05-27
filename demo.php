<?php

$key = '<GOOGLE_BOOKS_API_KEY>';
$url = 'https://www.googleapis.com/books/v1/volumes?q=harry+potter&key=';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url.$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);

foreach($data['items'] as $key => $value)
{
    echo '<h2>'.$value['volumeInfo']['title'].'</h2>';
    echo '<p>'.implode(', ', $value['volumeInfo']['authors']).'</p>';
    echo '<p>'.$value['volumeInfo']['description'].'</p>';
    echo '<a href="'.$value['volumeInfo']['previewLink'].'">preview link</a>';
    echo '<div><img src="'.$value['volumeInfo']['imageLinks']['thumbnail'].'"></div>';
}
