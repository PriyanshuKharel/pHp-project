<?php
include_once 'db.php';
include_once "nav.php";
if ($isLoggedIn) {
    $cv = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cv WHERE id = '" . $_SESSION['id'] . "'"));
    if (!$cv) {
        $_SESSION["error"] = "Please create a cv first.";
        header("Location: update.php");
    }
?>
<div class="heading">Your CV Details</div>
<ul>
    <li>Your Name: <?php echo $cv['name'] ?> </li>
    <li>Your Email: <?php echo $cv['email'] ?> </li>
    <li>Your Address: <?php echo $cv['address'] ?> </li>
    <li>Your Date of Birth: <?php echo $cv['dob'] ?> </li>
    <li>Your Education: <?php echo $cv['education'] ?> </li>
    <li>Your Work Experience: <?php echo $cv['work_experience'] ?> </li>
    <li>Your Programming Skills: <?php echo $cv['programming_skills'] ?> </li>
</ul>
<?php } else { ?>
    <h1 class="heading">Please Login to see your CV details</h1>
<?php } ?>