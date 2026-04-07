<?php 
include "header.php";

if(!isset($_SESSION['sid'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// FETCH SERVICE
$result = mysqli_query($cn,"SELECT * FROM services WHERE id='$id'");
$service = mysqli_fetch_array($result);

$msg = "";

// ================= BOOKING =================
if(isset($_POST['book'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    // CHECK LIMIT
    $check = mysqli_query($cn,"SELECT COUNT(*) as total FROM orders WHERE event_date='$date' AND status!='cancelled'");
    $data = mysqli_fetch_assoc($check);

    if($data['total'] >= 2){
        $msg = "<div class='alert alert-danger text-center'>❌ Date Fully Booked</div>";
    } else {

        mysqli_query($cn,"INSERT INTO orders 
        (service_id,name,email,phone,event_date,message,status) 
        VALUES 
        ('$id','$name','$email','$phone','$date','$message','pending')");

        echo "<script>
            alert('Booking Successful');
            window.location='services.php';
        </script>";
    }
}
?>

<style>
    body{
        background: linear-gradient(135deg,#667eea,#764ba2);
        min-height:100vh;
    }

    /* Glass Card */
    .booking-card{
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(18px);
        border-radius: 20px;
        padding: 35px;
        color: #fff;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    /* Inputs */
    .form-control{
        border-radius: 12px;
        padding: 12px;
        border: none;
    }

    .form-control:focus{
        box-shadow: 0 0 0 2px #ffffff;
    }

    /* Button */
    .btn-book{
        background: linear-gradient(45deg,#00c6ff,#0072ff);
        border:none;
        padding:12px;
        border-radius: 12px;
        font-weight:600;
        transition:0.3s;
        color:#fff;
    }

    .btn-book:hover{
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.4);
    }

    /* Service */
    .service-box img{
        border-radius: 12px;
        margin-bottom:10px;
    }

    .price{
        font-size:20px;
        font-weight:bold;
    }

    /* Message */
    #dateMsg span{
        font-weight:500;
    }

    /* Loader */
    .loader{
        display:none;
        font-size:14px;
        color:#fff;
    }
</style>

<div class="container m-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="booking-card">

                <h3 class="text-center mb-4">✨ Book Your Service</h3>

                <?php echo $msg; ?>

                <div class="service-box text-center mb-4">
                    <img src="admin/<?php echo $service['image']; ?>" width="120">
                    <h5><?php echo $service['title']; ?></h5>
                    <p class="price text-warning">₹ <?php echo $service['price']; ?></p>
                </div>

                <form method="post">

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="👤 Your Name" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="📧 Email Address" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="📱 Phone Number" required>
                    </div>

                    <div class="mb-3">
                        <label class="mb-1">📅 Select Event Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                        <div id="dateMsg" class="mt-2"></div>
                        <div class="loader" id="loader">Checking availability...</div>
                    </div>

                    <div class="mb-3">
                        <textarea name="message" class="form-control" placeholder="💬 Additional Message (optional)"></textarea>
                    </div>

                    <button type="submit" name="book" id="bookBtn" class="btn btn-book w-100">
                        🚀 Confirm Booking
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
let fullDates = [];

// SET MIN DATE
let today = new Date().toISOString().split("T")[0];
document.getElementById("date").setAttribute("min", today);

// LOAD FULL DATES
function loadFullDates(){
    fetch("get_full_dates.php")
    .then(res => res.json())
    .then(data => {
        fullDates = data;
    });
}

loadFullDates();

// DATE CHANGE
document.getElementById("date").addEventListener("change", function(){

    let date = this.value;

    if(fullDates.includes(date)){
        document.getElementById("dateMsg").innerHTML = "<span class='text-danger'>❌ Fully Booked</span>";
        document.getElementById("bookBtn").disabled = true;
        return;
    }

    document.getElementById("loader").style.display = "block";
    document.getElementById("bookBtn").disabled = true;

    fetch("check_date.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "date=" + date
    })
    .then(res => res.text())
    .then(res => {

        document.getElementById("loader").style.display = "none";

        if(res === "full"){
            document.getElementById("dateMsg").innerHTML = "<span class='text-danger'>❌ Fully Booked</span>";
        } else {
            document.getElementById("dateMsg").innerHTML = "<span class='text-success'>✅ "+res+" Slot Left</span>";
            document.getElementById("bookBtn").disabled = false;
        }

    });

});
</script>

<?php include "footer.php"; ?>