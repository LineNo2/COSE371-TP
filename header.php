

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <style>
  .navbar-korea > *{
    font-weight: 800;
    background-color: #dc143c;
    color: #C5B9AC;
  }
  .bg-korea{
    background-color: #dc143c;
  }
  .nav-link, .navbar-brand{
    color: #C5B9AC;
  }
  .navbar-toggler {
    background-color: #C5B9AC;
  }
         
.navbar-toggler-icon {
  background-image: url(
"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 128, 0, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
  }
  </style>
<body>
<nav class="navbar navbar-expand-lg navbar-korea bg-korea">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">KU타벅스</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./employee.php">직원</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./employee_search.php">근무 관리</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./menu.php">메뉴</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./customer.php">고객</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./receipt.php">주문 내역</a>
        </li>
    </div>
  </div>
</nav> 
