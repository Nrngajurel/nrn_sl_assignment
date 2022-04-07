<?php
 header('Content-Type: application/json');
$books = [
    'The Alchemist',
    'How to win friends and influence people',
    '1000 way to make 100$',
    'The power of habit',
    'The 7 Habits of Highly Effective People',
    'The 4 hour work week',
    'The art of war',
    'The art of leadership',
    'The art of change',
    'The art of living',
    'The art of love',
    'The art of money',
    'Power of subconcious mind',
    '48 Laws of Power',
    'Think and grow rich',
    'The 4 hour work week',
    'Eat that frog',
    'The art of war',
    'The art of leadership'];

    $search = $_REQUEST['search'];

    $result = array_filter($books, function($book) use ($search){
        return str_contains(strtolower($book), strtolower($search));
    });
    echo json_encode(array_slice(array_values($result), 0 , 5));