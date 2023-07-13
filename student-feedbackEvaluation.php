<?php
// Active Sidebar Page

$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);

$page = $components[2];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title><?php echo "Student Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_students.css">

     <!----------BOOTSTRAP------------>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>


     <!---Inner topbar--->
     <?php include('topbar.php');?>
</head>
<!----Body----->
<body>

   <!---------Sidebar------------>
   

   <section class="bg-section">
   <?php include('sidebar-student.php');?>
    <!---------End Sidebar--------->
<br>

<main class="pcoded-main-content">
            <div class="container pt-4 ">
                <div class="col-lg-12">
    <div class="centered">
        <div class="student_eval">
            <h1>FEEDBACK AND EVALUATION</h1>
        </div>
    </div>
</div>

<div class="header-form">
    <div class="header-innner">
        <p>INSTRUCTOR</p>
        <select class="form-select col-10" aria-label="Default select example">
            <option selected >--Please select instructor--</option>
            <option value="1">Instructor 1</option>
            <option value="2">Instructor 2</option>
            <option value="3">Instructor 3</option>
            <option value="4">Instructor 4</option>
            <option value="5">Instructor 5</option>
        </select>
    </div>
</div>

<div class="eval-form">
        <div class="eval_sheet">
            <h1>A. INSTRUCTOR EVALUATION</h1>
            <p>1. Shows good command and knowledge of the subject matter.</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>2. Demonstrates breadth and depth of mastery.</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>3. Draws and share information in the state-of-the-art theory and practice in his/her respective discipline.</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>4. Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject matter.</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>5. Integrates subject to practical circumstances.</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>
</div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
        <h1>B. COURSE EVALUATION</h1>
            <p>1. How would you rate the overall quality of the course content and materials provided throughout the semester?</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>2. Did the course effectively cover the stated learning objectives and provide you with the necessary knowledge and skills?</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>3. Were the assessments and assignments designed to accurately evaluate your understanding of the course material and allow you to demonstrate your knowledge?</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>4. Were the course resources, such as textbooks, online platforms, or supplementary materials, helpful in supporting your learning experience?</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
            <p>5. How would you rate the organization and structure of the course in terms of facilitating your learning and comprehension of the subject matter?</p>
            <select class="form-select" aria-label="Default select example">
            <option selected >--Select Evaluation--</option>
            <option value="1">5 - Outstanding</option>
            <option value="2">4 - Exceeds Expectations</option>
            <option value="3">3 - Meets Expectations</option>
            <option value="4">2 - Needs Improvement</option>
            <option value="5">1 - Unacceptable</option>
        </div>

        <div class="eval_sheet">
            <select class="form-select" aria-label="Default select example">
        </div>
        <div class="eval_sheet">
        <h1>COMMENTS AND SUGGESTIONS</h1>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
        </div>
</div>
</div>
</main>
</section>
</body>
</html>