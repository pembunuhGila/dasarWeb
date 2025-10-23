<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi (AJAX)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .success-msg { color: green; font-weight: bold; }
        .error-server { color: blue; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Form Input dengan Validasi (AJAX)</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>

        <button type="submit" id="submitBtn">Submit</button>
    </form>
    
    <div id="hasil-ajax" style="margin-top: 15px;"></div>

    <script>
    $(document).ready(function() {
        $("#myForm").submit(function(event) {
            event.preventDefault(); 
            
            var nama = $("#nama").val();
            var email = $("#email").val();
            var valid = true;
            
            $("#nama-error").text("");
            $("#email-error").text("");
            $("#hasil-ajax").html("");

            if (nama === "") {
                $("#nama-error").text("Nama harus diisi.");
                valid = false;
            }

            if (email === "") {
                $("#email-error").text("Email harus diisi.");
                valid = false;
            } 
            
            if (valid) {
                const $form = $(this);
                const $submitBtn = $("#submitBtn");
                
                $submitBtn.prop('disabled', true).text('Mengirim...');
                
                $.ajax({
                    url: "proses_validasi.php",
                    type: "POST",
                    data: $form.serialize(),
                    dataType: "json",
                    
                    success: function (response) {
                        if (response.status === 'success') {
                            $("#hasil-ajax").html('<div class="success-msg">' + response.message + '</div>');
                            $("#myForm")[0].reset();
                        } else if (response.status === 'error') {
                            let errorMessage = '<div class="error-server">Validasi Gagal Server:</div><ul>';
                            $.each(response.errors, function(index, message) {
                                errorMessage += '<li>' + message + '</li>';
                            });
                            errorMessage += '</ul>';
                            $("#hasil-ajax").html(errorMessage);
                        }
                    },
                    
                    error: function(jqXHR, textStatus, errorThrown) {
                        $("#hasil-ajax").html('<div style="color: red;">Terjadi kesalahan server: ' + textStatus + '</div>');
                    },
                    
                    complete: function() {
                        $submitBtn.prop('disabled', false).text('Submit');
                    }
                });
            }
        });
    });
    </script>
</body>
</html>