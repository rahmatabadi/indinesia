<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <?php foreach ($menu as $m): ?>
                <li class="menu-title" key="t-menu">
                    <?= $m['menu_name'] ?>
                </li>
                <?php foreach ($menuDetail as $mD): ?>
                <?php if ($m['id_menu'] == $mD['id_menu']): ?>
                <li>
                    <a href="<?= base_url($mD['sub_menu_url']); ?>" class="waves-effect">
                        <i class="<?= $mD['sub_menu_icon']; ?>"></i>
                        <span key="t-chat">
                            <?= $mD['sub_menu_name'] ?>
                        </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->