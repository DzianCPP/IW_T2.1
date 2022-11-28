<div class="row w-auto">
    <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-xl-6">
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($thisPage > 1): ?>
            <li class="page-item">
            <?php else: ?>
                <li class="page-item disabled">
                    <?php endif; ?>
                    <a class="page-link" href="/users/show/<?php echo $thisPage - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only"></span>
                    </a>
                </li>
                <?php if ($thisPage > 1): ?>
                    <li class="page-item"><a class="page-link"
                                             href="/users/show/<?php echo $thisPage - 1; ?>"><?php echo $thisPage - 1; ?></a>
                    </li>
                <?php endif; ?>
                <li class="page-item disabled"><a class="page-link"
                                         href="/users/show/<?php echo $thisPage; ?>"><?php echo $thisPage; ?></a>
                </li>
                <?php if ($thisPage < $pages): ?>
                    <li class="page-item"><a class="page-link"
                                             href="/users/show/<?php echo $thisPage + 1; ?>"><?php echo $thisPage + 1; ?></a>
                    </li>
                <?php endif; ?>
                <?php if ($thisPage < $pages): ?>
                <li class="page-item">
                    <?php else: ?>
                <li class="page-item disabled">
                    <?php endif; ?>
                    <a class="page-link" href="/users/show/<?php echo $thisPage + 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only"></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
</div>