<?php
// Simple authentication system
session_start();

// Configuration - Change these to your preferred credentials
$admin_username = "lighthouse_admin";
$admin_password = "ministers2023";

// Check if user is logging out
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;

// Check login credentials
if (isset($_POST['login'])) {
    if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $_POST['username'];
    } else {
        $login_error = "Invalid username or password";
    }
}

// Check if user is logged in
$logged_in = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;

// If not logged in, show login form
if (!$logged_in) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Lighthouse Ministers Admin</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            body {
                background: linear-gradient(135deg, #4a90e2 0%, #2c3e50 100%);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .login-container {
                background: white;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                width: 100%;
                max-width: 400px;
            }
            .login-logo {
                text-align: center;
                margin-bottom: 30px;
            }
            .login-logo h1 {
                color: #2c3e50;
                font-size: 24px;
                margin-top: 10px;
            }
            .login-logo i {
                font-size: 40px;
                color: #4a90e2;
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
                color: #2c3e50;
            }
            .form-control {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 1rem;
            }
            .btn {
                padding: 12px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1rem;
                font-weight: 500;
                transition: all 0.3s;
                width: 100%;
            }
            .btn-primary {
                background: #4a90e2;
                color: white;
            }
            .btn-primary:hover {
                background: #3a80d2;
            }
            .login-error {
                color: #e74c3c;
                margin-top: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-logo">
                <i class="fas fa-house-chimney"></i>
                <h1>Lighthouse Ministers Admin</h1>
            </div>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="login" value="1" class="btn btn-primary">Login</button>
                <div class="login-error" style="display: <?php echo isset($login_error) ? 'block' : 'none'; ?>;">
                    <?php if (isset($login_error)) echo $login_error; ?>
                </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Handle file editing
$pages = [
    'index' => '../index.html',
    'about' => '../about.html',
    'ministries' => '../ministries.html',
    'members' => '../members.html',
    'contact' => '../contact.html'
];

$current_page = isset($_GET['page']) ? $_GET['page'] : 'index';
$message = '';

if (isset($_POST['save_content'])) {
    $page = $_POST['page'];
    $content = $_POST['content'];
    
    if (isset($pages[$page])) {
        if (file_put_contents($pages[$page], $content)) {
            $message = "<div class='success-message'>Page content updated successfully!</div>";
        } else {
            $message = "<div class='error-message'>Error saving content. Check file permissions.</div>";
        }
    }
}

// Get current page content
$current_content = '';
if (isset($pages[$current_page]) && file_exists($pages[$current_page])) {
    $current_content = htmlspecialchars(file_get_contents($pages[$current_page]));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Lighthouse Ministers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #4a90e2;
            --secondary: #2c3e50;
            --accent: #3498db;
            --light: #f5f7fa;
            --dark: #2c3e50;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
            --gray: #95a5a6;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: var(--secondary);
            color: white;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .sidebar-header {
            padding: 20px;
            background: var(--primary);
            text-align: center;
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            margin: 0;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            text-decoration: none;
            color: white;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--primary);
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Content Management */
        .content-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        textarea.form-control {
            min-height: 500px;
            resize: vertical;
            font-family: monospace;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #3a80d2;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .success-message {
            background: var(--success);
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            background: var(--danger);
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-house-chimney"></i> Lighthouse Admin</h2>
            </div>
            <div class="sidebar-menu">
                <a href="?page=index" class="menu-item <?php echo $current_page == 'index' ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i> Home Page
                </a>
                <a href="?page=about" class="menu-item <?php echo $current_page == 'about' ? 'active' : ''; ?>">
                    <i class="fas fa-info-circle"></i> About Page
                </a>
                <a href="?page=ministries" class="menu-item <?php echo $current_page == 'ministries' ? 'active' : ''; ?>">
                    <i class="fas fa-hands-helping"></i> Ministries Page
                </a>
                <a href="?page=members" class="menu-item <?php echo $current_page == 'members' ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i> Members Page
                </a>
                <a href="?page=contact" class="menu-item <?php echo $current_page == 'contact' ? 'active' : ''; ?>">
                    <i class="fas fa-envelope"></i> Contact Page
                </a>
                <a href="?logout=1" class="menu-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Edit <?php echo ucfirst($current_page); ?> Page</h1>
                <div class="user-info">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=4a90e2&color=fff" alt="Admin User">
                    <span>Welcome, <?php echo $_SESSION['username']; ?></span>
                </div>
            </div>

            <?php echo $message; ?>

            <div class="content-section">
                <form method="POST" action="">
                    <input type="hidden" name="page" value="<?php echo $current_page; ?>">
                    
                    <div class="form-group">
                        <label for="content">Edit HTML Content for <?php echo $pages[$current_page]; ?>:</label>
                        <textarea id="content" name="content" class="form-control"><?php echo $current_content; ?></textarea>
                    </div>
                    
                    <button type="submit" name="save_content" value="1" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    
                    <a href="../<?php echo $current_page; ?>.html" target="_blank" class="btn">
                        <i class="fas fa-eye"></i> View Page
                    </a>
                </form>
            </div>

            <div class="content-section" style="margin-top: 30px;">
                <h2>Admin Instructions</h2>
                <p>1. Select a page to edit from the sidebar menu</p>
                <p>2. Modify the HTML content in the textarea</p>
                <p>3. Click "Save Changes" to update the website</p>
                <p>4. Use "View Page" to see your changes</p>
                <p><strong>Note:</strong> Be careful when editing HTML to not break the page structure.</p>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>