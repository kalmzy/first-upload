<aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="#">AksWorld</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="index.php" class="sidebar-link" >
                    <i class="lni lni-user"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" onclick="loadPage('pages/task.php')">
                    <i class="lni lni-agenda"></i>
                    <span>Task</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Auth</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="auth/login.php" class="sidebar-link">Login</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="auth/register.php" class="sidebar-link">Register</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
            <a href="#" class="sidebar-link" onclick="loadPage('pages/setting.php')">
                    <i class="lni lni-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>