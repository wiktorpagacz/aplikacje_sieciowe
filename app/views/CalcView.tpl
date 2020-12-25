{extends file="main.tpl"}

{block name="content"}

    <!-- Header -->
    <header id="header" class="alt">
        <h1>KALKULATOR KREDYTOWY</h1>
        <nav id="nav">
            <ul>
                <li>Użytkownik: {$user->login}, Rola: {$user->role}</li>
                <li><a href="{$conf->action_url}logout">Wyloguj</a></li>
            </ul>
        </nav>
    </header>

    <form method="post" action="{$conf->action_root}credCalcCompute">
        <div class="row gtr-50 gtr-uniform">
            <div class="col-6 col-12-mobilep">
                <input type="text" name="amount" id="amount" value="{$form->amount}" placeholder="Kwota kredytu" />
            </div>
            <div class="col-6 col-12-mobilep">
                <input type="text" name="years" id="years" value="{$form->years}" placeholder="Okres splaty w latach" />
            </div>
            <div class="col-12">
                <input type="text" name="interest" id="interest" value="{$form->interest}" placeholder="Oprocentowanie" />
            </div>
            <div class="col-12">
                <ul class="actions special">
                    <li><input type="submit" value="Oblicz" /></li>
                </ul>
            </div>
        </div>
    </form>

    {include file='messages.tpl'}

    {if isset($result->result)}
        <h4>Wynik: </h4>
        <p class="isa_success">
            {$result->result}
        </p>
    {/if}

{/block}