<nav class="nav">
    <div class="nav-left">
        <ul>
            <li>
                <a class="external-link" onclick=refresh()>Escapism</a>
            </li>
        </ul>
    </div>
    <div class="nav-right">
        <ul>
            <li><a href="/tags">Tags</a></li>
            <li><a href="/map">Map</a></li>
        </ul>
    </div>
</nav>

<script type="text/javascript">
    function refresh () {
        window.location.href = '/?q=' + (new Date().getTime());
    }
</script>
