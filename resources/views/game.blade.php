<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <game :lottery="{{ App\Models\ParentLottery::find(1)->currentLottery() }}"></game>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>