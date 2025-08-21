<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="/assets/css/custom.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <div class="container">
    <h1>Invoice List</h1>
    <div class="alert alert-info">
      <h3>Attention!</h3>
      <ul>
        <li>Click on any invoice to view the details!</li>
        <li>Payments for completed invoices cannot be canceled or refunded.</li>
      </ul>
    </div>
    <table id="invoiceTable" class="table table-hover">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Type</th>
          <th>Instance</th>
          <th>Company</th>
          <th>Date Issued</th>
          <th>Due Date</th>
          <th>Payment Date</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <!-- Sample Data -->
        <tr onclick="window.location.href='/invoice/1'">
          <td>INV001</td>
          <td>Registration</td>
          <td>Instance 1</td>
          <td>Company A</td>
          <td>2025-08-01</td>
          <td>2025-08-15</td>
          <td>2025-08-10</td>
          <td>100,000</td>
        </tr>
        <tr onclick="window.location.href='/invoice/2'">
          <td>INV002</td>
          <td>Subscription</td>
          <td>Instance 2</td>
          <td>Company B</td>
          <td>2025-08-05</td>
          <td>2025-08-20</td>
          <td>2025-08-15</td>
          <td>200,000</td>
        </tr>
      </tbody>
    </table>
  </div>
  <script src="/assets/plugins/jquery/jquery.min.js"></script>
  <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#invoiceTable').DataTable();
    });
  </script>
</body>
</html>
