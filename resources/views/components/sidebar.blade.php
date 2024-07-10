<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('backend.dashboard') }}">LIT CODER</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">LIT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('backend.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Category</li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Category Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category-add.category.view') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('category-add.subcategory.view') }}">Sub Category</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Category Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category-add.category.create') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('category-add.subcategory.create') }}">Sub Category</a></li>
                </ul>
            </li>
            <li class="menu-header">Web Development</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Web Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.html.view') }}">HTML & CSS</a></li>
                    <li><a class="nav-link" href="{{ route('template.javascript.view') }}">JavaScript</a></li>
                    <li><a class="nav-link" href="{{ route('template.reactjs.view') }}">React JS</a></li>
                    <li><a class="nav-link" href="{{ route('template.php.view') }}">PHP</a></li>
                    <li><a class="nav-link" href="{{ route('template.laravel.view') }}">Laravel</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Web Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ active_page(['template.html.create']) }}"
                            href="{{ route('template.html.create') }}">HTML
                            & CSS</a></li>
                    <li><a class="nav-link" href="{{ route('template.javascript.create') }}">JavaScript</a></li>
                    <li><a class="nav-link" href="{{ route('template.reactjs.create') }}">React JS</a></li>
                    <li><a class="nav-link" href="{{ route('template.php.create') }}">PHP</a></li>
                    <li><a class="nav-link" href="{{ route('template.laravel.create') }}">Laravel</a></li>
                </ul>
            </li>
            <li class="menu-header">Admin template</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Template Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.admintemplate.view') }}">Admin template</a></li>
                    <li><a class="nav-link" href="{{ route('template.template.view') }}">Template</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Template Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.admintemplate.create') }}">Admin template</a></li>
                    <li><a class="nav-link" href="{{ route('template.template.create') }}">Template</a></li>
                </ul>
            </li>
            <li class="menu-header">Database</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Database Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.mysql.view') }}">MySql</a></li>
                    <li><a class="nav-link" href="{{ route('template.sqlserver.view') }}">Sql Server</a></li>
                    <li><a class="nav-link" href="{{ route('template.oracle.view') }}">Oracle</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Database Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.mysql.create') }}">MySql</a></li>
                    <li><a class="nav-link" href="{{ route('template.sqlserver.create') }}">Sql Server</a></li>
                    <li><a class="nav-link" href="{{ route('template.oracle.create') }}">Oracle</a></li>
                </ul>
            </li>
            <li class="menu-header">Sotfware Development</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Sotfware Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.csharp.view') }}">C#</a></li>
                    <li><a class="nav-link" href="{{ route('template.java.view') }}">Java</a></li>
                    <li><a class="nav-link" href="{{ route('template.python.view') }}">Python</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Sotfware Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.csharp.create') }}">C#</a></li>
                    <li><a class="nav-link" href="{{ route('template.java.create') }}">Java</a></li>
                    <li><a class="nav-link" href="{{ route('template.python.create') }}">Python</a></li>
                </ul>
            </li>
            <li class="menu-header">Mobile Development</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Mobile Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.flutter.view') }}">Flutter</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Mobile Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.flutter.create') }}">Flutter</a></li>
                </ul>
            </li>
            <li class="menu-header">Operating</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Operating Table</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.linux.view') }}">Linux</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Operating Form</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('template.linux.create') }}">Linux</a></li>
                </ul>
            </li>
            <li class="menu-header">Blogs Post</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i>
                    <span>Blog Page</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('blog-post.blog.view') }}">Blogs</a></li>
                    <li><a href="{{ route('blog-post.blog.create') }}">Create Blog</a></li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                    <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                    <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="errors-503.html">503</a></li>
                    <li><a class="nav-link" href="errors-403.html">403</a></li>
                    <li><a class="nav-link" href="errors-404.html">404</a></li>
                    <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>
    </aside>
</div>
