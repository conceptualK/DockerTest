<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$file = fopen("contacts.csv", "r");

if ($file === false) {
    die("Error: Unable to open the file.");
}

$data = [];
$headers = fgetcsv($file); // Read the first row as headers

if ($headers === false) {
    die("Error: The CSV file is empty or not properly formatted.");
}

echo "<pre>";
while (!feof($file)) {
    $row = fgetcsv($file);
    if ($row) { // Check if the row is valid
        // print_r($row); // Print each row for debugging
        $data[] = array_combine($headers, $row);
    }
}

fclose($file);


// Convert the array to JSON and print it
echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // let data = JSON.stringify(<?php echo json_encode($data); ?>) ; 
    let data = <?php echo json_encode($data); ?> ; 


    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/posts',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: 'application/json; charset=UTF-8',
        success: function(response) {
            console.log('Response:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

</script>
</body>
</html>