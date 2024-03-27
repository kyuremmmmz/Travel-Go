<?php
// Connect to the database
include("connection.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert message into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message = $_POST['message'];
    $sql = "INSERT INTO user (user) VALUES ('$message')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete message from the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM user WHERE id = $delete_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error deleting message: " . $conn->error;
    }
}

// Fetch messages from the admin table
$sql_admin_messages = "SELECT * FROM user";
$result_admin_messages = $conn->query($sql_admin_messages);

$admin_messages = [];
if ($result_admin_messages->num_rows > 0) {
    while($row = $result_admin_messages->fetch_assoc()) {
        $admin_messages[] = $row;
    }
}

// Fetch messages from the user table
$sql_user_messages = "SELECT * FROM messages";
$result_user_messages = $conn->query($sql_user_messages);

$user_messages = [];
if ($result_user_messages->num_rows > 0) {
    while($row = $result_user_messages->fetch_assoc()) {
        $user_messages[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chat Box</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" id="bootstrap-css">
    <!-- Custom CSS -->
    <style>
        .chat-box {
            height: 700px;
            overflow: auto;
        }

        .dark-mode .card-header {
            background-color: #343a40;
            color: #ffffff;
        }

        .dark-mode .card-body {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
        }

        .dark-mode .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .dark-mode .user-message {
            background-color: #007bff;
            color: #ffffff;
            text-align: left;
            width: fit-content;
        }

        .dark-mode .admin-message {
            background-color: #28a745;
            color: #ffffff;
            text-align: right;
            width: fit-content;
        }

        .dark-mode .reply {
            color: #ffffff;
            font-style: italic;
            margin-left: 20px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        body {
            background-color: #343a40;
        }

        .input-group {
            width: 400%;
            align-self: auto;
            transform: translateX(-40%);
        }
    </style>
</head>

<body class="dark-mode">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                User Chat Box
                <div class="form-check form-switch float-end">
                   
                </div>
            </div>
            <div class="card-body chat-box" id="chatBox">
                <!-- Messages will be displayed here -->
                <h2>Welcome to User chat box!</h2>
                <p>How can we assist you?</p>
                <?php
                $user_count = count($user_messages);
                $admin_count = count($admin_messages);
                $total_count = max($user_count, $admin_count);
                
                for ($i = 0; $i < $total_count; $i++) {
                    if ($i < $admin_count) {
                        echo '<div class="message admin-message">You: ' . $admin_messages[$i]['user'] . '
                            <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                                <input type="hidden" name="delete_id" value="' . $admin_messages[$i]['id'] . '">
                                <button type="submit" class="btn btn-danger btn-sm">Unsent Message</button>
                            </form>
                        </div>';
                    }
                    if ($i < $user_count) {
                        echo '<div class="message user-message">' . $user_messages[$i]['message'] . '
                                <div class="reply">Reply: This is the user\'s reply</div>
                              </div>';
                    }
                }
                ?>
            </div>
            <div class="card-footer">
                <div class="center">
                    <form id="chatForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" id="messageInput" name="message" placeholder="Type your message...">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Scroll to the bottom of the chat box
        function scrollToBottom() {
            var chatBox = document.getElementById("chatBox");
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Scroll to the bottom when the page loads
        window.onload = scrollToBottom;

        // Scroll to the bottom after submitting a message
        document.getElementById("chatForm").addEventListener("submit", function() {
            setTimeout(scrollToBottom, 100); // Delay scrolling to bottom to ensure new message is displayed
        });
    </script>
</body>

</html>