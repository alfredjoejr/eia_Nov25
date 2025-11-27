<?php
$host = "localhost";
$user = "eialk_newadmin";
$pass = "J1bdt0b7ll9$";
$dbname = "eialk_logindb";
$table = "user";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$columns_to_show = ['id', 'name', 'email', 'wano','nic', 'fullName', 'address','university','course', 'examYear', 'shy', 'sex', 'memType', 'is_paid', 'created_at'];

$columns_sql = implode(", ", $columns_to_show);
$data = array();
if ($result = $conn->query("SELECT $columns_sql FROM $table")) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>
<body class="bg-gray-100 p-6">
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">User Table</h1>

    <!-- Controls -->
    <div class="flex flex-col md:flex-row md:justify-between mb-4 gap-4">
        <input type="text" id="searchInput" placeholder="Search..." class="px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200 w-full md:w-1/3">
        <button onclick="exportToExcel()" class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700">Export to Excel</button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left text-gray-700" id="userTable">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <?php foreach($columns_to_show as $col): ?>
                        <th class="px-4 py-3"><?= htmlspecialchars($col) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach($data as $row): ?>
                    <tr class="table-row">
                        <?php foreach($columns_to_show as $col): ?>
                            <td class="px-4 py-2"><?= htmlspecialchars($row[$col] ?? '') ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination Controls -->
    <div class="flex justify-between items-center mt-4">
        <button onclick="prevPage()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50" id="prevBtn">Previous</button>
        <span class="text-gray-700" id="pageIndicator">Page 1</span>
        <button onclick="nextPage()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50" id="nextBtn">Next</button>
    </div>
</div>

<script>
    const rowsPerPage = 10;
    let currentPage = 1;

    const rows = Array.from(document.querySelectorAll("#userTable tbody tr"));
    let totalPages = Math.ceil(rows.length / rowsPerPage);
    const pageIndicator = document.getElementById("pageIndicator");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    function showPage(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.forEach((row, index) => {
            row.style.display = index >= start && index < end ? "" : "none";
        });

        pageIndicator.textContent = `Page ${page}`;
        prevBtn.disabled = page === 1;
        nextBtn.disabled = page === totalPages;
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    }

    function nextPage() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    }

    // Initial display
    showPage(currentPage);

    // Search Filter
    document.getElementById("searchInput").addEventListener("input", function () {
        const query = this.value.toLowerCase();
        let visibleRows = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const match = text.includes(query);
            row.style.display = match ? "" : "none";
            if (match) visibleRows++;
        });

        currentPage = 1;
        const filtered = rows.filter(row => row.style.display !== "none");
        totalPages = Math.ceil(filtered.length / rowsPerPage);
        showPage(currentPage);
    });

    // Export to Excel
    function exportToExcel() {
        const table = document.getElementById("userTable");
        const workbook = XLSX.utils.table_to_book(table, { sheet: "User Data" });
        XLSX.writeFile(workbook, "eialkuser_data.xlsx");
    }
</script>
</body>
</html>
