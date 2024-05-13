
<?php
$conn = config::getConnexion();

    try {
        $query = $conn->query("SELECT * FROM hotels");
        $hotels = $query->fetchAll(PDO::FETCH_ASSOC);
        echo '<script>';
        echo 'var hotelsData = ' . json_encode($hotels) . ';'; // Convert PHP array to JavaScript object
        echo 'console.log(hotelsData);'; // Print hotel data in console for debugging
        echo '</script>';
    } catch (PDOException $e) {
        echo 'Echec de connexion:' . $e->getMessage();
    }
    ?>

    <script>
    const searchInput = document.getElementById('searchInput');
    const table = document.querySelector('.recentOrders table');
    const originalContentMap = new Map();

    function resetTable() {
        // Restore original content of each cell
        originalContentMap.forEach((content, cell) => {
            cell.innerHTML = content;
        });
        // Show all rows
        table.querySelectorAll('tr').forEach(row => row.style.display = '');
    }

    function searchHotels() {
        const searchText = searchInput.value.trim().toLowerCase();

        if (searchText === '') {
            resetTable();
            return;
        }

        table.querySelectorAll('tr').forEach(row => {
            let found = false;

            row.querySelectorAll('td').forEach(cell => {
                const cellText = cell.textContent.trim().toLowerCase();
                if (!originalContentMap.has(cell)) {
                    // Store original content of the cell before applying highlighting
                    originalContentMap.set(cell, cell.innerHTML);
                }
                if (cellText.includes(searchText)) {
                    // Highlight the matching text within the cell
                    const regex = new RegExp(searchText, 'gi');
                    const highlightedText = cellText.replace(regex, match => `<span class="highlight">${match}</span>`);
                    cell.innerHTML = highlightedText;
                    found = true;
                }
            });

            // Show or hide the row based on search result
            row.style.display = found ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', searchHotels);
</script>