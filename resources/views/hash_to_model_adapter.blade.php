@extends(backpack_view('blank'))

<!DOCTYPE html>
<html>
<head>
    <title>Meine Seite</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<form>
    <label for="text-input">Text eingeben:</label>
    <input type="text" id="text-input" name="text-input">
    <button type="button" id="submit-button">Absenden</button>
</form>

<script>
    $(document).ready(function() {
        $('#submit-button').click(function() {
            var textInput = $('#text-input').val();
            $.ajax({
                type: "POST",
                url: "/submit",
                data: {
                    textInput: textInput
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
</body>
</html>
