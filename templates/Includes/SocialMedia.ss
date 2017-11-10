<div class="SocialMediaBlock align-left">

    <% loop $SocialMedia %>
        <a href="$Link" class="socialmedia" title="{$Name}" target="_blank">
            <img src="{$Icon.URL}" class="img-responsive" alt="{$Name}"/>
        </a>
    <% end_loop %>

</div>
