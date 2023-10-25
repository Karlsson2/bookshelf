<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Black+Ops+One&family=Courgette&family=MedievalSharp&family=Nosifer&family=Orbitron&family=Special+Elite&display=swap" rel="stylesheet">
    <title>A fine bookshelf</title>
    <script>
        function handleButtonClick(value) {
            // Create a hidden input field and set its value
            var hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "selected_values[]"; // Use [] for an array of values
            hiddenInput.value = value;

            // Append the hidden input to the form
            document.forms["myForm"].appendChild(hiddenInput);

            // Submit the form
            document.forms["myForm"].submit();
        }
    </script>
</head>