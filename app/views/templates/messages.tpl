{if $messages->isError()}
<div class="messages">
    <h4>Wystąpiły błędy: </h4>
    <ol class="isa_error">
        {foreach $messages->getErrors() as $err}
            {strip}
                <li>{$err}</li>
            {/strip}
        {/foreach}
    </ol>
</div>
{/if}
{if $messages->isInfo()}
<div class="messages">
    <h4>Informacje: </h4>
    <ol class="isa_info">
        {foreach $messages->getInfos() as $inf}
            {strip}
                <li>{$inf}</li>
            {/strip}
        {/foreach}
    </ol>
</div>
{/if}