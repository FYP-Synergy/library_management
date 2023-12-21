<?php
include_once('../db.php');
include_once('NavigationBar.php');

$categoryName = '';

if (isset($_GET['category'])) {
  $selectedCategory = $_GET['category'];

  $categoryQuery = "SELECT category_name FROM category WHERE category_id = ?";
  $stmtCategory = mysqli_prepare($conn, $categoryQuery);
  mysqli_stmt_bind_param($stmtCategory, "s", $selectedCategory);
  mysqli_stmt_execute($stmtCategory);
  $categoryResult = mysqli_stmt_get_result($stmtCategory);

  if ($row = mysqli_fetch_assoc($categoryResult)) {
    $categoryName = $row['category_name'];
  }

  $booksQuery = "SELECT * FROM book WHERE category_id = ?";
  $stmt = mysqli_prepare($conn, $booksQuery);
  mysqli_stmt_bind_param($stmt, "s", $selectedCategory);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $categoryName; ?>
  </title>
</head>

<body>
  <div class="showBookBox">
    <div class="showBookIntro">

      <div class="ShowBookTitleBox" id="ShowBookTitleBoxId">
        <h2 class="ui header horizontal divider" id="ShowBookTitle">
          <?php echo $categoryName; ?>
        </h2>
      </div>

      <div style="position:absolute; bottom:0; width:100%;">
        <svg id="" preserveAspectRatio="xMidYMax meet" class="svg-separator sep1" viewBox="0 0 1600 160"
          style="z-index:7; background:transparent;" data-height="100">
          <path class="animated-path" style="opacity: 1;fill: #ddd;" d="M1040,56c0.5,0,1,0,1.6,0c-16.6-8.9-36.4-15.7-66.4-15.7c-56,0-76.8,23.7-106.9,41C881.1,89.3,895.6,96,920,96
C979.5,96,980,56,1040,56z"></path>
          <path class="animated-path" style="opacity: 1;" d="M1699.8,96l0,10H1946l-0.3-6.9c0,0,0,0-88,0s-88.6-58.8-176.5-58.8c-51.4,0-73,20.1-99.6,36.8
c14.5,9.6,29.6,18.9,58.4,18.9C1699.8,96,1699.8,96,1699.8,96z"></path>
          <path class="animated-path" style="opacity: 1;" d="M1400,96c19.5,0,32.7-4.3,43.7-10c-35.2-17.3-54.1-45.7-115.5-45.7c-32.3,0-52.8,7.9-70.2,17.8
c6.4-1.3,13.6-2.1,22-2.1C1340.1,56,1340.3,96,1400,96z"></path>
          <path class="animated-path" style="opacity: 1;" d="M320,56c6.6,0,12.4,0.5,17.7,1.3c-17-9.6-37.3-17-68.5-17c-60.4,0-79.5,27.8-114,45.2
c11.2,6,24.6,10.5,44.8,10.5C260,96,259.9,56,320,56z"></path>
          <path class="animated-path" style="opacity: 1;" d="M680,96c23.7,0,38.1-6.3,50.5-13.9C699.6,64.8,679,40.3,622.2,40.3c-30,0-49.8,6.8-66.3,15.8
c1.3,0,2.7-0.1,4.1-0.1C619.7,56,620.2,96,680,96z"></path>
          <path class="animated-path" style="opacity: 1;" d="M-40,95.6c28.3,0,43.3-8.7,57.4-18C-9.6,60.8-31,40.2-83.2,40.2c-14.3,0-26.3,1.6-36.8,4.2V106h60V96L-40,95.6
z"></path>
          <path class="animated-path" style="opacity: 1;" d="M504,73.4c-2.6-0.8-5.7-1.4-9.6-1.4c-19.4,0-19.6,13-39,13c-19.4,0-19.5-13-39-13c-14,0-18,6.7-26.3,10.4
C402.4,89.9,416.7,96,440,96C472.5,96,487.5,84.2,504,73.4z"></path>
          <path class="animated-path" style="opacity: 1;" d="M1205.4,85c-0.2,0-0.4,0-0.6,0c-19.5,0-19.5-13-39-13s-19.4,12.9-39,12.9c0,0-5.9,0-12.3,0.1
c11.4,6.3,24.9,11,45.5,11C1180.6,96,1194.1,91.2,1205.4,85z"></path>
          <path class="animated-path" style="opacity: 1;" d="M1447.4,83.9c-2.4,0.7-5.2,1.1-8.6,1.1c-19.3,0-19.6-13-39-13s-19.6,13-39,13c-3,0-5.5-0.3-7.7-0.8
c11.6,6.6,25.4,11.8,46.9,11.8C1421.8,96,1435.7,90.7,1447.4,83.9z"></path>
          <path class="animated-path" style="opacity: 1;" d="M985.8,72c-17.6,0.8-18.3,13-37,13c-19.4,0-19.5-13-39-13c-18.2,0-19.6,11.4-35.5,12.8
c11.4,6.3,25,11.2,45.7,11.2C953.7,96,968.5,83.2,985.8,72z"></path>
          <path class="animated-path" style="opacity: 1;" d="M743.8,73.5c-10.3,3.4-13.6,11.5-29,11.5c-19.4,0-19.5-13-39-13s-19.5,13-39,13c-0.9,0-1.7,0-2.5-0.1
c11.4,6.3,25,11.1,45.7,11.1C712.4,96,727.3,84.2,743.8,73.5z"></path>
          <path class="animated-path" style="opacity: 1;" d="M265.5,72.3c-1.5-0.2-3.2-0.3-5.1-0.3c-19.4,0-19.6,13-39,13c-19.4,0-19.6-13-39-13
c-15.9,0-18.9,8.7-30.1,11.9C164.1,90.6,178,96,200,96C233.7,96,248.4,83.4,265.5,72.3z"></path>
          <path class="animated-path" style="opacity: 1;" d="M1692.3,96V85c0,0,0,0-19.5,0s-19.6-13-39-13s-19.6,13-39,13c-0.1,0-0.2,0-0.4,0c11.4,6.2,24.9,11,45.6,11
C1669.9,96,1684.8,96,1692.3,96z"></path>
          <path class="animated-path" style="opacity: 1;"
            d="M25.5,72C6,72,6.1,84.9-13.5,84.9L-20,85v8.9C0.7,90.1,12.6,80.6,25.9,72C25.8,72,25.7,72,25.5,72z"></path>
          <path class="animated-path" style="" d="M-40,95.6C20.3,95.6,20.1,56,80,56s60,40,120,40s59.9-40,120-40s60.3,40,120,40s60.3-40,120-40
s60.2,40,120,40s60.1-40,120-40s60.5,40,120,40s60-40,120-40s60.4,40,120,40s59.9-40,120-40s60.3,40,120,40s60.2-40,120-40
s60.2,40,120,40s59.8,0,59.8,0l0.2,143H-60V96L-40,95.6z"></path>

          <animate attributeName="d" dur="3s" repeatCount="indefinite"
            values="M10 80 Q 95 10 180 80; M10 80 Q 180 150 320 80; M10 80 Q 95 10 180 80" />
        </svg>

      </div>
      <div class="mountain">
        <div class="mountain-top">
          <div class="mountain-cap-1"></div>
          <div class="mountain-cap-2"></div>
          <div class="mountain-cap-3"></div>
        </div>
      </div>
      <div class="mountain-two">
        <div class="mountain-top">
          <div class="mountain-cap-1"></div>
          <div class="mountain-cap-2"></div>
          <div class="mountain-cap-3"></div>
        </div>
      </div>
      <div class="mountain-three">
        <div class="mountain-top">
          <div class="mountain-cap-1"></div>
          <div class="mountain-cap-2"></div>
          <div class="mountain-cap-3"></div>
        </div>
      </div>

    </div>


    <div class="bookRowTable">
      <div id="bookListLarge">
        <?php if (mysqli_num_rows($result) > 0) { ?>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="book-cover">
              <div class="linear-bg"></div>
              <p class="book-title">
                <?= $row["book_title"] ?>
              </p>
              <button class="hidden-button" onclick="redirectToBookDetails(<?= $row['book_id'] ?>)">View Detail</button>
              <img src="<?= $row["book_cover"] ?>" alt="Book Cover" class="book-image">
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="NoRelatedBooks">
            <p class="ui horizontal divider" id="NoRelatedBooksTitle">There are no related books in this category</p>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>


  <div style="position:relative; top:0; width:100%; transform: scaleY(-1);">
    <svg id="" preserveAspectRatio="xMidYMax meet" class="svg-separator sep1" viewBox="0 0 1600 160"
      style="z-index:7; background:transparent;" data-height="100">
      <path class="animated-path" style="opacity: 1;fill: #ddd;" d="M1040,56c0.5,0,1,0,1.6,0c-16.6-8.9-36.4-15.7-66.4-15.7c-56,0-76.8,23.7-106.9,41C881.1,89.3,895.6,96,920,96
C979.5,96,980,56,1040,56z"></path>
      <path class="animated-path" style="opacity: 1;" d="M1699.8,96l0,10H1946l-0.3-6.9c0,0,0,0-88,0s-88.6-58.8-176.5-58.8c-51.4,0-73,20.1-99.6,36.8
c14.5,9.6,29.6,18.9,58.4,18.9C1699.8,96,1699.8,96,1699.8,96z"></path>
      <path class="animated-path" style="opacity: 1;" d="M1400,96c19.5,0,32.7-4.3,43.7-10c-35.2-17.3-54.1-45.7-115.5-45.7c-32.3,0-52.8,7.9-70.2,17.8
c6.4-1.3,13.6-2.1,22-2.1C1340.1,56,1340.3,96,1400,96z"></path>
      <path class="animated-path" style="opacity: 1;" d="M320,56c6.6,0,12.4,0.5,17.7,1.3c-17-9.6-37.3-17-68.5-17c-60.4,0-79.5,27.8-114,45.2
c11.2,6,24.6,10.5,44.8,10.5C260,96,259.9,56,320,56z"></path>
      <path class="animated-path" style="opacity: 1;" d="M680,96c23.7,0,38.1-6.3,50.5-13.9C699.6,64.8,679,40.3,622.2,40.3c-30,0-49.8,6.8-66.3,15.8
c1.3,0,2.7-0.1,4.1-0.1C619.7,56,620.2,96,680,96z"></path>
      <path class="animated-path" style="opacity: 1;" d="M-40,95.6c28.3,0,43.3-8.7,57.4-18C-9.6,60.8-31,40.2-83.2,40.2c-14.3,0-26.3,1.6-36.8,4.2V106h60V96L-40,95.6
z"></path>
      <path class="animated-path" style="opacity: 1;" d="M504,73.4c-2.6-0.8-5.7-1.4-9.6-1.4c-19.4,0-19.6,13-39,13c-19.4,0-19.5-13-39-13c-14,0-18,6.7-26.3,10.4
C402.4,89.9,416.7,96,440,96C472.5,96,487.5,84.2,504,73.4z"></path>
      <path class="animated-path" style="opacity: 1;" d="M1205.4,85c-0.2,0-0.4,0-0.6,0c-19.5,0-19.5-13-39-13s-19.4,12.9-39,12.9c0,0-5.9,0-12.3,0.1
c11.4,6.3,24.9,11,45.5,11C1180.6,96,1194.1,91.2,1205.4,85z"></path>
      <path class="animated-path" style="opacity: 1;" d="M1447.4,83.9c-2.4,0.7-5.2,1.1-8.6,1.1c-19.3,0-19.6-13-39-13s-19.6,13-39,13c-3,0-5.5-0.3-7.7-0.8
c11.6,6.6,25.4,11.8,46.9,11.8C1421.8,96,1435.7,90.7,1447.4,83.9z"></path>
      <path class="animated-path" style="opacity: 1;" d="M985.8,72c-17.6,0.8-18.3,13-37,13c-19.4,0-19.5-13-39-13c-18.2,0-19.6,11.4-35.5,12.8
c11.4,6.3,25,11.2,45.7,11.2C953.7,96,968.5,83.2,985.8,72z"></path>
      <path class="animated-path" style="opacity: 1;" d="M743.8,73.5c-10.3,3.4-13.6,11.5-29,11.5c-19.4,0-19.5-13-39-13s-19.5,13-39,13c-0.9,0-1.7,0-2.5-0.1
c11.4,6.3,25,11.1,45.7,11.1C712.4,96,727.3,84.2,743.8,73.5z"></path>
      <path class="animated-path" style="opacity: 1;" d="M265.5,72.3c-1.5-0.2-3.2-0.3-5.1-0.3c-19.4,0-19.6,13-39,13c-19.4,0-19.6-13-39-13
c-15.9,0-18.9,8.7-30.1,11.9C164.1,90.6,178,96,200,96C233.7,96,248.4,83.4,265.5,72.3z"></path>
      <path class="animated-path" style="opacity: 1;" d="M1692.3,96V85c0,0,0,0-19.5,0s-19.6-13-39-13s-19.6,13-39,13c-0.1,0-0.2,0-0.4,0c11.4,6.2,24.9,11,45.6,11
C1669.9,96,1684.8,96,1692.3,96z"></path>
      <path class="animated-path" style="opacity: 1;"
        d="M25.5,72C6,72,6.1,84.9-13.5,84.9L-20,85v8.9C0.7,90.1,12.6,80.6,25.9,72C25.8,72,25.7,72,25.5,72z"></path>
      <path class="animated-path" style="" d="M-40,95.6C20.3,95.6,20.1,56,80,56s60,40,120,40s59.9-40,120-40s60.3,40,120,40s60.3-40,120-40
s60.2,40,120,40s60.1-40,120-40s60.5,40,120,40s60-40,120-40s60.4,40,120,40s59.9-40,120-40s60.3,40,120,40s60.2-40,120-40
s60.2,40,120,40s59.8,0,59.8,0l0.2,143H-60V96L-40,95.6z"></path>

      <animate attributeName="d" dur="3s" repeatCount="indefinite"
        values="M10 80 Q 95 10 180 80; M10 80 Q 180 150 320 80; M10 80 Q 95 10 180 80" />
    </svg>

  </div>

  <div style="height:250px; width:100%; z-index:-30; position: relative;"></div>



  <div class="footer" id="footer">


    <div class="footer" id="footer">


      <div class="contentFooter">
        <div class="footerTitle">
          <h1 class="">ONE LIBRARY</h1>
          <!-- <a href=""><i class="facebook icon"></i></a>
    <a href=""><i class="instagram icon"></i></a>
    <a href=""><i class="twitter icon"></i></a> -->
        </div>
        <!-- <div>
<a href=""><i class="facebook icon"></i></a>
</div> -->
        <div class="footerLink">

          <div class="link2">
            <p>CONTACT US</p>
            <ul class="a">
              <li><a href=""><i class="envelope outline icon"></i> onelibraryofficial@gmail.com</a></li>
              <li><a href=""><i class="phone alternate icon"></i> 011-2146 9831</a></li>
            </ul>
          </div>
        </div>
      </div>

</body>

</html>
<script>
  let elmDesign = document.getElementById('');
  //   ShowBookTitleBoxId

  window.addEventListener('scroll', function () {
    let value = window.scrollY;
    elmDesign.style.top = value * 0.30 + 'px';
  })



  function redirectToBookDetails(bookId) {
    window.location.href = 'BookDetail.php?id=' + bookId + '&page=1';
  }
</script>
<style>
  body {
    margin: 0;
  }




  @keyframes move {
    0% {
      transform: translateX(0);
    }

    50% {
      transform: translateX(-90px);
    }

    100% {
      transform: translateX(0);
    }
  }

  .animated-path {
    animation: move 16s ease-in-out infinite;
  }


  .svg-separator {
    display: block;
    background: 0 0;
    position: relative;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 20;
    -webkit-transform: translateY(0%) translateY(2px);
    transform: translateY(0%) translateY(2px);
    width: 100%;
    filter: unset;
  }

  .svg-separator path {
    fill: #F5F7F8 !important;
  }

  .svg-separator.bottom {
    top: auto;
    bottom: 0;
  }

  .sep1 {
    transform: translateY(0%) translateY(0px) scale(1, 1);
    transform-origin: top;
  }




  .mountain,
  .mountain-two,
  .mountain-three {
    position: absolute;
    bottom: 0;
    border-left: 270px solid transparent;
    border-right: 270px solid transparent;
    border-bottom: 300px solid #2b9cd4;
    z-index: 1;
  }

  .mountain-two {
    left: 80px;
    bottom: 0px;
    opacity: .3;
    z-index: 0;
  }

  .mountain-three {
    left: -60px;
    bottom: 0px;
    opacity: .5;
    z-index: 0;
  }

  .mountain-top {
    position: absolute;
    right: -65px;
    border-left: 65px solid transparent;
    border-right: 65px solid transparent;
    border-bottom: 77px solid #ceeaf6;
    z-index: 2;
  }

  .mountain-cap-1,
  .mountain-cap-2,
  .mountain-cap-3 {
    position: absolute;
    top: 70px;
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
    border-top: 25px solid #ceeaf6;
  }

  .mountain-cap-1 {
    left: -55px;
  }

  .mountain-cap-2 {
    left: -25px;
  }

  .mountain-cap-3 {
    left: 5px;
  }



  .bookRowTable {
    background: #F5F7F8;
    width: 100%;
    margin: auto;
    min-height: 430px;
  }


  /* ..............................................................  */
  /* need add  */
  #bookListLarge {
    width: 90%;
    height: 100%;
    /* margin-left: 430px; */
    display: flex;
    /* grid-template-columns: 25% 25% 25% 25%; */
    flex-wrap: wrap;
    /* justify-content: space-around; */
    margin: auto;
  }

  /* ..............................................................  */
  .book-cover {
    height: 400px;
    width: 300px;
    margin: 15px 15px;
    /* border: 5px solid #000; */
    border-radius: 20px;
    overflow: hidden;
    position: relative;
  }

  .linear-bg {
    background: linear-gradient(to top, black, transparent);
    position: absolute;
    height: 230px;
    width: 100%;
    border-radius: 10px;
    bottom: 0%;
    transition: 0.4s;
    z-index: 4;
  }

  .book-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    background-repeat: no-repeat;
    background-position: center;
    transition: 0.4s;
    z-index: 1;
  }

  .book-title {
    color: #fff;
    position: absolute;
    bottom: 3%;
    left: 5%;
    /* transform: translate(-50%, -50%); */
    transition: 0.4s;
    opacity: 1;
    font-weight: 900;
    z-index: 5;
  }

  .hidden-button {
    background: transparent;
    padding: 10px 30px;
    position: absolute;
    border: 3px solid #fff;
    color: #fff;
    border-radius: 10px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 6;
    transition: 0.4s;
    opacity: 0;
    cursor: pointer;
  }

  .book-cover:hover {
    filter: grayscale(0%);
  }

  .book-cover:hover .hidden-button {
    opacity: 1;
    display: inline;
  }

  .book-cover:hover .linear-bg {
    /* filter: brightness(50%); */
    height: 500px;
  }

  .book-cover:hover .book-title {
    opacity: 0;
  }

  .book-cover:hover .book-image {
    transform: scale(1.2);
  }

  .hidden-button:hover {
    background: #fff;
    color: #000;
  }





  .footer {
    position: fixed;
    bottom: 0;
    z-index: -20;
    background: radial-gradient(ellipse at bottom, #1b2735 0%, #081c5e 100%);
    /* background: #FFFBF5; */
    width: 100%;
    height: 400px;

    /* padding:40px 40px; */
  }

  .contentFooter {
    width: 70%;
    position: absolute;
    bottom: 50px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
    transition: 0.6s;
  }

  .contentFooter li {
    color: #fff;
  }

  .footerTitle h1 {
    /* color:#fff; */
    color: #fff;
    font-size: 40px;
    font-weight: 100;
    letter-spacing: 10px;
    padding: 35px 0px;
  }

  .footerTitle i {
    color: #fff;
    font-size: 23px;
    padding: 20px 40px 0px 0px;
  }

  .footerLink {
    margin-left: auto;
    display: flex;
    padding: 0px 0px;
  }

  .footerLink p {
    color: #fff;
    font-size: 27px;
    font-weight: 900;
    letter-spacing: 10px;
  }

  .footerLink a {
    color: #fff;
    text-decoration: none;
    transition: 0.4s;
    /* padding-bottom: 50px; */
  }

  .footerLink a:hover {
    color: #B4B4B3;
    text-decoration: none;
  }

  .footerLink .link1 {
    padding: 0px 0px;
  }

  .footerLink .link2 {
    /* border-left: 3px solid #D0D4CA; */
    padding: 0px 0px;
    /* margin-left:100px; */
  }

  .footerLink .link2 li {
    padding-bottom: 15px;
  }

  /* no need add to main css  */
  /* ........................................................................................................................... */
  .title {
    color: #000 !important;
  }

  .navHref {
    color: #000 !important;
  }

  .showBookIntro {
    background: radial-gradient(ellipse at bottom, #F6F4EB 0%, #91C8E4 100%);
    height: 100vh;
    width: 100%;
  }

  .ShowBookTitleBox {
    width: 90%;
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  #ShowBookTitle {
    font-size: 40px;
    font-weight: 100;
    padding-bottom: 50px;
    letter-spacing: 10px;
    text-transform: uppercase;
  }

  .NoRelatedBooks {
    width: 100%;

  }

  .NoRelatedBooks #NoRelatedBooksTitle {
    font-family: 'Jost', sans-serif;
    font-size: 23px;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 5px;
    padding-top: 190px;
  }
</style>