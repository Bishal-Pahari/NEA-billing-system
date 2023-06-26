<footer>
    <p>
        Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
        All Rights Reserved.
    </p>
</footer>

<script>
    const date = new Date();
    if (date.getFullYear() > 2023) {
        document.getElementById("year-change").innerHTML = date.getFullYear();
    } else {
        document.getElementById("year-change").innerHTML = 2023;
    }
</script>