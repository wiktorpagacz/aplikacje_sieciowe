{extends file=$conf->root_path|cat:"/templates/main.tpl"}

{block name="content"}

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
<div class="messages">
    {if $messages->isError()}
        <h4>Wystąpiły błędy: </h4>
            <ol class="isa_error">
            {foreach $messages->getErrors() as $err}
                {strip}
                <li>{$err}</li>
                {/strip}
            {/foreach}
            </ol>
    {/if}

    {if $messages->isInfo()}
        <h4>Informacje: </h4>
        <ol class="isa_info">
            {foreach $messages->getInfos() as $inf}
                {strip}
                    <li>{$inf}</li>
                {/strip}
            {/foreach}
        </ol>
    {/if}

    {if isset($result->result)}
        <h4>Wynik: </h4>
        <p class="isa_success">
            {$result->result}
        </p>
    {/if}
</div>
{/block}