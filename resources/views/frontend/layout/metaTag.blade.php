
@php
    $seo =  App\Seo::first();
@endphp


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="{{ $seo->web_description }}">
<meta name="keywords" content="{{ $seo->web_keyword }}">
<meta name="author" content="{{ $seo->author }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
