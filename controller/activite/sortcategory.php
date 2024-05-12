<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Sort</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <select id="sortOption" class="form-control">
                                    <option value="a-z">A-Z (Ascending Order)</option>
                                    <option value="z-a">Z-A (Descending Order)</option>
                                </select>
                                <button type="button" class="input-group-text btn btn-primary" id="sortBtn">Sort</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <!-- Add more table headers as needed -->
                    </tr>
                </thead>
                <tbody id="categoryTableBody">
                    <!-- Category table body will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    // Function to fetch sorted category data via AJAX
    function fetchSortedData(sortOrder) {
        $.ajax({
            url: 'fetch_sorted_data.php', // Update the URL to the PHP file that fetches sorted data
            type: 'GET',
            data: {
                sort_alphabet: sortOrder
            },
            success: function(response) {
                $('#categoryTableBody').html(response); // Update the table body with sorted data
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Event listener for the Sort button click
    $('#sortBtn').click(function() {
        var sortOrder = $('#sortOption').val(); // Get the selected sorting order
        fetchSortedData(sortOrder); // Fetch sorted data
    });

    // Initial load to display the table with default sorting
    fetchSortedData('a-z');
});
</script>

</body>
</html>
