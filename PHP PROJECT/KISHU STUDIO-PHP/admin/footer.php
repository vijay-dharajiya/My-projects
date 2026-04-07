</div> <!-- content -->
</div> <!-- main -->

<script>
function toggleMenu(id, el){
    let menu = document.getElementById(id);
    menu.classList.toggle("show");

    let icon = el.querySelector(".rotate");
    if(icon){
        icon.classList.toggle("active");
    }
}
</script>

</body>
</html>