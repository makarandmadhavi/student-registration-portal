<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Welcome, <?=$_SESSION['username']?>!</h3>
        <strong>SS</strong>
    </div>

    <ul class="list-unstyled components ">
        <li>
            <a href="index.php">
                Pending Approval
            </a>
        </li>
        <li>
            <a href="approved.php">
                Approved
            </a>
        </li>
        <li>
            <a href="final_approval.php">
                Final approval
            </a>
        </li>
        <li>
            <a href="viewall.php">
                View All
            </a>
        </li>
        
    </ul>


</nav>