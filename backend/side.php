<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">

            <img src="assets/img/Grove.png" alt="navbar brand" class="navbar-brand px-2" height="20" />

            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <!-- <span class="badge badge-secondary">1</span> -->
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <!-- <h4 class="text-section">Components</h4> -->
                    <hr class="mx-4">
                </li>
                <li class="nav-item">
                    <a href="room.php">
                        <i class="fas fa-desktop"></i>
                        <p>Room</p>
                        <!-- <span class="badge badge-success">4</span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>จอง / มัดจำ / เช่า</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="booking.php">
                                    <span class="sub-item">จอง</span>
                                </a>
                            </li>
                            <li>
                                <a href="deposit.php">
                                    <span class="sub-item">มัดจำ</span>
                                </a>
                            </li>
                            <li>
                                <a href="rent.php">
                                    <span class="sub-item">เช่า</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#user">
                        <i class="far fa-user"></i>
                        <p>ข้อมูลผู้ใช้งาน</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="staff.php">
                                    <span class="sub-item">Staff</span>
                                </a>
                            </li>
                            <li>
                                <a href="customer.php">
                                    <span class="sub-item">Customers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>ค่าน้ำ / ค่าไฟ</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="water.php">
                                    <span class="sub-item">ค่าน้ำ</span>
                                </a>
                            </li>
                            <li>
                                <a href="electricity.php">
                                    <span class="sub-item">ค่าไฟ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="history.php">
                        <i class="fas fa-file"></i>
                        <p>ประวัติใบเสร็จ</p>
                        <!-- <span class="badge badge-secondary">1</span> -->
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>