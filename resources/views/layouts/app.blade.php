<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">
    <style>
        a {
            list-style-type: none;
            text-decoration: none;
            color: white;
        }

        /* input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        } */
    </style>
</head>

<body>
    <div class="container">
        @yield('title')
        @yield('content')
    </div>







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    {{-- <script>
        $(document).ready(function() {
if (window.File && window.FileList && window.FileReader) {
$("#files").on("change", function(e) {
var files = e.target.files,
filesLength = files.length;
for (var i = 0; i < filesLength; i++) { var f=files[i]; var fileReader=new FileReader(); fileReader.onload=(function(e) {
    var file=e.target; $("<span class=\"pip\">" +
    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" />" +
    "<br /><span class=\"remove\">Remove image</span>" +
    "</span>").insertAfter("#files");
    $(".remove").click(function(){
    $(this).parent(".pip").remove();
    $('#files').val("");
    });

    // Old code here
    /*$("<img></img>", {
    class: "imageThumb",
    src: e.target.result,
    title: file.name + " | Click to remove"
    }).insertAfter("#files").click(function(){$(this).remove();});*/

    });
    fileReader.readAsDataURL(f);
    }
    });
    } else {
    alert("Your browser doesn't support to File API")
    }
    });
    </script> --}}
</body>

</html>
