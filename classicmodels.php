<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassicModels — Database Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0f1117;
            --surface:   #1a1d27;
            --card:      #21253a;
            --border:    #2e3352;
            --accent:    #5b7fff;
            --accent-dim:#3a52b8;
            --success:   #2ecc71;
            --error:     #e74c3c;
            --text:      #e8eaf4;
            --muted:     #8890b0;
            --label:     #b0b8d8;
            --radius:    10px;
            --shadow:    0 8px 32px rgba(0,0,0,0.45);
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 16px 60px;
        }

        /* ── Header ── */
        header {
            text-align: center;
            margin-bottom: 36px;
        }
        header .eyebrow {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 8px;
        }
        header h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(26px, 5vw, 42px);
            font-weight: 700;
            color: var(--text);
            line-height: 1.1;
        }
        header p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 14px;
        }

        /* ── Shell ── */
        .shell {
            width: 100%;
            max-width: 680px;
        }

        /* ── Tabs ── */
        .tab-bar {
            display: flex;
            gap: 4px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 5px;
            margin-bottom: 24px;
        }
        .tab-btn {
            flex: 1;
            padding: 10px 8px;
            background: transparent;
            border: none;
            border-radius: 7px;
            color: var(--muted);
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: background .2s, color .2s;
            white-space: nowrap;
        }
        .tab-btn:hover { color: var(--text); background: var(--card); }
        .tab-btn.active {
            background: var(--accent);
            color: #fff;
        }

        /* ── Panel ── */
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── Card ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 32px 36px;
            box-shadow: var(--shadow);
        }
        .card-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .card-sub {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 28px;
        }

        /* ── Form ── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        .form-grid .full { grid-column: 1 / -1; }

        .field { display: flex; flex-direction: column; gap: 6px; }
        label {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
            color: var(--label);
            text-transform: uppercase;
        }
        input, textarea, select {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 7px;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            padding: 10px 13px;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
            width: 100%;
        }
        input::placeholder, textarea::placeholder { color: var(--muted); }
        input:focus, textarea:focus, select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(91,127,255,.18);
        }
        textarea { resize: vertical; min-height: 88px; }

        .hint { font-size: 11px; color: var(--muted); margin-top: 2px; }

        /* ── Submit Button ── */
        .btn-submit {
            margin-top: 26px;
            width: 100%;
            padding: 13px;
            background: var(--accent);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .3px;
            cursor: pointer;
            transition: background .2s, transform .1s;
        }
        .btn-submit:hover  { background: var(--accent-dim); }
        .btn-submit:active { transform: scale(.98); }

        /* ── Secondary Button ── */
        .btn-secondary {
            padding: 10px 20px;
            background: transparent;
            border: 1px solid var(--accent);
            border-radius: 8px;
            color: var(--accent);
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s, color .2s;
        }
        .btn-secondary:hover { background: var(--accent); color: #fff; }

        /* ── Alert ── */
        .alert {
            border-radius: 8px;
            padding: 13px 16px;
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success { background: rgba(46,204,113,.12); border: 1px solid rgba(46,204,113,.35); color: var(--success); }
        .alert-error   { background: rgba(231,76, 60,.12); border: 1px solid rgba(231,76, 60,.35); color: var(--error); }
        .alert-icon { font-size: 18px; flex-shrink: 0; }

        /* ── Search Section ── */
        .search-block {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 22px 24px;
            margin-bottom: 20px;
        }
        .search-block h3 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 14px;
            color: var(--label);
            text-transform: uppercase;
            letter-spacing: .8px;
        }
        .search-row {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }
        .search-row .field { flex: 1; }

        /* ── Results Table ── */
        .results-wrap { margin-top: 22px; }
        .results-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }
        th, td {
            border: 1px solid var(--border);
            padding: 10px 14px;
            text-align: left;
        }
        th {
            background: var(--card);
            color: var(--label);
            font-weight: 600;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: .6px;
        }
        tr:nth-child(even) td { background: rgba(255,255,255,.02); }
        tr:hover td { background: rgba(91,127,255,.06); }

        .empty-msg {
            color: var(--muted);
            font-size: 13px;
            padding: 12px 0;
        }

        /* ── Divider ── */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 28px 0;
        }

        @media (max-width: 520px) {
            .card { padding: 22px 18px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-grid .full { grid-column: 1; }
        }
    </style>
</head>
<body>

<?php
// ── Database connection ────────────────────────────────────────────
function getConn() {
    $conn = new mysqli("localhost", "root", "", "classicmodels");
    if ($conn->connect_error) {
        die("<p style='color:#e74c3c;padding:20px;'>Koneksi gagal: " . $conn->connect_error . "</p>");
    }
    $conn->set_charset("utf8");
    return $conn;
}

// ── Process: Insert Order ──────────────────────────────────────────
$orderMsg = '';
if (isset($_POST['submit_order'])) {
    $conn = getConn();
    $orderNumber   = (int) $_POST['orderNumber'];
    $orderDate     = $conn->real_escape_string($_POST['orderDate']);
    $requiredDate  = $conn->real_escape_string($_POST['requiredDate']);
    $shippedDate   = !empty($_POST['shippedDate']) ? "'" . $conn->real_escape_string($_POST['shippedDate']) . "'" : "NULL";
    $status        = $conn->real_escape_string($_POST['status']);
    $comments      = $conn->real_escape_string($_POST['comments']);
    $customerNumber = (int) $_POST['customerNumber'];

    $sql = "INSERT INTO orders (orderNumber, orderDate, requiredDate, shippedDate, status, comments, customerNumber)
            VALUES ($orderNumber, '$orderDate', '$requiredDate', $shippedDate, '$status', '$comments', $customerNumber)";

    if ($conn->query($sql) === TRUE) {
        $orderMsg = ['type' => 'success', 'text' => 'Order #' . $orderNumber . ' berhasil ditambahkan ke database.'];
    } else {
        $orderMsg = ['type' => 'error', 'text' => 'Error: ' . $conn->error];
    }
    $conn->close();
}

// ── Process: Insert Product ────────────────────────────────────────
$productMsg = '';
if (isset($_POST['submit_product'])) {
    $conn = getConn();
    $productCode        = $conn->real_escape_string($_POST['productCode']);
    $productName        = $conn->real_escape_string($_POST['productName']);
    $productLine        = $conn->real_escape_string($_POST['productLine']);
    $productScale       = $conn->real_escape_string($_POST['productScale']);
    $productVendor      = $conn->real_escape_string($_POST['productVendor']);
    $productDescription = $conn->real_escape_string($_POST['productDescription']);
    $quantityInStock    = (int)   $_POST['quantityInStock'];
    $buyPrice           = (float) $_POST['buyPrice'];
    $MSRP               = (float) $_POST['MSRP'];

    $sql = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
            VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', $quantityInStock, $buyPrice, $MSRP)";

    if ($conn->query($sql) === TRUE) {
        $productMsg = ['type' => 'success', 'text' => 'Produk "' . htmlspecialchars($_POST['productName']) . '" berhasil ditambahkan.'];
    } else {
        $productMsg = ['type' => 'error', 'text' => 'Error: ' . $conn->error];
    }
    $conn->close();
}

// ── Process: Search ────────────────────────────────────────────────
$searchCityResults = null;
$searchDateResults = null;
$searchCityQuery   = '';
$searchDateQuery   = '';

if (isset($_GET['btn_search_city']) && !empty($_GET['city'])) {
    $conn = getConn();
    $searchCityQuery = $conn->real_escape_string($_GET['city']);
    $result = $conn->query("SELECT customerName FROM customers WHERE city = '$searchCityQuery'");
    $searchCityResults = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { $searchCityResults[] = $row; }
    }
    $conn->close();
}

if (isset($_GET['btn_search_date']) && !empty($_GET['shippedDate'])) {
    $conn = getConn();
    $searchDateQuery = $conn->real_escape_string($_GET['shippedDate']);
    $sql = "SELECT DISTINCT c.customerName
            FROM customers c
            JOIN orders o ON c.customerNumber = o.customerNumber
            WHERE o.shippedDate = '$searchDateQuery'";
    $result = $conn->query($sql);
    $searchDateResults = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { $searchDateResults[] = $row; }
    }
    $conn->close();
}

// ── Active tab logic ───────────────────────────────────────────────
$activeTab = 'order';
if (isset($_POST['submit_product']) || (isset($_GET['active']) && $_GET['active'] === 'product')) {
    $activeTab = 'product';
} elseif (isset($_GET['btn_search_city']) || isset($_GET['btn_search_date']) || (isset($_GET['active']) && $_GET['active'] === 'search')) {
    $activeTab = 'search';
}
?>

<header>
    <div class="eyebrow">ClassicModels</div>
    <h1>Database Manager</h1>
    <p>Manage orders, products, and customer records</p>
</header>

<div class="shell">

    <!-- Tab Bar -->
    <div class="tab-bar">
        <button class="tab-btn <?= $activeTab === 'order'   ? 'active' : '' ?>" onclick="switchTab('order')">📦 Insert Order</button>
        <button class="tab-btn <?= $activeTab === 'product' ? 'active' : '' ?>" onclick="switchTab('product')">🏷️ Insert Product</button>
        <button class="tab-btn <?= $activeTab === 'search'  ? 'active' : '' ?>" onclick="switchTab('search')">🔍 Search Customers</button>
    </div>

    <!-- ══════════ TAB 1: INSERT ORDER ══════════ -->
    <div id="tab-order" class="tab-panel <?= $activeTab === 'order' ? 'active' : '' ?>">
        <div class="card">
            <div class="card-title">New Order</div>
            <div class="card-sub">Fill in all required fields to register a new order.</div>

            <?php if ($orderMsg): ?>
                <div class="alert alert-<?= $orderMsg['type'] ?>">
                    <span class="alert-icon"><?= $orderMsg['type'] === 'success' ? '✓' : '✕' ?></span>
                    <?= htmlspecialchars($orderMsg['text']) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="?active=order">
                <div class="form-grid">
                    <div class="field">
                        <label>Order Number *</label>
                        <input type="number" name="orderNumber" placeholder="e.g. 10500" required>
                    </div>
                    <div class="field">
                        <label>Customer Number *</label>
                        <input type="number" name="customerNumber" placeholder="e.g. 103" required>
                    </div>
                    <div class="field">
                        <label>Order Date *</label>
                        <input type="date" name="orderDate" required>
                    </div>
                    <div class="field">
                        <label>Required Date *</label>
                        <input type="date" name="requiredDate" required>
                    </div>
                    <div class="field">
                        <label>Shipped Date</label>
                        <input type="date" name="shippedDate">
                        <span class="hint">Optional — leave blank if not yet shipped.</span>
                    </div>
                    <div class="field">
                        <label>Status *</label>
                        <select name="status" required>
                            <option value="" disabled selected>Pick a status</option>
                            <option value="In Process">In Process</option>
                            <option value="Shipped">Shipped</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Disputed">Disputed</option>
                        </select>
                    </div>
                    <div class="field full">
                        <label>Comments</label>
                        <textarea name="comments" placeholder="Any internal notes about this order…"></textarea>
                    </div>
                </div>
                <button type="submit" name="submit_order" class="btn-submit">Save Order</button>
            </form>
        </div>
    </div>

    <!-- ══════════ TAB 2: INSERT PRODUCT ══════════ -->
    <div id="tab-product" class="tab-panel <?= $activeTab === 'product' ? 'active' : '' ?>">
        <div class="card">
            <div class="card-title">New Product</div>
            <div class="card-sub">Add a new product to the catalog.</div>

            <?php if ($productMsg): ?>
                <div class="alert alert-<?= $productMsg['type'] ?>">
                    <span class="alert-icon"><?= $productMsg['type'] === 'success' ? '✓' : '✕' ?></span>
                    <?= htmlspecialchars($productMsg['text']) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="?active=product">
                <div class="form-grid">
                    <div class="field">
                        <label>Product Code *</label>
                        <input type="text" name="productCode" placeholder="e.g. S10_1678" required>
                    </div>
                    <div class="field">
                        <label>Product Name *</label>
                        <input type="text" name="productName" placeholder="e.g. 1969 Harley Davidson" required>
                    </div>
                    <div class="field">
                        <label>Product Line *</label>
                        <input type="text" name="productLine" placeholder="e.g. Motorcycles" required>
                    </div>
                    <div class="field">
                        <label>Scale *</label>
                        <input type="text" name="productScale" placeholder="e.g. 1:10" required>
                    </div>
                    <div class="field full">
                        <label>Vendor *</label>
                        <input type="text" name="productVendor" placeholder="e.g. Min Lin Diecast" required>
                    </div>
                    <div class="field full">
                        <label>Description *</label>
                        <textarea name="productDescription" placeholder="Detailed description of the product…" required></textarea>
                    </div>
                    <div class="field">
                        <label>Quantity in Stock *</label>
                        <input type="number" name="quantityInStock" placeholder="e.g. 7933" min="0" required>
                    </div>
                    <div class="field">
                        <!-- spacer on small screens -->
                    </div>
                    <div class="field">
                        <label>Buy Price (USD) *</label>
                        <input type="number" step="0.01" name="buyPrice" placeholder="e.g. 48.81" min="0" required>
                    </div>
                    <div class="field">
                        <label>MSRP (USD) *</label>
                        <input type="number" step="0.01" name="MSRP" placeholder="e.g. 95.70" min="0" required>
                    </div>
                </div>
                <button type="submit" name="submit_product" class="btn-submit">Save Product</button>
            </form>
        </div>
    </div>

    <!-- ══════════ TAB 3: SEARCH ══════════ -->
    <div id="tab-search" class="tab-panel <?= $activeTab === 'search' ? 'active' : '' ?>">
        <div class="card">
            <div class="card-title">Search Customers</div>
            <div class="card-sub">Look up customers by city or shipped date.</div>

            <!-- Search by City -->
            <div class="search-block">
                <h3>By City</h3>
                <form method="GET" action="">
                    <input type="hidden" name="active" value="search">
                    <div class="search-row">
                        <div class="field">
                            <label>City</label>
                            <input type="text" name="city" placeholder="e.g. Las Vegas"
                                value="<?= htmlspecialchars($_GET['city'] ?? '') ?>" required>
                        </div>
                        <button type="submit" name="btn_search_city" class="btn-secondary">Search</button>
                    </div>
                </form>

                <?php if ($searchCityResults !== null): ?>
                    <div class="results-wrap">
                        <div class="results-title">
                            <?= count($searchCityResults) ?> result<?= count($searchCityResults) !== 1 ? 's' : '' ?>
                            for "<?= htmlspecialchars($searchCityQuery) ?>"
                        </div>
                        <?php if (count($searchCityResults) > 0): ?>
                            <table>
                                <tr><th>Customer Name</th></tr>
                                <?php foreach ($searchCityResults as $row): ?>
                                    <tr><td><?= htmlspecialchars($row['customerName']) ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                        <?php else: ?>
                            <p class="empty-msg">No customers found in <strong><?= htmlspecialchars($searchCityQuery) ?></strong>.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Search by Shipped Date -->
            <div class="search-block">
                <h3>By Shipped Date</h3>
                <form method="GET" action="">
                    <input type="hidden" name="active" value="search">
                    <div class="search-row">
                        <div class="field">
                            <label>Shipped Date</label>
                            <input type="date" name="shippedDate"
                                value="<?= htmlspecialchars($_GET['shippedDate'] ?? '') ?>" required>
                        </div>
                        <button type="submit" name="btn_search_date" class="btn-secondary">Search</button>
                    </div>
                </form>

                <?php if ($searchDateResults !== null): ?>
                    <div class="results-wrap">
                        <div class="results-title">
                            <?= count($searchDateResults) ?> result<?= count($searchDateResults) !== 1 ? 's' : '' ?>
                            for <?= htmlspecialchars($searchDateQuery) ?>
                        </div>
                        <?php if (count($searchDateResults) > 0): ?>
                            <table>
                                <tr><th>Customer Name</th></tr>
                                <?php foreach ($searchDateResults as $row): ?>
                                    <tr><td><?= htmlspecialchars($row['customerName']) ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                        <?php else: ?>
                            <p class="empty-msg">No customers found with orders shipped on <strong><?= htmlspecialchars($searchDateQuery) ?></strong>.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div><!-- /.shell -->

<script>
function switchTab(name) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + name).classList.add('active');
    event.currentTarget.classList.add('active');
}
</script>

</body>
</html>
