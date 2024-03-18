<div style="padding-left: 10%; margin-top: 2rem;">
    <?php $current_file = basename($_SERVER['PHP_SELF']); ?>

    <?php if ($current_file != "add_vehicle_form.php"): ?>
        <a href="add_vehicle_form.php" style="text-decoration: none; color:black; display: block; height: 20px; width: 10rem; text-align: center;">Add Vehicle</a><br>
    <?php endif; ?>

    <?php if ($current_file != "make_list.php"): ?>
        <a href="make_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Makes</a><br>
    <?php endif; ?>

    <?php if ($current_file != "type_list.php"): ?>
        <a href="type_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Types</a><br>
    <?php endif; ?>

    <?php if ($current_file != "class_list.php"): ?>
        <a href="class_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Classes</a><br>
    <?php endif; ?>
    
    <a href="../admin" style="text-decoration: none; color: black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">Back To Admin</a>
</div>

</main>

<footer style="position: fixed; left: 0; bottom: 0; width: 100%; text-align: center; background-color: #FFCCCC">
<h3 style="padding-top: .5rem; text-align: center;">Zippy Used Autos &copy; 2024</h3>
</body>
</footer>

</html>