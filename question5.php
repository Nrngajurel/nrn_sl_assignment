<!-- Write a program to load data from a server in a web page using AJAX request-response cycle. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Book</title>
</head>
<body>
    <h2>Book Search</h2>
    <input type="text" name="search" id="search">
    <div id="suggestions">

    </div>
    
    <script>
        document.getElementById("search").addEventListener("keyup", function(e){
            var search = e.target.value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "question5_server.php?search=" + search, true);
            xhr.onload = function(){
                if(this.status == 200){
                    var books = JSON.parse(this.responseText);
                    console.log(books);
                    var html = "";
                    // log books type
                    console.info(this.responseText);
                    books.forEach(function(book){
                        html += "<p>" + book + "</p>";
                    });
                    document.getElementById("suggestions").innerHTML = html;
                }
            }
            xhr.send();
        });

    </script>
</body>
</html>