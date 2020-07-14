<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCC</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="icon" type="image/png" href="./mccolor.png">

</head>

<body>

    <header>
        <span class="title">MCColor</span>
    </header>


    <center>
        <article class="description">
            <div>
                Throw your text into the area on the left and get your preview in the area on the right.<br />
                You can use any of the default color codes, like <code>§1</code> for blue, but also the new 1.16 color codes by using the syntax <code>§#RRGGBB</code>
            </div>
        </article>
    </center>

    <main>

        <section class="input">
            <textarea id="input" oninput="copy();"></textarea>
        </section>

        <section class="output">
            <div id="output">

            </div>
        </section>

    </main>

    <script>
        window.onload = function() {
            document.getElementById('input').focus();
            if (localStorage.inputContent != undefined) {
                document.getElementById('input').value = localStorage.inputContent;
                copy();
            }
        }

        window.onunload = function() {
            localStorage.inputContent = document.getElementById('input').value;
        }

        function copy() {
            text = document.getElementById('input').value;

            text = parseColorCodes(text, '§');

            document.getElementById('output').innerHTML = text;
        }

        function parseColorCodes(input, d) {
            var output = "<span>" + input;
            output = output.replace(new RegExp(d + "#([A-F]|\\d{1})([A-F]|\\d{1})([A-F]|\\d{1})([A-F]|\\d{1})([A-F]|\\d{1})([A-F]|\\d{1})", "gi"), "</span><span style=\"color: #$1$2$3$4$5$6\">");
            output = output.replace(new RegExp(d + "x" + d + "([A-F]|[0-9])" + d + "([A-F]|[0-9])" + d + "([A-F]|[0-9])" + d + "([A-F]|[0-9])" + d + "([A-F]|[0-9])" + d + "([A-F]|[0-9])", "g"), "</span><span style=\"color: #$1$2$3$4$5$6\">");
            output = output.replace(new RegExp(d + "0", "g"), "</span><span style=\"color: #000000\">");
            output = output.replace(new RegExp(d + "1", "g"), "</span><span style=\"color: #0000AA\">");
            output = output.replace(new RegExp(d + "2", "g"), "</span><span style=\"color: #00AA00\">");
            output = output.replace(new RegExp(d + "3", "g"), "</span><span style=\"color: #00AAAA\">");
            output = output.replace(new RegExp(d + "4", "g"), "</span><span style=\"color: #AA0000\">");
            output = output.replace(new RegExp(d + "5", "g"), "</span><span style=\"color: #AA00AA\">");
            output = output.replace(new RegExp(d + "6", "g"), "</span><span style=\"color: #FFAA00\">");
            output = output.replace(new RegExp(d + "7", "g"), "</span><span style=\"color: #AAAAAA\">");
            output = output.replace(new RegExp(d + "8", "g"), "</span><span style=\"color: #555555\">");
            output = output.replace(new RegExp(d + "9", "g"), "</span><span style=\"color: #5555FF\">");
            output = output.replace(new RegExp(d + "a", "g"), "</span><span style=\"color: #55FF55\">");
            output = output.replace(new RegExp(d + "b", "g"), "</span><span style=\"color: #55FFFF\">");
            output = output.replace(new RegExp(d + "c", "g"), "</span><span style=\"color: #FF5555\">");
            output = output.replace(new RegExp(d + "d", "g"), "</span><span style=\"color: #FF55FF\">");
            output = output.replace(new RegExp(d + "e", "g"), "</span><span style=\"color: #FFFF55\">");
            output = output.replace(new RegExp(d + "f", "g"), "</span><span style=\"color: #FFFFFF\">");

            output = output.replace(new RegExp(d + "l", "g"), "</span><span style=\"font-weight: bold\">");
            output = output.replace(new RegExp(d + "m", "g"), "</span><span style=\"text-decoration: line-through\">");
            output = output.replace(new RegExp(d + "n", "g"), "</span><span style=\"text-decoration: underline\">");
            output = output.replace(new RegExp(d + "o", "g"), "</span><span style=\"font-style: italic\">");
            output = output.replace(new RegExp(d + "r", "g"), "</span>");
            output = output.replace(new RegExp(d + "k", "g"), "");
            output = output.replace(/\n/g, "<br/>");
            return output + (output.endsWith("</span>") ? "" : "</span>");
        }
    </script>

</body>

</html>