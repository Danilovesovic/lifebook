<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>
<?php if(isset($_GET['success'])): ?>
<div id="success-id" class="bg-success text-center">
    <p>Login success</p>
</div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <h2 class="display-4 text-center"><?php echo $user['first_name'] ?> dashboard</h2>
        <div class="col-4">
            <?php include "./views/includes/sidebar.php" ?>
        </div>
        <div class="col-8">
            <h4>News</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod exercitationem tempora eligendi quasi! Dolor quas quidem velit quia, omnis impedit aspernatur libero reiciendis ipsa obcaecati sunt et corporis, saepe commodi!</p>
        </div>
    </div>
</div>

<script>
    let successMessage = document.querySelector("#success-id");
    if(successMessage){
        setTimeout(()=>{
            successMessage.style.display = "none";
        },5000)
    }
</script>

<?php require "./views/includes/bottom.php"; ?>
    
