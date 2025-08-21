<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Detail</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body>
  <div class="container">
    <h1>Invoice Detail</h1>
    <div class="invoice">
      <div class="row">
        <div class="col-12">
          <h4><small class="float-right text-danger font-weight-bold">UNPAID</small></h4>
          <h4>Invoice: INV001</h4>
          <p>Issued Date: 2025-08-01</p>
          <p>Due Date: 2025-08-15</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <strong>From:</strong>
          <address>
            <strong>RLRADIUS</strong><br>
            Jalan Cempaka Raya By Pass MKS<br>
            Kota Bukittinggi - Sumatera Barat<br>
            082170824476
          </address>
        </div>
        <div class="col-sm-4">
          <strong>To:</strong>
          <address>
            <strong>Company A</strong><br>
            Jl. Palam<br>
            Banjarbaru - Kalimantan Selatan<br>
            081349335089
          </address>
        </div>
      </div>
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Description</th>
                <th class="text-right">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Service Fee</td>
                <td class="text-right">100,000</td>
              </tr>
              <tr>
                <td>Registration Fee</td>
                <td class="text-right">0</td>
              </tr>
              <tr>
                <td class="text-right">Subtotal:</td>
                <td class="text-right">100,000</td>
              </tr>
              <tr>
                <td class="text-right">Total Amount:</td>
                <td class="text-right font-weight-bold">100,000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row no-print">
        <div class="col-12">
          <button onclick="window.print()" class="btn btn-secondary float-right"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
