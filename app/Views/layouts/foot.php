    <!-- Boostrap JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Sweetalert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

    <!-- Datatables  -->
    <script src="<?= base_url('assets/js/datatables.min.js') ?>"></script>

    <!-- Datatables boostrap 5 -->
    <script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Index Js -->
    <script src="<?= base_url('assets/js/index.js'); ?>"></script>

    <!-- Dynamic Javascript render section -->
    <?= $this->renderSection('scripts'); ?>
</body>
</html>