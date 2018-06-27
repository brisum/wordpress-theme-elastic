<footer class="footer">
    <div class="container text-center">
        <p class="text-muted">
            &copy; <?php echo implode(' &ndash; ', array_unique(['2017', date('Y')])); ?>
            <?php // echo $themeOptionsService->get('copyright'); ?>
        </p>
    </div>
</footer>

<div id="popup" class="modal fade" tabindex="-1" role="dialog" data-require-init="popup.widget,0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <?php // content ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
