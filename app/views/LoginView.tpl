{extends file="main.tpl"}

{block name=content}

    <!-- Header -->
    <header id="header" class="alt">
        <h1>STRONA LOGOWANIA</h1>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Strona główna</a></li>
            </ul>
        </nav>
    </header>

    <form action="{$conf->action_url}login" method="post">
        <legend>Logowanie do systemu</legend>
        <div class="row gtr-50 gtr-uniform">
            <div class="col-6 col-12-mobilep">
                <input type="text" name="login" id="login" placeholder="Login" />
            </div>
            <div class="col-6 col-12-mobilep">
                <input type="password" name="pass" id="pass" placeholder="Hasło" />
            </div>
            <div class="col-12">
                <ul class="actions special">
                    <li><input type="submit" value="Zaloguj" /></li>
                </ul>
            </div>
        </div>
    </form>

{include file='messages.tpl'}

{/block}
