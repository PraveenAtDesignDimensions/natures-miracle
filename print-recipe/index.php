<?php
// include autoloader
require_once 'autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// Check Form Submit
if (isset($_POST['submit'])) {

$tempalte = $_POST["tempalte"];
$tempalte_name = $_POST["tempalte_name"];
$tempalte_img = $_POST["tempalte_img"];

// html here
$header = '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recipe | Natures Miracle</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<style>


.hide, .back-btn, .direction, .feature-post, .recipe-form{
	display:hide;
}
body{
	font-family: Poppins;
}
.text-center{
	text-align:center;
}
header img{
	width:100px;
}
.main-image img{
    width:500px;
    margin-top:40px;
}
ul{
	padding-left:0px;
}
li{
	position:relative;
	list-style:none;
}
.fa-circle-o {
	position: absolute;
	left: 0px;
    top: 15px;
	display:none;
}
footer{
	position:relative;
	bottom:0px;
}
h5{
    font-size:1rem;
}


</style>
</head>
<body>

<header class="text-center">
<a href="https://naturesmiracle.in/" rel="home"><img src="logo.jpg" alt="Natures Miracle"></a>
</header>
<div class="main-image"><img src="'. $tempalte_img .'" alt="'. $tempalte_name .'">
</div>
';



$html = '

<article class="post">
    <div class="header-post">
        <h2 class="title-post">Chocolate Covered Strawberries</h2>
        <p>There is nothing better than chocolate-covered strawberries. A little bit of class, a little bit of romance and a whole lot of indulgence.</p>
    </div>
    <!-- /.header-post -->

    <div class="feature-post">
        <a>
        <img src="https://naturesmiracle.in/images/recipes/s1.jpg" alt="image"></a>
     </div>
    <!-- /.feature-post -->

    <p><strong>YIELD:</strong> 15-20 servings </p>
    <p><strong>PREP TIME:</strong> 10 minutes </p>
    <p><strong>COOKING TIME:</strong> 40 minutes</p>

    <div class="content-post">
        <div class="row">
            <div class="col-md-6">
                <h5 class="custom-title-1">INGREDIENTS</h5>
                <ul class="iconlist">
                    <li><i class="fa fa-circle-o"></i>1 box Nature’s Miracle Strawberries</li>
                    <li><i class="fa fa-circle-o"></i>2 c. semisweet chocolate chips</li>
                    <li><i class="fa fa-circle-o"></i>2 tbsp. coconut oil</li>
                </ul>
            </div>
        <div class="col-md-6">
            <h5 class="custom-title-1">PREPARATION</h5>
            <p>Line a large baking sheet with parchment paper. Rinse strawberries and pat dry with paper towels.</p>
            <p>In a small microwave-safe bowl, combine chocolate chips and coconut oil and microwave in 30-second intervals, stirring in between, until completely melted.</p>
            <p>Dip strawberries in chocolate and place on prepared baking sheet.</p>
            <p>Refrigerate until chocolate is set, about 30 minutes.</p>

            </div>
        </div>
    </div>
    <!-- /.content-post -->

    <div class="direction clearfix">
        <ul class="tags">
            <li>Tags: </li>
            <li><a href="recipes.html">Recipes,</a></li>
             <li><a href="recipe-strawberries.html">Strawberries</a></li>
             </ul>
    </div>

    <div class="back-btn">
        <button class="basic-btn" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
    </div>
    <!-- /.direction -->
                               
 </article>

';

$footer = '
	<footer>
		<p>Find more recipes on recipe section on Natures Miracle <a href="https://naturesmiracle.in/recipes.html" target="_blank" style="color:#e44c2a;">website</p>
	</footer>
	</body>
</html>
';

// page
$page = file_get_contents("https://dompdf.net/test/image_variants.html");
$basic = '';
$final = $header . $tempalte . $footer;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);
//$dompdf->loadHtml($final);
$dompdf->loadHtml(html_entity_decode($final));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
ob_end_clean();
$dompdf->stream($tempalte_name, array(
    "Attachment" => 1
));

// Check Form Submit
}

else{
    // Nothing to do
    echo "Hello World";
}

?>
