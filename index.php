<?php
$routes = [
    '/' => 'This is the first page',
    '/hello' => 'Hello World',
    '/users' => 'A list of users!'
];

$requestHandler = function($request) use ($routes) {
    $path = parse_url($request, PHP_URL_PATH); 
    if (isset($routes[$path])) {
        return $routes[$path];
    }
    return '404 Not Found'; 
};
$host = '0.0.0.0';
$port = 8080;
echo "Server started at http://$host:$port\n";
echo "Press Ctrl+C to stop.\n";

$server = function() use ($requestHandler) {
    $uri = $_SERVER['REQUEST_URI'];
    $response = $requestHandler($uri); 
    echo $response; 
};

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $server(); 
}

?>
