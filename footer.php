<footer class="footer">
    <div class="container text-center">
        <p class="text-muted">
            &copy; <?php echo implode(' &ndash; ', array_unique(['2017', date('Y')])); ?>
            <?php // echo $themeOptionsService->get('copyright'); ?>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>