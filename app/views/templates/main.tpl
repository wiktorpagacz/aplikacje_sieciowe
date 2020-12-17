<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
<head>
    <title>Alpha by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />

</head>
<body class="landing is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1>KALKULATOR</h1>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <h2>{$page_title|default:"Aplikacje sieciowe - tytuł domyślny"}</h2>
    </section>

    <!-- Main -->
    <section id="main" class="container">


        <section class="box special">
            <header class="major">
                <h2>{$page_header|default:"Opis strony bez kalkulatora"}</h2>
                <p>{$page_description|default:"Opis strony"}</p>
            </header>

            {block name=content} Domyślna treść zawartości .... {/block}

        </section>




    </section>


    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>WP All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>