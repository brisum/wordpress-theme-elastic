<!-- Footer Section -->
<div id="footer">
    <div class="container text-center">
        <p>
            &copy; <?php echo implode(' &ndash; ', array_unique(['2017', date('Y')])); ?>
            &nbsp;&nbsp;
            <?php // echo $themeOptionsService->get('copyright'); ?>
        </p>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>