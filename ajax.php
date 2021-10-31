<script>
    function View_Kategori() {
        // let value = $("input[type='checkbox']").val();
        // alert(value)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax_body").innerHTML = this.responseText;
                startTime();
            }
        };

        xhttp.open("POST", "view/view_masker.php", true);
        xhttp.send();
    }

    function View_Hand_Sanitizer() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax_body").innerHTML = this.responseText;
            }
        };

        xhttp.open("POST", "view/view_masker.php", true);
        xhttp.send();
    }

    // $('input.search_kategori').on('click', function() {
    //     alert("kkk");
    // });
</script>