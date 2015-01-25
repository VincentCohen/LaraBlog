<!DOCTYPE html>
<head>
        <title>LaraBlog</title>

        <base href="http://localhost/blog/public/">

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300|Slabo+27px" rel="stylesheet" type="text/css">

        {{ HTML::style('assets/css/global.css'); }}
</head>
<body>

        <div id="container">
            <h1><a href="./">The Random Journal Of Randomness</a></h1>
            @yield('content')
        </div>
</body>
</html>