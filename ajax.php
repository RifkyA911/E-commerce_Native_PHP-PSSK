<script>
    /// JQUERY Search item berdasarkan dari inputbox kategori 
    $("input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            /// masker 
            if ($(this).data('id') == '1') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax_body").innerHTML = this.responseText;

                    }
                };
                xhttp.open("POST", "view/view_masker.php", true);
                xhttp.send();
            }
            /// hand sanitizer
            else if ($(this).data('id') == '2') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax_body").innerHTML = this.responseText;

                    }
                };
                xhttp.open("POST", "view/view_hand_sanitizer.php", true);
                xhttp.send();
            }
            /// sarung tangan
            else if ($(this).data('id') == '3') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax_body").innerHTML = this.responseText;

                    }
                };
                xhttp.open("POST", "view/view_sarung_tangan.php", true);
                xhttp.send();
            }
            /// obat-obatan
            else if ($(this).data('id') == '4') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax_body").innerHTML = this.responseText;

                    }
                };
                xhttp.open("POST", "view/view_obat.php", true);
                xhttp.send();
            }
            /// face_shield
            else if ($(this).data('id') == '5') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax_body").innerHTML = this.responseText;

                    }
                };
                xhttp.open("POST", "view/view_face_shield.php", true);
                xhttp.send();
            }
            /// termometer
            else if ($(this).data('id') == '6') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax_body").innerHTML = this.responseText;

                    }
                };
                xhttp.open("POST", "view/view_termometer.php", true);
                xhttp.send();
            }
        }
        /// jika inputbox di hilangkan 
        else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ajax_body").innerHTML = this.responseText;

                }
            };
            xhttp.open("POST", "view/view_index.php", true);
            xhttp.send();
        }
    });
</script>