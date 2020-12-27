{extends file="main.tpl"}

{block name="content"}

    <!-- Header -->
    <header id="header" class="alt">
        <h1>WYNIKI</h1>
        <nav id="nav">
            <ul>
                <li>Użytkownik: {$user->login}, Rola: {$user->role}</li>
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="{$conf->action_url}logout">Wyloguj</a></li>
            </ul>
        </nav>
    </header>

    <h4>Wynik: </h4>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Kwota</th>
            <th>Ilość lat</th>
            <th>Oprocentowanie</th>
            <th>Miesięczna rata</th>
            <th>Data dodania</th>
        </tr>
        </thead>
    <tbody>
        {foreach $records as $data}
        <tr>
        <td>{$data["idwynik"]}</td>
        <td>{$data["kwota"]}</td>
        <td>{$data["lat"]}</td>
        <td>{$data["procent"]}</td>
        <td>{$data["rata"]}</td>
        <td>{$data["data"]}</td>
        </tr>
        {/foreach}
    </tbody>
    </table>

    {include file='messages.tpl'}


{/block}